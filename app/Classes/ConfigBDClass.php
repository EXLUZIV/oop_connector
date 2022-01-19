<?php

namespace App\Classes;

require_once('Autoload.php');
require_once('app/config.php');

class ConfigBDClass
{
	public function getConfig(string $key): string
	{
		$config = include('App/config.php');
		return $config["$key"];
	}
}