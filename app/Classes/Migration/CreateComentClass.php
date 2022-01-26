<?php

namespace App\Classes;

class CreateComentClass extends ConnectorClass
{

	private $link;
	private string $table;
	private string $text;
	private string $userId;
	private string $postId;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function configComent(string $table, string $postId, string $userId, string $text): void
	{
		$this->table = $table;
		$this->postId = $postId;
		$this->userId = $userId;
		$this->text = $text;

	}

	public function addComent(): void
	{
		if($this->text === '' || $this->table === ''){
			echo 'Data not entered';
			die();
		}
		$sql = "INSERT INTO 
		`$this->table` (
			`coment_id`, 
			`post_id`, 
			`user_id`, 
			`coment_text`
			) 
			VALUES (
				NULL, 
				'$this->postId', 
				'$this->userId', 
				'$this->text'
				);";
		
		$add = mysqli_query($this->link, $sql);
		echo 'Coment add in table';
		echo '<br>';
	}

}