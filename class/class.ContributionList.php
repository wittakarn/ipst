<?php
class ContributionList
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
	public static function get($conn, $id){
		$query = "SELECT * FROM contribute_list WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getAll($conn){
		$query = "SELECT * FROM contribute_list ORDER BY category, id";
		$stmt = $conn->prepare($query); 

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>