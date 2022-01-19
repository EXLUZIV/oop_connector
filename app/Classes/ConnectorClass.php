<?php

namespace App\Classes;

use App\Interface\ConnectorInterface;

require_once('Autoload.php');
require_once('app/config.php');

class ConnectorClass implements ConnectorInterface
{
	private string $server;
	private string $pass;
	private string $user;
	private string $bd;

	public function __construct()
	{
		$config = include('App/config.php');
		$this->server = $config['server'];
		$this->pass = $config['pass'];
		$this->user = $config['user'];
		$this->bd = $config['bd'];
	}

	public function getConfigbyKey(string $key): string
	{
		$config = include('App/config.php');
		return $config[$key];
	}
	

	public function conectBD()
	{
		$link = mysqli_connect($this->server, $this->user, $this->pass, $this->bd);
		if (mysqli_connect_errno()) {
			echo 'Error' . mysqli_connect_errno() . '-' . mysqli_connect_error();
			die();
		} else{
			echo 'Database connected';
			echo '<br>';
		}
		return $link;
	}
}