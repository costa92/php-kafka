<?php
/**
 * Date: 2020-03-12
 * Time: 10:54
 * author: costalong
 * email: longqiuhong@163.com
 */

namespace Costalong\Kafka;

use Costalong\Kafka\Factory\Producer;
use Costalong\Kafka\Kafka\KafkaService;
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
		$this->mergeConfigFrom(
			__DIR__ . '/../../config/kafka.php', 'kafka'
		);
	}

	/**
	 * 注册数据
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('kafka', function ($app) {
			$config = $app->make('config');
			$brokers = $config->get('kafka.brokers');
			return new KafkaService($brokers);
		});
	}

	/**
	 * author: costalong
	 * email: longqiuhong@163.com
	 */
	public function provides()
	{
		return ['kafka'];
	}
}