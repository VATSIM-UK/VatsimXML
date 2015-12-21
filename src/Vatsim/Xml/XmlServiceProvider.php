<?php namespace Vatsim\Xml;

use Illuminate\Support\ServiceProvider;

class XmlServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	public function dir($path){
		return __DIR__."/../../".$path;
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
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
		$request = $this->app['request'];

		// Lumen users need to copy the config themselves
		// And it needs to pulled completely differently.
		// So more work required. Luckily barryvdh had the answer - so thanks.
		if(str_contains($this->app->version(), "Lumen")){
			$this->app->configure("vatsim-xml");
		} else {
			$this->publishes([
				$this->dir("config/config.php") => config_path("vatsim-xml.php"),
			]);
		}

		$this->app['vatsimxml'] = $this->app->share(function($app){
			return new XML( $this->app["config"]->get("vatsim-xml") );
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array("vatsimxml");
	}

}
