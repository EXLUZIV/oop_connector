<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

require_once('Autoload.php');
require_once('app/config.php');

class CreateInformationClass extends ConnectorClass
{

	private string $user = '';
	private string $password = '';
	private string $email = '';
	private string $table = '';
	private $link;

	public function __construct(ConnectorClass $inj)
	{
		$this->link = $inj->conectBD();
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

		$add = mysqli_query($this->link, "INSERT INTO `$this->table` (`id`, `name`, `pass`, `email`) VALUES (NULL, '$this->user', '$this->password', '$this->email');");
		echo 'User add in table';
		echo '<br>';
	}

	public function getUserByEmail(string $email)
	{
		$result = mysqli_query($this->link, "SELECT * FROM `worker` WHERE `email` LIKE '$email'");
		$row = mysqli_fetch_array($result);

		return var_dump($row);
	}
}