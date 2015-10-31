<?php
class QuotMast
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create($addition){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "INSERT INTO quot_mast(quot_no, year, sequence, customer_id, date, total_price, vat_price, net_price, create_user_id, create_datetime, update_count) VALUES (:quot_no, :year, :sequence, :customer_id, NOW(), :total_price, :vat_price, :net_price, :create_user_id, NOW(), 0)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":quot_no", $addition['quot_no'], PDO::PARAM_STR); 
		$stmt->bindParam(":year", $addition['year'], PDO::PARAM_INT);
		$stmt->bindParam(":sequence", $addition['sequence'], PDO::PARAM_INT);
		$stmt->bindParam(":customer_id", $params['customer_id'], PDO::PARAM_INT);
		$stmt->bindValue(":total_price", str_replace(",", "", $params['total_price']), PDO::PARAM_STR); 
		$stmt->bindValue(":vat_price", str_replace(",", "", $params['vat_price']), PDO::PARAM_STR);
		$stmt->bindValue(":net_price", str_replace(",", "", $params['net_price']), PDO::PARAM_STR);
		$stmt->bindParam(":create_user_id", $addition['user_id'], PDO::PARAM_STR);
	
		$stmt->execute();
	}

}

?>