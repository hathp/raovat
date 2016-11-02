<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="navbar">
        <div class="row">

            <div class="navbar-inner">

                <a class="btn btn-navbar pull-right" data-toggle="collapse" data-target="#nav-2">
                    <i class="fa fa-level-down"></i>
                </a>

                <div class="collapse navbar-collapse" id="nav-2">
                    <ul class="nav navbar-nav">
                        <?php foreach($classified_categories as $classified_category): ?>
                            <li class="dropdown men">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo e($classified_category->getIcon()); ?>" class="i-desktop">
                                    <img src="<?php echo e($classified_category->getIcon()); ?>" class="i-mb"> <?php echo e($classified_category->name); ?></a>
                                <?php if( count($classified_category->child()) ): ?>
                                    <ul class="dropdown-menu">
                                        <li class="tit-left-bar">
                                            <h2><img src="<?php echo e($classified_category->getIcon()); ?>" class="i-desktop"> <img src="<?php echo e($classified_category->getIcon()); ?>" class="i-mb"> <?php echo e($classified_category->name); ?></h2>
                                        </li>

                                        <?php
                                            $classifieds_child_categories = $classified_category->child();
                                            $classifieds_child_categories_number = count($classifieds_child_categories);
                                            $number_of_each_column = ($classifieds_child_categories_number / 2);
                                            $count = 0;
                                        ?>

                                        <?php if($classifieds_child_categories_number > 8): ?>

                                            <?php while($count < $classifieds_child_categories_number): ?>
                                                <ul class="subm-2col">
                                                    <?php for($i = 0; $i < $number_of_each_column; $i++): ?>
                                                        <?php if($count < $classifieds_child_categories_number): ?>
                                                            <li class="men"><a href="<?php echo e(route('front.classified.category', $classifieds_child_categories[$count]->slug)); ?>"><i class="fa fa-angle-right"></i><?php echo e($classifieds_child_categories[$count]->name); ?></a></li>
                                                        <?php endif; ?>
                                                        <?php $count++; ?>
                                                    <?php endfor; ?>
                                                </ul>
                                            <?php endwhile; ?>

                                        <?php else: ?>
                                            <ul class="subm-2col">
                                                <?php foreach($classifieds_child_categories as $child_category ): ?>
                                                    <li class="men"><a href="<?php echo e(route('front.classified.category', $child_category->slug)); ?>"><i class="fa fa-angle-right"></i><?php echo e($child_category->name); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>

                                    </ul>
                                <?php endif; ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /navbar-inner -->
</div>