<div class="portlet-title tabbable-line">
    <div class="caption font-dark">
        <?php (!Request::is('*edit')) ? $page_title = 'Thêm mới' : $page_title = $page_title; ?>
        <span class="caption-subject bold uppercase"> <?php echo e(isset($page_title) ? $page_title : 'title'); ?></span>
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#content" data-toggle="tab"> Nội dung </a>
        </li>
        <li>
            <a href="#meta" data-toggle="tab"> Thẻ Meta </a>
        </li>
    </ul>
</div>
