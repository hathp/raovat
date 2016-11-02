<?php $__env->startSection('content'); ?>
    <style>
        .clock {
            color: #fff;
            float:right;
        }
        .clock ul li {
            font-size: 26px;
            display: inline;
            text-shadow: 0 0 5px #00c6ff;
        }
        #point {
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
    <div class="m-heading-1 border-green m-bordered">
        <a class="btn blue btn-outline" href="<?php echo e(route('admin.about.create')); ?>">Thêm giới thiệu</a>
        <a class="btn blue btn-outline" href="<?php echo e(route('admin.service.create')); ?>" >Thêm dịch vụ</a>
        <a class="btn blue btn-outline" href="<?php echo e(route('admin.article.create')); ?>" >Thêm tin tức</a>

        <a class="btn purple btn-outline" href="<?php echo e(route('admin.user.create')); ?>" >Thêm thành viên</a>
        <div class="clock">
            <ul>
                <li id="hours"></li>
                <li id="point">:</li>
                <li id="min"></li>
                <li id="point">:</li>
                <li id="sec"></li>
            </ul>
        </div>
    </div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($total_about); ?>">0</span>
                </div>
                <div class="desc"> Tổng số bài giới thiệu</div>
            </div>

            <a class="more" href="<?php echo e(route('admin.about.index')); ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($total_service); ?>">0</span>
                </div>
                <div class="desc"> Tổng số dịch vụ</div>
            </div>
            <a class="more" href="<?php echo e(route('admin.service.index')); ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($total_article); ?>">0</span>
                </div>
                <div class="desc"> Tổng số tin tức</div>
            </div>
            <a class="more" href="<?php echo e(route('admin.article.index')); ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($total_contact); ?>">0</span>
                </div>
                <div class="desc"> Tổng số liên hệ</div>
            </div>
            <a class="more" href="<?php echo e(route('admin.contact.index')); ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="<?php echo e($total_user); ?>"></span> </div>
                <div class="desc"> Tổng số thành viên</div>
            </div>
            <a class="more" href="<?php echo e(route('admin.user.index')); ?>"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js-page-script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            // Tao 2 mang chua ten ngay thang
            var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
            var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

            // Tao moi doi tuong Date()
            var newDate = new Date();
            // Lay gia tri thoi gian hien tai
            newDate.setDate(newDate.getDate());
            // Xuat ngay thang, nam
            $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

            setInterval( function() {
                // lay gia tri giay trong doi tuong Date()
                var seconds = new Date().getSeconds();
                // Chen so 0 vao dang truoc gia tri giay
                $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
            },1000);

            setInterval( function() {
                // Tuong tu lay gia tri phut
                var minutes = new Date().getMinutes();
                // Chen so 0 vao dang truoc gia tri phut neu gia tri hien tai nho hon 10
                $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            },1000);

            setInterval( function() {
                // Lay gia tri gio hien tai
                var hours = new Date().getHours();
                // Chen so 0 vao truoc gia tri gio neu gia tri nho hon 10
                $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);
        });
    </script>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>