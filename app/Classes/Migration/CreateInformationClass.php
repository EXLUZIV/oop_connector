<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class CreateInformationClass extends ConnectorClass
{

	private string $user;
	private string $password;
	private string $email;
	private string $table;
	private $link;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function configUser(string $table, string $user, string $password, string $email): void
	{
		$this->user = $user;
		$this->password = md5($password);
		$this->email = $email;
		$this->table = $table;
	}

	public function addUser(): void
	{
		if($this->user == '' || $this->password == '' || $this->email == '' || $this->table == ''){
			echo 'Data not entered';
			die();
		}

		$sql = "INSERT INTO `$this->table` (`id`, `name`, `pass`, `email`) VALUES (NULL, '$this->user', '$this->password', '$this->email');";
		$add = mysqli_query($this->link, $sql);
		echo 'User add in table';
		echo '<br>';
	}

	public function getUserByEmail(string $email)
	{
		$sql = "SELECT * FROM `worker` WHERE `email` LIKE '$email'";
		$result = mysqli_query($this->link, $sql);
		$row = mysqli_fetch_array($result);

		return var_dump($row);
	}
}