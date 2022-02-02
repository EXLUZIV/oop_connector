<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class GetClass extends ConnectorClass
{
	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}
	public function getHttp($id)
	{
		if (isset($id)) {

			$sql = "SELECT * FROM `post_by_worker` WHERE `post_id` = '$id'";
			
			$post = mysqli_query($this->link, $sql);

			$post = mysqli_fetch_assoc($post);

			echo json_encode($post);

			return;

		} else {

			$postList = [];
			$sql = "SELECT * FROM `post_by_worker`";
			$posts = mysqli_query($this->link, $sql);

			while($post = mysqli_fetch_assoc($posts)) {
				$postList[] = $post;
			}
			echo json_encode($postList);

			return;
		}
	}
}