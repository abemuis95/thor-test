<?php

namespace Modules\Footer\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Footer\Events\Handlers\RegisterFooterSidebar;

class FooterServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterFooterSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('footers', array_dot(trans('footer::footers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('footer', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Footer\Repositories\FooterRepository',
            function () {
                $repository = new \Modules\Footer\Repositories\Eloquent\EloquentFooterRepository(new \Modules\Footer\Entities\Footer());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Footer\Repositories\Cache\CacheFooterDecorator($repository);
            }
        );
// add bindings

    }
}
