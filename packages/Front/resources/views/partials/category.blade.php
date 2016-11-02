<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="navbar">
        <div class="row">

            <div class="navbar-inner">

                <a class="btn btn-navbar pull-right" data-toggle="collapse" data-target="#nav-2">
                    <i class="fa fa-level-down"></i>
                </a>

                <div class="collapse navbar-collapse" id="nav-2">
                    <ul class="nav navbar-nav">
                        @foreach($classified_categories as $classified_category)
                            <li class="dropdown men">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ $classified_category->getIcon() }}" class="i-desktop">
                                    <img src="{{ $classified_category->getIcon() }}" class="i-mb"> {{ $classified_category->name }}</a>
                                @if( count($classified_category->child()) )
                                    <ul class="dropdown-menu">
                                        <li class="tit-left-bar">
                                            <h2><img src="{{ $classified_category->getIcon() }}" class="i-desktop"> <img src="{{ $classified_category->getIcon() }}" class="i-mb"> {{ $classified_category->name }}</h2>
                                        </li>

                                        <?php
                                            $classifieds_child_categories = $classified_category->child();
                                            $classifieds_child_categories_number = count($classifieds_child_categories);
                                            $number_of_each_column = ($classifieds_child_categories_number / 2);
                                            $count = 0;
                                        ?>

                                        @if($classifieds_child_categories_number > 8)

                                            @while($count < $classifieds_child_categories_number)
                                                <ul class="subm-2col">
                                                    @for($i = 0; $i < $number_of_each_column; $i++)
                                                        @if($count < $classifieds_child_categories_number)
                                                            <li class="men"><a href="{{ route('front.classified.category', $classifieds_child_categories[$count]->slug) }}"><i class="fa fa-angle-right"></i>{{ $classifieds_child_categories[$count]->name }}</a></li>
                                                        @endif
                                                        <?php $count++; ?>
                                                    @endfor
                                                </ul>
                                            @endwhile

                                        @else
                                            <ul class="subm-2col">
                                                @foreach($classifieds_child_categories as $child_category )
                                                    <li class="men"><a href="{{ route('front.classified.category', $child_category->slug) }}"><i class="fa fa-angle-right"></i>{{ $child_category->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </ul>
                                @endif
                            </li>

                        @endforeach
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /navbar-inner -->
</div>