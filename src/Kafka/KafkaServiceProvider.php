<?php
/**
 * Date: 2020-03-12
 * Time: 10:54
 * author: costalong
 * email: longqiuhong@163.com
 */

namespace Costalong\Kafka;

use Costalong\Kafka\Factory\Producer;
use Illuminate\Support\ServiceProvider;


class KafkaServiceProvider extends ServiceProvider
{

	/**
	 * author: costalong
	 * email: longqiuhong@163.com
	 */
	public function boot()
	{
		$this->publishes([realpath(__DIR__ . '/../../config/kafka.php') => config_path('kafka.php')]);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/../../config/kafka.php', 'kafka'
		);

		$this->app->bind('kafka', function () {
			return new Producer();
		});
	}


}