<?php
/**
 * Created by trungtran
 * Email: tranviettrung92@gmail.com
 * Date: 26/2/2016
 * Time: 1:35 PM
 */

namespace Front;

use Hoster\Model\Image\Image;
use Hoster\Model\Image\ImageAlbum;
use Illuminate\Support\ServiceProvider;
use System\Classified\Model\ClassifiedCategory;
use System\Setting\Model\Country;
use System\Setting\Model\Language;

class FrontServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load route file
        if(! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'front');

        // View composer
        view()->composer('front::partials.category', function($view) {
            $view->with('classified_categories', ClassifiedCategory::parent()->get());
        });

        view()->composer('front::layout.main', function($view) {
            $view->with('classified_child_categories', ClassifiedCategory::children()->get());
        });

        view()->composer('front::layout.main', function($view) {
            $view->with('countries', Country::all());
        });

        view()->composer('front::partials.slide', function($view) {
            $image_album = ImageAlbum::where('slug', 'slide')->first();
            $view->with('image_slides', $image_album->images()->get());
        });

        View()->composer('front::layout.main', function($view) {
            $logo = '\storage\layout'. Image::where('name', 'logo')->first()->path;
            $view->with('logo_image_link', $logo);
        });

        View()->composer('front::page.index', function($view) {
            $logo = '\storage\layout'. Image::where('name', 'logo')->first()->path;
            $view->with('logo_image_link', $logo);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}