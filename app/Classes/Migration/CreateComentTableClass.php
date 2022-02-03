<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class CreateComentTableClass extends ConnectorClass
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
				coment_id INT AUTO_INCREMENT PRIMARY KEY, 
				post_id INT NOT NULL , 
				user_id INT NOT NULL , 
				coment_text VARCHAR(255) NOT NULL
				);";
			
			$createTable = mysqli_query($this->link, $sql);
			echo 'Create coment table';
			echo '<br>';
			return;
		}
	}
}