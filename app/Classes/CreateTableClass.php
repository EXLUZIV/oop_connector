<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

require_once('Autoload.php');
require_once('app/config.php');

class CreateTableClass extends ConnectorClass
{

	private string $nameTable;
	private $link;

	public function __construct(object $inj)
	{
		$this->link = $inj->conectBD();
	}

	public function createTable(string $nameTable): void
	{
		$createTable = mysqli_query($this->link, "CREATE TABLE $nameTable ( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, pass VARCHAR(32), email VARCHAR(255) NOT NULL );");
	}
}