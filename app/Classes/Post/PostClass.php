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

	public function post($userId, $postTitle, $postText)
	{
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