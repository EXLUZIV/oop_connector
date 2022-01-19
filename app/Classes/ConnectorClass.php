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

	public function __construct(ConfigBDClass $bdconfig)
	{
		
		$this->server = $bdconfig->getConfig('server');
		$this->pass = $bdconfig->getConfig('pass');
		$this->user = $bdconfig->getConfig('user');
		$this->bd = $bdconfig->getConfig('bd');
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