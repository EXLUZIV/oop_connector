<?php

namespace App\Classes;

use App\Classes\ConnectorClass;

class DeleteClass extends ConnectorClass
{
	public function __construct(ConfigBDClass $bdconfig)
	{
		parent::__construct($bdconfig);

		$this->link = parent::conectBD();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM `post_by_worker` WHERE `post_by_worker`.`post_id` = $id";
			$delete = mysqli_query($this->link, $sql);
			
			http_response_code(200);

			$res = [
				"status" => true,
				"message" => "Post is delete"
			];

			echo json_encode($res);
	}
}