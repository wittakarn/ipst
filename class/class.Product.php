<?php
class Product
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
		$query = "INSERT INTO product(product_name, unit_name, standard_price, capital_price, s_price, a_price, b_price) VALUES (:product_name, :unit_name, :standard_price, :capital_price, :s_price, :a_price, :b_price)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":product_name", $params['product_name'], PDO::PARAM_STR); 
		$stmt->bindParam(":unit_name", $params['unit_name'], PDO::PARAM_STR);
		$stmt->bindParam(":standard_price", $params['standard_price'], PDO::PARAM_STR);
		$stmt->bindParam(":capital_price", $params['capital_price'], PDO::PARAM_STR);
		$stmt->bindValue(":s_price", str_replace(",", "", $params['s_price']), PDO::PARAM_STR);
		$stmt->bindValue(":a_price", str_replace(",", "", $params['a_price']), PDO::PARAM_STR); 
		$stmt->bindValue(":b_price", str_replace(",", "", $params['b_price']), PDO::PARAM_STR);
	
		$stmt->execute();
	}

	public static function read($conn, $productName){
		$query = "SELECT product_id, product_name, standard_price, capital_price, s_price, a_price, b_price FROM product WHERE product_name LIKE :product_name";
		$stmt = $conn->prepare($query); 
		$stmt->bindValue(":product_name", '%'.$productName.'%', PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE product SET unit_name=:unit_name,standard_price=:standard_price,capital_price=:capital_price,s_price=:s_price,a_price=:a_price,b_price=:b_price WHERE product_id=:product_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":product_id", $params['product_id'], PDO::PARAM_INT); 
		$stmt->bindParam(":unit_name", $params['unit_name'], PDO::PARAM_STR);
		$stmt->bindParam(":standard_price", $params['standard_price'], PDO::PARAM_STR);
		$stmt->bindParam(":capital_price", $params['capital_price'], PDO::PARAM_STR);
		$stmt->bindValue(":s_price", str_replace(",", "", $params['s_price']), PDO::PARAM_STR);
		$stmt->bindValue(":a_price", str_replace(",", "", $params['a_price']), PDO::PARAM_STR); 
		$stmt->bindValue(":b_price", str_replace(",", "", $params['b_price']), PDO::PARAM_STR); 
	
		$stmt->execute();
	}
	
	public function delete(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "DELETE FROM product WHERE product_id = :product_id";
		$stmt = $db->prepare($query); 
		$stmt->bindParam(":product_id", $params['product_id'], PDO::PARAM_INT); 

		$stmt->execute();
	}
	
	public static function get($conn, $id){
		$query = "SELECT * FROM product WHERE product_id = :product_id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":product_id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>