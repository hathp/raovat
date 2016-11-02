<?php

namespace Hoster\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('datetime', function($expression) {
            return "<?php echo with{$expression}->format('d/m/Y H:i'); ?>";
        });

        Blade::directive('date', function($expression) {
            return "<?php echo with{$expression}->format('d/m/Y'); ?>";
        });

        Blade::directive('boolean', function($expression) {
            return "<?php echo with{$expression} == 1 ? 'Có' : 'Không' ?>";
        });

        Blade::directive('gender', function($expression) {
            return "<?php echo with{$expression} == 1 ? trans('common.male') : trans('common.female') ?>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
