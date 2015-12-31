<?php
class MathBook
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create($createId){
		$params = $this->requests;
		$db = $this->dbh;
		
		$fields = array(
						'id', 'r_m_1_1_1', 'r_m_1_1_2', 't_m_1_1_3', 'h_m_1_1_4', 'r_m_1_2_1', 'r_m_1_2_2', 't_m_1_2_3', 'h_m_1_2_4', 'r_m_1_3_1', 'r_m_1_3_2', 't_m_1_3_3', 'h_m_1_3_4', 'r_m_1_4_1', 'r_m_1_4_2', 't_m_1_4_3', 'h_m_1_4_4', 'r_m_2_1_1', 'r_m_2_1_2', 't_m_2_1_3', 'h_m_2_1_4', 'r_m_2_2_1', 'r_m_2_2_2', 't_m_2_2_3', 'h_m_2_2_4', 'r_m_2_3_1', 'r_m_2_3_2', 't_m_2_3_3', 'h_m_2_3_4', 'r_m_3_1_1', 'r_m_3_1_2', 't_m_3_1_3', 'h_m_3_1_4', 'r_m_3_2_1', 'r_m_3_2_2', 't_m_3_2_3', 'h_m_3_2_4', 'r_m_3_3_1', 'r_m_3_3_2', 't_m_3_3_3', 'h_m_3_3_4', 'r_m_4_1_1', 'r_m_4_1_2', 't_m_4_1_3', 'h_m_4_1_4', 'r_m_4_2_1', 'r_m_4_2_2', 't_m_4_2_3', 'h_m_4_2_4', 'r_m_4_3_1', 'r_m_4_3_2', 't_m_4_3_3', 'h_m_4_3_4', 'r_m_5_1_1', 'r_m_5_1_2', 't_m_5_1_3', 'h_m_5_1_4', 'r_m_5_2_1', 'r_m_5_2_2', 't_m_5_2_3', 'h_m_5_2_4', 'r_m_5_3_1', 'r_m_5_3_2', 't_m_5_3_3', 'h_m_5_3_4', 'r_m_6_1_1', 'r_m_6_1_2', 't_m_6_1_3', 'h_m_6_1_4', 'r_m_6_2_1', 'r_m_6_2_2', 't_m_6_2_3', 'h_m_6_2_4', 'r_m_6_3_1', 'r_m_6_3_2', 't_m_6_3_3', 'h_m_6_3_4', 'r_m_7_1_1', 'r_m_7_1_2', 't_m_7_1_3', 'h_m_7_1_4', 'r_m_7_2_1', 'r_m_7_2_2', 't_m_7_2_3', 'h_m_7_2_4', 'r_m_7_3_1', 'r_m_7_3_2', 't_m_7_3_3', 'h_m_7_3_4', 'r_m_7_4_1', 'r_m_7_4_2', 't_m_7_4_3', 'h_m_7_4_4', 'r_m_8_1_1', 'r_m_8_1_2', 't_m_8_1_3', 'h_m_8_1_4', 'r_m_8_2_1', 'r_m_8_2_2', 't_m_8_2_3', 'h_m_8_2_4', 'r_m_8_3_1', 'r_m_8_3_2', 't_m_8_3_3', 'h_m_8_3_4', 'r_m_8_4_1', 'r_m_8_4_2', 't_m_8_4_3', 'h_m_8_4_4', 'r_m_9_1_1', 'r_m_9_1_2', 't_m_9_1_3', 'h_m_9_1_4', 'r_m_9_2_1', 'r_m_9_2_2', 't_m_9_2_3', 'h_m_9_2_4', 'r_m_9_3_1', 'r_m_9_3_2', 't_m_9_3_3', 'h_m_9_3_4', 'r_m_9_4_1', 'r_m_9_4_2', 't_m_9_4_3', 'h_m_9_4_4', 'r_m_101112_1_1', 'r_m_101112_1_2', 't_m_101112_1_3', 'h_m_101112_1_4', 'r_m_101112_2_1', 'r_m_101112_2_2', 't_m_101112_2_3', 'h_m_101112_2_4', 'r_m_101112_3_1', 'r_m_101112_3_2', 't_m_101112_3_3', 'h_m_101112_3_4', 'r_m_101112_4_1', 'r_m_101112_4_2', 't_m_101112_4_3', 'h_m_101112_4_4', 'r_m_101112_5_1', 'r_m_101112_5_2', 't_m_101112_5_3', 'h_m_101112_5_4', 'r_m_101112_6_1', 'r_m_101112_6_2', 't_m_101112_6_3', 'h_m_101112_6_4', 'r_m_101112_7_1', 'r_m_101112_7_2', 't_m_101112_7_3', 'h_m_101112_7_4', 'r_m_101112_8_1', 'r_m_101112_8_2', 't_m_101112_8_3', 'h_m_101112_8_4', 'r_m_101112_9_1', 'r_m_101112_9_2', 't_m_101112_9_3', 'h_m_101112_9_4'
					);
		$params['id'] = $createId;
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "INSERT INTO math_book( %s ) VALUES ( %s )";
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
	}
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		
		$fields = array(
						'r_m_1_1_1', 'r_m_1_1_2', 't_m_1_1_3', 'h_m_1_1_4', 'r_m_1_2_1', 'r_m_1_2_2', 't_m_1_2_3', 'h_m_1_2_4', 'r_m_1_3_1', 'r_m_1_3_2', 't_m_1_3_3', 'h_m_1_3_4', 'r_m_1_4_1', 'r_m_1_4_2', 't_m_1_4_3', 'h_m_1_4_4', 'r_m_2_1_1', 'r_m_2_1_2', 't_m_2_1_3', 'h_m_2_1_4', 'r_m_2_2_1', 'r_m_2_2_2', 't_m_2_2_3', 'h_m_2_2_4', 'r_m_2_3_1', 'r_m_2_3_2', 't_m_2_3_3', 'h_m_2_3_4', 'r_m_3_1_1', 'r_m_3_1_2', 't_m_3_1_3', 'h_m_3_1_4', 'r_m_3_2_1', 'r_m_3_2_2', 't_m_3_2_3', 'h_m_3_2_4', 'r_m_3_3_1', 'r_m_3_3_2', 't_m_3_3_3', 'h_m_3_3_4', 'r_m_4_1_1', 'r_m_4_1_2', 't_m_4_1_3', 'h_m_4_1_4', 'r_m_4_2_1', 'r_m_4_2_2', 't_m_4_2_3', 'h_m_4_2_4', 'r_m_4_3_1', 'r_m_4_3_2', 't_m_4_3_3', 'h_m_4_3_4', 'r_m_5_1_1', 'r_m_5_1_2', 't_m_5_1_3', 'h_m_5_1_4', 'r_m_5_2_1', 'r_m_5_2_2', 't_m_5_2_3', 'h_m_5_2_4', 'r_m_5_3_1', 'r_m_5_3_2', 't_m_5_3_3', 'h_m_5_3_4', 'r_m_6_1_1', 'r_m_6_1_2', 't_m_6_1_3', 'h_m_6_1_4', 'r_m_6_2_1', 'r_m_6_2_2', 't_m_6_2_3', 'h_m_6_2_4', 'r_m_6_3_1', 'r_m_6_3_2', 't_m_6_3_3', 'h_m_6_3_4', 'r_m_7_1_1', 'r_m_7_1_2', 't_m_7_1_3', 'h_m_7_1_4', 'r_m_7_2_1', 'r_m_7_2_2', 't_m_7_2_3', 'h_m_7_2_4', 'r_m_7_3_1', 'r_m_7_3_2', 't_m_7_3_3', 'h_m_7_3_4', 'r_m_7_4_1', 'r_m_7_4_2', 't_m_7_4_3', 'h_m_7_4_4', 'r_m_8_1_1', 'r_m_8_1_2', 't_m_8_1_3', 'h_m_8_1_4', 'r_m_8_2_1', 'r_m_8_2_2', 't_m_8_2_3', 'h_m_8_2_4', 'r_m_8_3_1', 'r_m_8_3_2', 't_m_8_3_3', 'h_m_8_3_4', 'r_m_8_4_1', 'r_m_8_4_2', 't_m_8_4_3', 'h_m_8_4_4', 'r_m_9_1_1', 'r_m_9_1_2', 't_m_9_1_3', 'h_m_9_1_4', 'r_m_9_2_1', 'r_m_9_2_2', 't_m_9_2_3', 'h_m_9_2_4', 'r_m_9_3_1', 'r_m_9_3_2', 't_m_9_3_3', 'h_m_9_3_4', 'r_m_9_4_1', 'r_m_9_4_2', 't_m_9_4_3', 'h_m_9_4_4', 'r_m_101112_1_1', 'r_m_101112_1_2', 't_m_101112_1_3', 'h_m_101112_1_4', 'r_m_101112_2_1', 'r_m_101112_2_2', 't_m_101112_2_3', 'h_m_101112_2_4', 'r_m_101112_3_1', 'r_m_101112_3_2', 't_m_101112_3_3', 'h_m_101112_3_4', 'r_m_101112_4_1', 'r_m_101112_4_2', 't_m_101112_4_3', 'h_m_101112_4_4', 'r_m_101112_5_1', 'r_m_101112_5_2', 't_m_101112_5_3', 'h_m_101112_5_4', 'r_m_101112_6_1', 'r_m_101112_6_2', 't_m_101112_6_3', 'h_m_101112_6_4', 'r_m_101112_7_1', 'r_m_101112_7_2', 't_m_101112_7_3', 'h_m_101112_7_4', 'r_m_101112_8_1', 'r_m_101112_8_2', 't_m_101112_8_3', 'h_m_101112_8_4', 'r_m_101112_9_1', 'r_m_101112_9_2', 't_m_101112_9_3', 'h_m_101112_9_4'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE math_book SET %s";

		// make a list of named parameters: titulo=:titulo, titulo=:tipo_produto /*, etc. */
		$updateFields = implode( ', ', array_map( function( $value ) { return $value . '=:' . $value; }, $fields ) );
		
		$query = sprintf( $query, $updateFields );
		
		$query .= " WHERE id=:id";
		
		//echo $query;
		//print_r($params);
		
		$stmt = $db->prepare($query);
		
		foreach($fields as $field) {
			$stmt -> bindValue( ':' . $field, $params[$field] );
		}
		$stmt -> bindParam( ':' . 'id', $params['updateId'], PDO::PARAM_INT );
		
		$stmt->execute();
	}
	
	public static function get($conn, $id){
		$query = "SELECT * FROM math_book WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
}

?>