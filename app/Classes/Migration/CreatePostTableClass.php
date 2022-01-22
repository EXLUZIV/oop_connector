<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class CreatePostTableClass extends ConnectorClass
{
	private $link;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function createTable(string $nameTable): void
	{
		$sql = "CREATE TABLE $nameTable ( id INT AUTO_INCREMENT PRIMARY KEY, post TEXT NOT NULL );";
		$createTable = mysqli_query($this->link, $sql);
		echo 'Create post table';
		echo '<br>';
	}
}