<?php

namespace App\Classes;

require_once('Autoload.php');

class ConfigBDClass
{

	private string $filename;

	public function __construct(string $filename)
	{
		$this->filename = $filename;
	}

	public function getConfig(string $key): string
	{
		$config = include("App/Config/$this->filename");
		return $config["$key"];
	}
}