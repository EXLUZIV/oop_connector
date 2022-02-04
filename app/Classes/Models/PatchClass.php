<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class PatchClass extends ConnectorClass
{
	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function patch($id, $userId, $postTitle, $postText)
	{
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