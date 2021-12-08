<?php namespace Chumper\Datatable;

use Illuminate\Support\ServiceProvider;

class DatatableServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'chumper.datatable');

        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'chumper.datatable');

        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('chumper.datatable.php'),
            __DIR__.'/../../views' => base_path('resources/views/vendor/chumper.datatable'),
        ]);


    }

    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
    public function register()
    {
        $this->app->singleton('datatable', function($app)
        {
            return new Datatable;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('datatable');
    }
}
