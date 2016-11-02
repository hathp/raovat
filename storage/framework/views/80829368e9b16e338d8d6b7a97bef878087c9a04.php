<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?php echo isset($page_meta->meta_keyword) ? $page_meta->meta_keyword : $setting->getValueItem(11); ?>" />
<meta name="description" content="<?php echo isset($page_meta->meta_description) ? $page_meta->meta_description : $setting->getValueItem(12); ?>">
<meta name="author" content="<?php echo $setting->getValueItem(14); ?>">
<meta name="robots" content="<?php echo $setting->getValueItem(13); ?>"/>
<meta name="copyright" content="<?php echo $setting->getValueItem(16); ?>">
<meta name="revisit-after" content="<?php echo $setting->getValueItem(15); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<meta property="og:site_name" content="<?php echo $setting->getValueItem(1); ?>" />
<meta property="og:type" content="<?php echo $setting->getValueItem(19); ?>" />
<meta property="og:locale" content="vi-VN" />
<meta property="fb:app_id" content="966242223397117" />
<meta property="og:title" content="<?php echo isset($page_meta->meta_title) ? $page_meta->meta_title : $setting->getValueItem(11); ?>" />
<meta property="og:description" content="<?php echo isset($page_meta->meta_description) ? $page_meta->meta_description : $setting->getValueItem(12); ?>" />
<meta property="og:url" content="<?php echo $setting->getValueItem(20); ?>" />
<?php if(isset($page_meta)): ?>
    <meta property="og:image" content="<?php echo e($page_meta->getCoverImageLarge()); ?>" />
<?php else: ?>
    <meta property="og:image" content="<?php echo e($setting->find(21)->getCoverImageLarge()); ?>" />
<?php endif; ?>

