<?php
class Participant
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
		
		$params['create_date'] = date('Y-m-d H:i:s');
		
		$fields = array(
						'type', 'create_date', 'r_sex', 's_degree', 'i_school_name', 's_province', 's_age', 'r_degree', 'c_s', 'c_s_1', 'c_s_2', 'c_s_3', 'c_s_4', 'c_s_5', 'c_s_6', 'c_s_7', 'c_s_8', 'c_s_9', 'c_s_10', 'c_s_11', 'c_s_12', 'c_m', 'c_m_1', 'c_m_2', 'c_m_3', 'c_m_4', 'c_m_5', 'c_m_6', 'c_m_7', 'c_m_8', 'c_m_9', 'c_m_10', 'c_m_11', 'c_m_12', 'c_t', 'c_t_1', 'c_t_2', 'c_t_3', 'c_t_4', 'c_t_5', 'c_t_6', 'c_t_7', 'c_t_8', 'c_t_9', 'c_t_10', 'c_t_11', 'c_t_12', 'c_d', 'c_d_1', 'c_d_2', 'c_d_3', 'c_d_4', 'c_d_5', 'c_d_6', 'c_d_7', 'c_d_8', 'c_d_9', 'c_d_10', 'c_d_11', 'c_d_12', 's_experience', 'c_school_under_1', 'c_school_under_2', 'c_school_under_3', 'c_school_under_4', 'c_school_under_5', 'c_school_under_6', 'c_school_under_7', 'c_school_under_8', 'i_school_under_8'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		
		$query = "INSERT INTO participant( %s ) VALUES ( %s )";
		// make a list of field names: titulo, tipo_produto /*, etc. */
		$fieldsClause = implode( ', ', $fields );
		// make a list of named parameters: :titulo, :tipo_produto /*, etc. */
		$valuesClause = implode( ', ', array_map( function( $value ) { return ':' . $value; }, $fields ) );
		
		$query = sprintf( $query, $fieldsClause, $valuesClause );
		
		//echo $query;
		//print_r($params);
		
		$stmt = $db->prepare($query);
		
		foreach($fields as $field) {
			$stmt -> bindValue( ':' . $field, $params[$field] );
		}
		
		$stmt->execute();
		
		return $db->lastInsertId();
	}

	public static function read($conn, $customerName){
		$query = "SELECT customer_id, customer_name, address, tel, contact, grade FROM customer WHERE customer_name LIKE :customer_name ";
		$order = "ORDER BY customer_name";
		$stmt = $conn->prepare($query.$order); 
		$stmt->bindValue(":customer_name", '%'.$customerName.'%', PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public static function suggestText($conn, $customerName){
		$query = "SELECT customer_id, customer_name, address, tel, email, contact, grade FROM customer WHERE customer_name LIKE :customer_name ";
		$order = "ORDER BY customer_name";
		$stmt = $conn->prepare($query.$order); 
		$stmt->bindValue(":customer_name", '%'.$customerName.'%', PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		$query = "UPDATE customer SET customer_name=:customer_name,address=:address,tel=:tel,fax=:fax,email=:email,contact=:contact,grade=:grade WHERE customer_id=:customer_id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":customer_id", $params['customer_id'], PDO::PARAM_INT); 
		$stmt->bindParam(":customer_name", $params['customer_name'], PDO::PARAM_STR);
		$stmt->bindParam(":address", $params['address'], PDO::PARAM_STR); 
		$stmt->bindParam(":tel", $params['tel'], PDO::PARAM_STR); 
		$stmt->bindParam(":fax", $params['fax'], PDO::PARAM_STR); 
		$stmt->bindParam(":email", $params['email'], PDO::PARAM_STR);
		$stmt->bindParam(":contact", $params['contact'], PDO::PARAM_STR);
		$stmt->bindParam(":grade", $params['grade'], PDO::PARAM_STR);
	
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