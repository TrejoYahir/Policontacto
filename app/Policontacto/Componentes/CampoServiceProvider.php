<?php

namespace Policontacto\Componentes;

use Illuminate\Support\ServiceProvider;

class CampoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app['campo'] = $this->app->share(function ($app) {
            $constructorCampos = new ConstructorCampos($app['form'], $app['view'], $app['session.store']);
            return $constructorCampos;
        });
    }

} 