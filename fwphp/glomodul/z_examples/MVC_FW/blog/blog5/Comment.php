<?php
include('db.php');


class Comment{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}

	public function comment($name,$email,$subject,$description,$slug,$created,$status){
		$sql = "INSERT INTO comments(name,email,subject,description,slug,created_at,status)VALUES('$name','$email','$subject','$description','$slug','$created','$status')";
		$result = mysqli_query($this->db , $sql);
		return $result;
	}

	public function getCommentsBySlug($slug){
		$sql = "SELECT * FROM comments WHERE slug ='$slug'AND status =1";
		$result = mysqli_query($this->db,$sql);
		return $result;
	}

	public function countComments($slug){
		$sql = "SELECT * FROM comments WHERE slug ='$slug'AND status =1";
		$result = mysqli_query($this->db,$sql);
		return mysqli_num_rows($result);
	}
	public function getPendingComments(){
		$sql = "SELECT * FROM comments WHERE  status =0";
		$result = mysqli_query($this->db,$sql);
		return $result;
	}

	public function update($id){
		$sql = "UPDATE comments SET status=1 WHERE id ='$id'";
		return mysqli_query($this->db,$sql);
	}
	public function delete($id){
		$sql = "DELETE FROM  comments  WHERE id ='$id'";
		return mysqli_query($this->db,$sql);
	}

	
}