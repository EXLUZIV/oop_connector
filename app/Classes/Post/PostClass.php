<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class PostClass extends ConnectorClass
{

	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function getPost()
	{
		
		$method = $_SERVER['REQUEST_METHOD'];
		$link = $_SERVER['REQUEST_URI'];
		$params = explode('/', $link);

		$type = $params[3];

		if (isset($params[4])) {

			$id = $params[4];
		}
		

		if ($method === 'GET') {

			if ($type === 'posts') {

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

		if ($method === 'POST') {

			if ($type === 'posts') {

				$data = $_POST;
				$userId = $data['user_id'];
				$postTitle = $data['post_title'];
				$postText = $data['post_text'];

				$sql = "INSERT INTO `post_by_worker` 
				(`post_id`, `user_id`, `post_title`, `post_text`) 
				VALUES (
					NULL,
					'$userId',
					'$postTitle',
					'$postText'
					)";
				$add = mysqli_query($this->link, $sql);

				http_response_code(201);

				$res = [
					"status" => true,
					"message" => "post create"
				];

				echo json_encode($res);
			}
		}

		if ($method === 'PATCH') {
			if (isset($id)) {
				$data = file_get_contents('php://input');
			$data = json_decode($data, true);

			$userId = $data['user_id'];
			$postTitle = $data['post_title'];
			$postText = $data['post_text']; 

			$sql = "UPDATE `post_by_worker` SET 
			`user_id` = '$userId',
			`post_title` = '$postTitle',
			`post_text` = '$postText'
			WHERE 
			`post_by_worker`.`post_id` = $id";
			$change = mysqli_query($this->link, $sql);

			http_response_code(200);

			$res = [
				"status" => true,
				"message" => "post is update"
			];

			echo json_encode($res);
			}
		}

		if ($method === 'DELETE') {


			$sql = "DELETE FROM `post_by_worker` WHERE `post_by_worker`.`post_id` = $id";
			$delete = mysqli_query($this->link, $sql);
			
			http_response_code(200);

			$res = [
				"status" => true,
				"message" => "Post is delete"
			];

			echo json_encode($res);
		}
		
		return;
	}
}