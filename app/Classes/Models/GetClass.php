<?php

namespace App\Classes;

use App\Classes\ConnectorClass;
use mysqli;

class GetClass extends ConnectorClass
{
	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM `post_by_worker` WHERE `post_id` = '$id'";
			
		$post = mysqli_query($this->link, $sql);

		$post = mysqli_fetch_assoc($post);

		echo json_encode($post);
	}

	public function getAll()
	{
		$postList = [];
		$sql = "SELECT * FROM `post_by_worker`";
		$posts = mysqli_query($this->link, $sql);

		while($post = mysqli_fetch_assoc($posts)) {
			$postList[] = $post;
		}
		echo json_encode($postList);
	}
	
	public function getByUsers()
	{
		$userList = [];

		$sql = "SELECT 
		worker.user_id, 
		worker.name, 
		post_by_worker.post_id 
		FROM 
		post_by_worker 
		INNER JOIN 
		worker 
		ON 
		worker.user_id = post_by_worker.user_id
		;";		
		
		$users = mysqli_query($this->link, $sql);

		while($user = mysqli_fetch_assoc($users)) {
			$userList[] = $user;
		}

		echo json_encode($userList);
	}
}