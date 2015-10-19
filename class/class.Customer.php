<?php
class Customer
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
		$query = "INSERT INTO customer(customer_name, address, tel, fax, email, contact) VALUES (:customer_name, :address, :tel, :fax, :email, :contact)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":customer_name", $params['customer_name'], PDO::PARAM_STR);
		$stmt->bindParam(":address", $params['address'], PDO::PARAM_STR); 
		$stmt->bindParam(":tel", $params['tel'], PDO::PARAM_STR); 
		$stmt->bindParam(":fax", $params['fax'], PDO::PARAM_STR); 
		$stmt->bindParam(":email", $params['email'], PDO::PARAM_STR);
		$stmt->bindParam(":contact", $params['contact'], PDO::PARAM_STR); 
	
		$stmt->execute();
	}

	public static function read($conn, $customerName){
		$query = "SELECT customer_id, customer_name, address, tel, contact FROM customer WHERE customer_name LIKE :customer_name ";
    $order = "ORDER BY customer_name";
		$stmt = $conn->prepare($query.$order); 
		$stmt->bindValue(":customer_name", '%'.$customerName.'%', PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE customer SET customer_name=:customer_name,address=:address,tel=:tel,fax=:fax,email=:email,contact=:contact WHERE customer_id=:customer_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":customer_id", $params['customer_id'], PDO::PARAM_INT); 
		$stmt->bindParam(":customer_name", $params['customer_name'], PDO::PARAM_STR);
		$stmt->bindParam(":address", $params['address'], PDO::PARAM_STR); 
		$stmt->bindParam(":tel", $params['tel'], PDO::PARAM_STR); 
		$stmt->bindParam(":fax", $params['fax'], PDO::PARAM_STR); 
		$stmt->bindParam(":email", $params['email'], PDO::PARAM_STR);
		$stmt->bindParam(":contact", $params['contact'], PDO::PARAM_STR);  
	
		$stmt->execute();
	}
	
	public function delete(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "DELETE FROM customer WHERE customer_id = :customer_id";
		$stmt = $db->prepare($query); 
		$stmt->bindParam(":customer_id", $params['customer_id'], PDO::PARAM_INT); 

		$stmt->execute();
	}
	
	public static function get($conn, $id){
		$query = "SELECT * FROM customer WHERE customer_id = :customer_id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":customer_id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>