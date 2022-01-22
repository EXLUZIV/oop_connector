<?php

namespace App\Classes;

class CreateComentClass extends ConnectorClass
{

	private $link;
	private string $table;
	private string $coment;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function configComent(string $table, string $coment): void
	{
		$this->table = $table;
		$this->coment = $coment;
	}

	public function addComent(): void
	{
		if($this->coment === '' || $this->table === ''){
			echo 'Data not entered';
			die();
		}
		$sql = "INSERT INTO `$this->table` (`id`, `coment`) VALUES (NULL, '$this->coment');";
		$add = mysqli_query($this->link, $sql);
		echo 'Coment add in table';
		echo '<br>';
	}

}