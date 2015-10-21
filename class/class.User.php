<?php
class User
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "INSERT INTO user(user_id, password, role) VALUES (:user_id,:password,:role)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_STR); 
		$stmt->bindParam(":password", $params['password'], PDO::PARAM_STR);
		$stmt->bindParam(":role", $params['role'], PDO::PARAM_STR);
	
		$stmt->execute();
	}

	public static function read($conn, $userId){
		$query = "SELECT user_id, role, password_inc_count, lasted_login_datetime FROM user WHERE user_id LIKE :user_id ";
		$order = "ORDER BY user_id ";
		$stmt = $conn->prepare($query.$order); 
		$stmt->bindValue(":user_id", '%'.$userId.'%', PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE user SET password=:password,role=:role,password_inc_count=:password_inc_count WHERE user_id=:user_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $params['password'], PDO::PARAM_STR);
		$stmt->bindParam(":role", $params['role'], PDO::PARAM_STR); 
		$stmt->bindParam(":password_inc_count", $params['password_inc_count'], PDO::PARAM_INT);
	
		$stmt->execute();
	}
	
	public function updateLastLoginDatetime(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE user SET lasted_login_datetime=SYSDATE(),password_inc_count=:password_inc_count WHERE user_id=:user_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_STR);
		$stmt->bindValue(":password_inc_count", 0, PDO::PARAM_INT);
	
		$stmt->execute();
	}
	
	public function updatePasswordCount(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE user SET password_inc_count=:password_inc_count WHERE user_id=:user_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_STR);
		$stmt->bindParam(":password_inc_count", $params['password_inc_count'], PDO::PARAM_INT);
	
		$stmt->execute();
	}
	
	public function delete(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "DELETE FROM user WHERE user_id = :user_id";
		$stmt = $db->prepare($query); 
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_INT); 

		$stmt->execute();
	}
	
	public static function get($conn, $id){
		$query = "SELECT * FROM user WHERE user_id = :user_id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":user_id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>