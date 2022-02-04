<?php

namespace App\Classes;

class RouteClass
{
	public function addRoute()
	{

		global $connectBD;
		
		$method = $_SERVER['REQUEST_METHOD'];
		$link = $_SERVER['REQUEST_URI'];
		$params = explode('/', $link);

		$type = $params[3];

		if (isset($params[4])) {
			$id = $params[4];
		}
		

		if ($method === 'GET') {

			$get = new GetClass($connectBD);
			
			if ($params[3] === 'users') {
				$get->getByUsers();	
				
				return;
			}
			
			if ($params[3] === 'posts') {
				if (isset($params[4])) {
					$get->getById($id);
	
					return;
				} else {
					$get->getAll();
	
					return;
				}	
			}
			
			return;
		}

		if ($method === 'POST') {

			if ($type === 'posts') {

				$data = $_POST;
				$userId = $data['user_id'];
				$postTitle = $data['post_title'];
				$postText = $data['post_text'];

				$post = new PostClass($connectBD);
				$post->post($userId, $postTitle, $postText);

				return;
			}

			return;
		}

		if ($method === 'PATCH') {
			if (isset($id)) {
				$data = file_get_contents('php://input');
				$data = json_decode($data, true);

				$userId = $data['user_id'];
				$postTitle = $data['post_title'];
				$postText = $data['post_text']; 

				$patch = new PatchClass($connectBD);
				$patch->patch($id, $userId, $postTitle, $postText);

				return;
			}

			return;
		}

		if ($method === 'DELETE') {
			if (isset($id)) {
				$delete = new DeleteClass($connectBD);
				$delete->delete($id);

				return;
			}
			return;
		}
		return;
	}
}