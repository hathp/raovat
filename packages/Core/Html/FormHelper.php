<?php


namespace Core\Html;


class FormHelper
{
    /**
     * The Form Builder instance
     * @var \Core\Html\FormBuilder
     */
    protected $form;

    /**
     * The HTML builder instance.
     *
     * @var \Core\Html\HtmlBuilder $html
     */
    protected $html;

    /**
     * array of block input
     *
     * @var array
     */
    protected $inputList;

    protected $checkable_type;

    protected $checked = null;

    public function __construct(HtmlBuilder $htmlBuilder, FormBuilder $formBuilder)
    {
        $this->form = $formBuilder;
        $this->html = $htmlBuilder;
    }

    /**
     * Create block field input
     *
     * @param $label
     * @param $type
     * @param $name
     * @param null $value
     * @param null $options
     * @return string
     */
    public function input($label, $type, $name, $value = null, $options = null)
    {
        // Input options
        $input_options = $this->getInputOptions($options);

        // Input field
        if($type == 'textarea') {
            $input = $this->form->textarea($name, $value, $input_options);
        }
        else {
            $input = $this->form->input($type, $name, $value, $input_options);
        }

        $input = $this->inputGroup($input, $input_options);

        // Label field
        if (!empty($label)) {
            $label_options = $this->getLabelOptions($options);
            $label = $this->form->label($name, $label, $label_options);
        }
        else {
            $label = '';
        }

        // Validation error message
        if($this->hasError($name)) {
            $validation_error = '<span class="help-block"> '. $this->hasError($name) .' </span>';
        }
        else {
            $validation_error = '';
        }

        return $this->getDiv($name, $options) . $label . $input . $validation_error . '</div>';
    }

    public function textarea($label, $name, $value = null, $options = null)
    {
        return $this->input($label, 'textarea', $name, $value, $options);
    }

    /**
     * Create block text field input
     *
     * @param $label
     * @param $name
     * @param null $value
     * @param null $options
     * @return string
     */
    public function text($label, $name, $value = null, $options = null)
    {
        return $this->input($label, 'text', $name, $value, $options);
    }

    /**
     * Create block email input
     *
     * @param $label
     * @param $name
     * @param null $value
     * @param null $options
     * @return string
     */
    public function email($label, $name, $value = null, $options = null)
    {
        return $this->input($label, 'email', $name, $value, $options);
    }

    /**
     * Create block password input
     *
     * @param $label
     * @param $name
     * @param null $value
     * @param null $options
     * @return string
     */
    public function password($label, $name, $value = null, $options = null)
    {
        return $this->input($label, 'password', $name, $value, $options);
    }

    /**
     * Create block checkbox input
     *
     * @param $label
     * @param $name
     * @param $value
     * @param null $checked
     * @param array $options
     * @return string
     */
    public function checkbox($label, $name, $value = null, $checked = null, $options = [])
    {
        $input_options = $this->getInputOptions($options);
        if(isset($input_options['default'])) {
            $default_checkbox_value = $input_options['default'];
            $default = $this->form->hidden($name, $default_checkbox_value);
        }
        else {
            $default = '';
        }
        $checkbox = $this->form->checkbox($name, $value, $checked, $input_options);

        return '<label>'. $default . $checkbox . $label . '</label>';
    }

    /**
     * Create radio input field
     *
     * @param $label
     * @param $name
     * @param null $value
     * @param null $checked
     * @param array $options
     * @return string
     */
    public function radio($label, $name, $value = null, $checked = null, $options = [])
    {
        $input_options = $this->getInputOptions($options);
        $radio = $this->form->radio($name, $value, $checked, $input_options);

        return '<label>' . $radio . $label . '</label>';
    }

    public function select($label, $name, $lists = [], $selected = null, $options = [])
    {
        $input_options = $this->getInputOptions($options);
        $div_options = $this->getDivOptions($options);
        $label_options = $this->getLabelOptions($options);

        $label = $this->form->label($label, null, $label_options);
        $select_input = $this->form->select($name, $lists, $selected, $input_options);

        return $this->getDiv($name, $div_options) . $label . $select_input . '</div>';
    }

    /**
     * Create group checkable input block
     *
     * @param $label
     * @param $callback
     * @param array $options
     * @return string
     * @internal param $type
     * @internal param null $checked
     */
    public function checkableList($label, $callback, $options = [])
    {
        if(is_callable($callback)) {
            call_user_func($callback, $this);

            // Build checkable list
            $checkable = '';
            foreach($this->inputList as $input) {
                $checkable .= $input;
            }

            // Clear input list
            $this->inputList = [];

            $div_options = $this->getDivOptions($options);

            $label_options = $this->getLabelOptions($options);

            $label_group = $this->form->label(null, $label, $label_options);

            $checkable_group = $this->html->div(['class' => $this->checkable_type. '-list']) . $checkable . '</div>';

            $checkable_group = $this->getDiv(null, $div_options) . $label_group . $checkable_group . '</div>';

            return $checkable_group;
        }
    }

