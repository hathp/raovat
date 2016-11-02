<?php

namespace Core\Html;

use App;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        App::singleton('html', function () {
            return new HtmlBuilder;
        });

        App::singleton('form', function ($app) {
            $form = new FormBuilder($app['html'], $app['url']);
            return $form->setSessionStore($app['session.store']);
        });

        App::singleton('form_helper', function($app){
            return new FormHelper($app['html'], $app['form']);
        });

        App::singleton('view_helper', function($app) {
            return new ViewHelper($app['html']);
        });
    }
}