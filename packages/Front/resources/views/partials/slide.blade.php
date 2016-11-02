<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"  id="slideshow">
    <div id="carousel-top" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">

            @for($i = 0; $i < count($image_slides); $i++)
                    <li data-target="#carousel-top" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : 1 }}"></li>
            @endfor
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php $first = 1; ?>
            @foreach($image_slides as $image_slide)
                <div class="item {{ $first == 1 ? 'active' : '' }}">
                    <img src="/storage/layout{{ $image_slide->path }}" alt="">
                    <div class="carousel-caption">
                        {{ $image_slide->name }}
                    </div>
                </div>
                    <?php $first = 0; ?>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-top" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-top" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>