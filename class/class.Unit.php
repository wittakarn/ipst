<?php

class Unit
{
	public function  __construct() {
	}
  
	public static function findUnitName($conn){
		$results = null;
		$query = "SELECT unit_name FROM unit ";
		
		try {
			$stmt = $conn->prepare($query); 
			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $results;
		}catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
			return $results;
		}
	} 
}

?>