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

		$sql = "SHOW TABLES FROM `php_databse` like '$nameTable';";
		$checkTable = mysqli_query($this->link, $sql);
		$checkTable = mysqli_fetch_array($checkTable);

		if (isset($checkTable)) {
			
			return;
		} else {

			$sql = "CREATE TABLE $nameTable ( 
				post_id INT AUTO_INCREMENT PRIMARY KEY, 
				user_id INT NOT NULL, 
				post_title VARCHAR(255) NOT NULL, 
				post_text TEXT NOT NULL 
				);";

			$createTable = mysqli_query($this->link, $sql);
			echo 'Create post table';
			echo '<br>';
			
			return;
		}
	}
}