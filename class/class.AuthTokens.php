<?php
class AuthTokens
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
		$query = "INSERT INTO auth_tokens(user_id, token) VALUES (:user_id,:token)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":user_id", $params['user_id'], PDO::PARAM_STR); 
		$stmt->bindParam(":token", $params['token'], PDO::PARAM_STR);
	
		$stmt->execute();
	}
	
	public function delete(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "DELETE FROM auth_tokens WHERE token = :token";
		$stmt = $db->prepare($query); 
		$stmt->bindParam(":token", $params['token'], PDO::PARAM_STR); 

		$stmt->execute();
	}
	
	public static function getUserByToken($conn, $token){
		$query = "SELECT b.user_id, b.role FROM auth_tokens a, user b WHERE a.user_id = b.user_id AND a.token = :token";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>