    /**
     * Create group checkbox list
     *
     * @param $label
     * @param $callback
     * @param null $checked
     * @param array $options
     * @return string
     */
    public function checkboxesList($label, $checked = null, $callback,  $options = [])
    {
        $checkable_type = 'checkbox';
        $this->checkable_type = $checkable_type;
        $this->checked = $checked;

        return $this->checkableList($label, $callback, $options);
    }

    /**
     * Create group radio list
     *
     * @param $label
     * @param null $checked
     * @param $callback
     * @param array $options
     * @return string
     */
    public function radioList($label, $checked = null, $callback, $options = [])
    {
        $checkable_type = 'radio';
        $this->checkable_type = $checkable_type;
        $this->checked = $checked;

        return $this->checkableList($label, $callback, $options);
    }

    public function imageInput($label, $name, $value = null, $option = [])
    {
        $div = $this->getDiv($name);
        $label_options = $this->getLabelOptions($option);

        $label = $this->form->label($name, $label, $label_options);
        $file_input_option = $this->getInputOptions($option);
        $image_input = $this->form->input('file', $name, null, $file_input_option);


        $image_input = $div . $label
            .'<div class="fileinput fileinput-new" data-provides="fileinput" style="display:block">'
            .'<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">'
            . (empty($value) ? '' : $this->html->image($value))
            .'</div>'
            .'<div><span class="btn red btn-outline btn-file"><span class="fileinput-new"> Select image </span><span class="fileinput-exists"> Change </span>'
            . $image_input
            .'</span><a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>'
            .'</div></div></div>';

        return $image_input;
    }

    public function file($label, $name, $options = [])
    {
        $input_options = isset($options['input']) ? $options['input'] : [];

        $input = '<div class="form-group">
                    <label class="control-label">'. $label . '</label>
                    <div class="row">
                        <div class="col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group input-large">
                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                    <span class="fileinput-filename"> </span>
                                </div>
                        <span class="input-group-addon btn default btn-file">
                            <span class="fileinput-new"> Chọn file </span>
                            <span class="fileinput-exists"> Đổi </span>'
                            . $this->form->file($name, $input_options) .'</span>
                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Xóa </a>
                            </div>
                        </div>
                    </div>
                </div>';

        return $input;
    }

    /**
     * Add an input into group
     *
     * @param $label
     * @param $name
     * @param null $value
     * @param null $checked
     * @param array $options
     * @internal param $input
     */
    public function add($label, $name, $value = null, $checked = null, $options = [])
    {
        $this->inputList[] = $this->{$this->checkable_type}($label, $name, $value, is_null($checked) ? $this->checked : $checked, $options);
    }

    /**
     * Get input group
     *
     * @param $input
     * @param $options
     * @return mixed
     */
    protected function inputGroup($input, $options)
    {
        if(isset($options['icon'])) {

        }
        else {
            return $input;
        }
    }

    public function getInputOptions($options)
    {
        if(isset($options['input'])) {
            $attributes = $options['input'];
        }
        else {
            $attributes = [];
        }

        if(isset($attributes['class'])) {
            $attributes['class'] .= ' form-control';
        }
        else {
            $attributes['class'] = 'form-control';
        }

        return $attributes;
    }

    public function getLabelOptions($options)
    {
        if(isset($options['label'])) {
            $attributes = $options['label'];
        }
        else {
            $attributes = [];
        }

        if(isset($options['input']) && is_array($options['input'])) {
            $input_options = $this->html->arrayAttributes($options['input']);
            if(isset($input_options['required'])) {
                $attributes['required'] = 'required';
            }

        }

        return $attributes;
    }

    public function getDivOptions($options)
    {
        if(isset($options['div'])) {
            return $options['div'];
        }
        else {
            return [];
        }
    }

    public function getDiv($name = null, $options = [])
    {
        $div_options = $this->getDivOptions($options);
        $div_options = array_merge_recursive($div_options, ['class' => 'form-group']);

        if( ! is_null($name) && $this->hasError($name)) {
            $div_options = array_merge_recursive($div_options, ['class' => 'has-error']);
        }

        return $this->html->div($div_options);
    }

    /**
     * Determine the given name has any any error
     *
     * @param $name
     * @return bool
     */
    public function hasError($name)
    {
        $errors = session('errors');

        if(empty($errors)) {
            return false;
        }
        else {
            if($errors->has($name)) {
                return $errors->first($name);
            }
            else {
                return false;
            }
        }
    }
}