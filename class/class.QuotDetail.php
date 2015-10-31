<?php
class QuotDetail
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create($addtional){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "INSERT INTO quot_detail(quot_no, product_id, sequence, product_name, quantity, unit_name, price, summary_price) VALUES (:quot_no, :product_id, :sequence, :product_name, :quantity, :unit_name, :price, :summary_price)";
		$stmt = $db->prepare($query);
		
		foreach($params["sequence"] as $key=>$item){
			$stmt->bindParam(":quot_no", $addtional['quot_no'], PDO::PARAM_STR); 
			$stmt->bindParam(":product_id", $params['product_id'][$key], PDO::PARAM_INT);
			$stmt->bindParam(":sequence", $item, PDO::PARAM_INT);
			$stmt->bindParam(":product_name", $params['product_name'][$key], PDO::PARAM_STR);
			$stmt->bindParam(":quantity", $params['quantity'][$key], PDO::PARAM_STR);
			$stmt->bindParam(":unit_name", $params['unit_name'][$key], PDO::PARAM_STR); 
			$stmt->bindValue(":price", str_replace(",", "", $params['price'][$key]), PDO::PARAM_STR);
			$stmt->bindValue(":summary_price", str_replace(",", "", $params['summary'][$key]), PDO::PARAM_STR);
		
			$stmt->execute();
		}
	}

}

?>