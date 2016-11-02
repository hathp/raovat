<?php


namespace System\Classified\Support;


trait FileDelete
{
    public function deleteFile(array $field = null)
    {
        $deleteable_files = empty($field) ? $this->deleteable_file : $field;

        if(is_array($deleteable_files) && !empty($deleteable_files)) {
            foreach ($deleteable_files as $property => $config) {
                foreach($config as $type => $sub_config) {
                    $path = $sub_config['path'] . $this->$property;
                    if(realpath($path)) {
                        @unlink($path);
                    }
                }
            }
        }
    }
}