<?php echo csrf_field(); ?>

<!-- Title -->
<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name">Tiêu đề</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(isset($classifieds) ? $classifieds->name : old('name')); ?>" required>
    <?php if($errors->has('name')): ?>
        <span class="help-block"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>
</div>

<!-- Category -->
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            <label for="content">Chuyên mục</label>
            <select class="form-control" name="classifieds_category_id" id="classifieds_category_id">
                <?php foreach($classified_categories as $classified_category): ?>
                    <optgroup label="<?php echo e($classified_category->name); ?>">
                        <?php if( count($classified_category->child()) ): ?>
                            <?php foreach($classified_category->child() as $child_categories ): ?>
                                <option value="<?php echo e($child_categories->id); ?>" <?php echo e(((isset($classifieds) ? $classifieds->content : old('content')) == $child_categories->id) ? 'selected' : ''); ?>><?php echo e($child_categories->name); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
            <label for="price">Giá tiền</label>
            <input class="form-control" type="number" name="price" value="<?php echo e(isset($classifieds) ? $classifieds->price : old('price')); ?>" />
            <?php if($errors->has('price')): ?>
                <span class="help-block"><?php echo e($errors->first('price')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Content -->
<div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
    <label for="content">Nội dung đăng</label>
    <textarea class="form-control ckeditor" id="content" name="content"  required ><?php echo e(isset($classifieds) ? $classifieds->content : old('content')); ?></textarea>
    <?php if($errors->has('content')): ?>
        <span class="help-block"><?php echo e($errors->first('content')); ?></span>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-xs-4">
        <!-- Mobile -->
        <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
            <label for="mobile">Điện thoại</label>
            <input class="form-control" type="tel" name="mobile" value="<?php echo e(isset($classifieds) ? $classifieds->mobile : ((isset($user) && empty(old('mobile'))) ? $user->phone : old('mobile'))); ?>" />
            <?php if($errors->has('mobile')): ?>
                <span class="help-block"><?php echo e($errors->first('mobile')); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-8">
        <!-- Email -->
        <div class="form-group">
            <label for="content <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(isset($classifieds) ? $classifieds->email : ((isset($user) && empty(old('email'))) ? $user->email : old('email'))); ?>" />
            <?php if($errors->has('email')): ?>
                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Address -->
<div class="row">

    <div class="col-xs-4">
        <div class="form-group">
            <label for="content">Nơi rao bán</label>
            <select class="form-control" name="country_id" id="province_id">
                <?php foreach($countries as $country): ?>
                    <option value="<?php echo e($country->id); ?>" <?php echo e((old('country_id') == $country->id) ? 'selected' : ''); ?>> <?php echo e($country->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-xs-8">
        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
            <label for="content">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo e(isset($classifieds) ? $classifieds->address : old('address')); ?>"/>
            <?php if($errors->has('address')): ?>
                <span class="help-block"><?php echo e($errors->first('address')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Image -->
<div class="row">
    <div class="col-xs-4">
        <div class="kv-image" style="display: inline-block; padding-bottom: 10px;">
            <label for="photos">Hình ảnh:</label>
            <input id="image" name="image" type="file" class="file-loading">
        </div>
    </div>
    <?php if(Request::route()->getName() == 'front.classified.create'): ?>
        <div class="col-xs-4">
            <div class="form-group <?php echo e($errors->has('captcha') ? 'has-error' : ''); ?>">
                <label for="content">Mã bảo vệ</label>
                <input type="text" class="form-control" id="captcha" name="captcha" required/>
                <?php if($errors->has('captcha')): ?>
                    <span class="help-block"><?php echo e($errors->first('captcha')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-xs-4" style="padding-top: 20px">
            <?php echo captcha_img(); ?>

        </div>
    <?php endif; ?>
</div>



<?php /* munti upload */ ?>
<?php /* thông báo lỗi */ ?>
<div class="row">
    <div class="alert alert-success margin-bottom-10">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <i class="fa fa-warning fa-lg"></i> Upload danh sách ảnh.
    </div>

    <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
        Lựa chọn danh sách ảnh chi tiết và upload file:
        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
            <i class="fa fa-plus"></i> Select Files </a>
        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
            <i class="fa fa-share"></i> Upload Files </a>
    </div>
    <div class="row">
        <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>
    </div>
</div>



<div class="form-group">
    <button type="submit" class="btn btn-primary"><?php echo e(isset($button) ? $button : 'OK'); ?></button>
</div>

<?php $__env->startSection('script'); ?>
    <script src="/assets/front/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/assets/front/plugins/ckeditor/ckeditor.js"></script>
    <script>
        $("#image").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?php echo e(isset($classifieds) ? $classifieds->getImage() : '/assets/front/images/default-user.png'); ?>" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>

    <script src="/assets/front/plugins/plupload-2/js/plupload.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        var uploader = new plupload.Uploader({

            runtimes : 'html5,flash,silverlight,html4',

            browse_button : document.getElementById('tab_images_uploader_pickfiles'), // you can pass in id...
            container: document.getElementById('tab_images_uploader_container'), // ... or DOM Element itself

            url : '<?php echo e(route('front.classified.upload')); ?>',

            filters : {
                max_file_size : '10mb',
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            // Flash settings
            flash_swf_url : '/assets/front/plugins/plupload-2/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : '/assets/front/plugins/plupload-2/js/Moxie.xap',

            init: {
                PostInit: function() {
                    $('#tab_images_uploader_filelist').html("");

                    $('#tab_images_uploader_uploadfiles').click(function() {
                        uploader.start();
                        //console.log(data);
                        return false;
                    });

                    $('#tab_images_uploader_filelist').on('click', '.added-files .remove', function(){
                        uploader.removeFile($(this).parent('.added-files').attr("id"));
                        $(this).parent('.added-files').remove();
                    });
                },

                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        $('#tab_images_uploader_filelist').append('<div class="alert alert-warning added-files" id="uploaded_file_' + file.id + '">' + file.name + '(' + plupload.formatSize(file.size) + ') <span class="status label label-info"></span>&nbsp;<a href="javascript:;" style="margin-top:-5px" class="remove pull-right btn btn-sm red"><i class="fa fa-times"></i> remove</a></div>');
                    });
                },

                UploadProgress: function(up, file) {
                    $('#uploaded_file_' + file.id + ' > .status').html(file.percent + '%');
                },

                FileUploaded: function(up, file, response) {
                    //console.log(response);
                    var response = $.parseJSON(response.response);
                    console.log(response.name);
                    if (response.result && response.result == 'OK') {
                        var id = response.id;
                        var name = response.name;
                        var imageurl = response.imageurl;

//                        $("#tableID").find('tbody')
//                                .append($('<tr class="product-images">')
//                                        .append($('<td>')
//                                                .append($('<a>')
//                                                        .attr('href', imageurl)
//                                                        .attr('class', 'fancybox-button')
//                                                        .attr('data-rel', 'fancybox-button')
//                                                        .append($('<img>')
//                                                                .attr('class', 'img-responsive')
//                                                                .attr('style', 'width:84px; height:63px;')
//                                                                .attr('src', imageurl)
//                                                )
//                                        )
//                                )
//                                        .append($('<td>')
//                                                .append($('<input>')
//                                                        .attr('type', 'text')
//                                                        .attr('class', 'form-control')
//                                                        .attr('name', name)
//                                                        .attr('value', name)
//                                        )
//                                )
//                                        .append($('<td>')
//                                                .append($('<input>')
//                                                        .attr('type', 'text')
//                                                        .attr('class', 'form-control')
//                                                        .attr('value', '1')
//                                        )
//                                )
//                                        .append($('<td>')
//                                                .append($('<a>')
//                                                        .attr('href', 'javascript:;')
//                                                        .attr('class', 'btn btn-default btn-sm delete_single')
//                                                        .attr('id', id)
//                                                        .text(' Remove')
//                                                        .append($('<i>')
//                                                                .attr('class', 'fa fa-times')
//                                                )
//
//                                        )
//                                )
//                        );

                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-success").html('<i class="fa fa-check"></i> Done'); // set successfull upload

                    } else {

                        $('#uploaded_file_' + file.id + ' > .status').removeClass("label-info").addClass("label-danger").html('<i class="fa fa-warning"></i> Failed'); // set failed upload
                        App.alert({type: 'danger', message: 'One of uploads failed. Please retry.', closeInSeconds: 10, icon: 'warning'});

                    }
                },

                Error: function(up, err) {
                    App.alert({type: 'danger', message: err.message, closeInSeconds: 10, icon: 'warning'});
                }
            }
        });

        uploader.init();

    </script>
<?php $__env->stopSection(); ?>