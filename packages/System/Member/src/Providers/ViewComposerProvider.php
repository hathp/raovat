<?php

namespace System\Page\Providers;


use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    public function boot()
    {

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

    public function pageCategoryForm()
    {
        view()->composer(['page::category.edit'], function($view) {

        });
    }
}