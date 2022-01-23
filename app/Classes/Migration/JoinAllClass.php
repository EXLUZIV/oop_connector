<?php

namespace App\Classes;

use App\Classes\ConfigBDClass;
use App\Classes\ConnectorClass;

class JoinAllClass extends ConnectorClass
{

	private $link;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function joinTable(string $userTable, string $postTbale, string $comentTable): void
	{
		$sql = "SELECT $userTable.user_id, $postTbale.post_id, $comentTable.coment_id, $userTable.name, $userTable.pass, $userTable.email, $postTbale.post_text, $comentTable.coment_text FROM $userTable INNER JOIN $postTbale ON $userTable.user_id = $postTbale.user_id INNER JOIN $comentTable ON $userTable.user_id = $comentTable.user_id;";
		$join = mysqli_query($this->link, $sql);
		echo 'Join All Table';
		echo '<br>';
	}
}