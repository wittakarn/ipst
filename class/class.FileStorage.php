<?php
class FileStorage
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
	
	public static function get($conn, $identify, $refTable, $sequence){
		$query = "SELECT * FROM file_storage WHERE id=:id AND ref_table=:ref_table AND sequence=:sequence";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(":id", $identify, PDO::PARAM_INT); 
		$stmt->bindParam(":ref_table", $refTable, PDO::PARAM_STR);
		$stmt->bindValue(":sequence", $sequence, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
  
	public function create($identify, $refTable, $sequence, $fileBlob, $fileType){
		$db = $this->dbh;
		$query = "INSERT INTO file_storage(id, ref_table, sequence, file_blob, file_type) VALUES (:id, :ref_table, :sequence, :file_blob, :file_type)";
		$stmt = $db->prepare($query);
		
		$stmt->bindParam(":id", $identify, PDO::PARAM_INT); 
		$stmt->bindParam(":ref_table", $refTable, PDO::PARAM_STR);
		$stmt->bindValue(":sequence", $sequence, PDO::PARAM_INT);
		$stmt->bindParam(":file_blob", $fileBlob, PDO::PARAM_LOB);
		$stmt->bindParam(":file_type", $fileType, PDO::PARAM_STR);
		
		$stmt->execute();
	}
	
	public function update($identify, $refTable, $sequence, $fileBlob, $fileType){
		$params = $this->requests;
		$db = $this->dbh;
		
		$query = "UPDATE file_storage SET file_blob=:file_blob, file_type=:file_type WHERE id=:id AND ref_table=:ref_table AND sequence=:sequence";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":id", $identify, PDO::PARAM_INT); 
		$stmt->bindParam(":ref_table", $refTable, PDO::PARAM_STR);
		$stmt->bindValue(":sequence", $sequence, PDO::PARAM_INT);
		$stmt->bindParam(":file_blob", $fileBlob, PDO::PARAM_LOB);
		$stmt->bindParam(":file_type", $fileType, PDO::PARAM_STR);
		
		$stmt->execute();
	}
	
	public function delete($identify, $refTable){
		$params = $this->requests;
		$db = $this->dbh;
		
		$query = "DELETE FROM file_storage WHERE id=:id AND ref_table=:ref_table";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":id", $identify, PDO::PARAM_INT); 
		$stmt->bindParam(":ref_table", $refTable, PDO::PARAM_STR);
		
		$stmt->execute();
	}
}

?>