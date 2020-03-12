<?php
/**
 * Date: 2020-03-12
 * Time: 10:54
 * author: costalong
 * email: longqiuhong@163.com
 */

namespace Costalong\Kafka;

use Illuminate\Support\ServiceProvider;


class KafkaServiceProvider extends ServiceProvider
{

	/**
	 * author: costalong
	 * email: longqiuhong@163.com
	 */
	public function boot()
	{
		parent::boot();
		$this->publishes([realpath(__DIR__.'/../../config/kafka.php') => config_path('kafka.php')]);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{

	}



}