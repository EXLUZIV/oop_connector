<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class CreateUserTableClass extends ConnectorClass
{
	private $link;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function createTable(string $nameTable): void
	{
		$sql = "CREATE TABLE $nameTable ( user_id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, pass VARCHAR(32), email VARCHAR(255) NOT NULL );";
		$createTable = mysqli_query($this->link, $sql);
		echo 'Create user table';
		echo '<br>';
	}
}