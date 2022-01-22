<?php

namespace App\Classes;

use mysqli;

class CreatePostClass extends ConnectorClass
{

	private string $post;
	private string $table;
	private $link;

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function configPost(string $table, string $post): void
	{
		$this->table = $table;
		$this->post = $post;
	}

	public function addPost(): void
	{
		if($this->post === '' || $this->table === ''){
			echo 'Data not entered';
			die();
		}

		$sql = "INSERT INTO `$this->table` (`id`, `post`) VALUES (NULL, '$this->post');";
		$add = mysqli_query($this->link, $sql);
		echo 'Post add in table';
		echo '<br>';
	}
}