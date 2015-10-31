<?php
class QuotNo
{
	public static function getMaxSequence($conn){
		$query = "SELECT year, sequence FROM quot_no WHERE year = (SELECT MAX(YEAR) FROM quot_no)";
		$stmt = $conn->prepare($query); 

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function updateSequence($conn){
		$query = "UPDATE quot_no SET sequence=sequence+1 WHERE year IN(SELECT max_year FROM(SELECT MAX(year) max_year FROM quot_no) AS arbitraryTableName)";
		$stmt = $conn->prepare($query);
		
		$stmt->execute();
	}
}

?>