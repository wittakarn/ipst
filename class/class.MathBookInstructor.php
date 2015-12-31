<?php
class MathBookInstructor
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
						'id', 'r_m_ins_1_1_1', 'r_m_ins_1_1_2', 't_m_ins_1_1_3', 'h_m_ins_1_1_4', 'r_m_ins_1_2_1', 'r_m_ins_1_2_2', 't_m_ins_1_2_3', 'h_m_ins_1_2_4', 'r_m_ins_2_1_1', 'r_m_ins_2_1_2', 't_m_ins_2_1_3', 'h_m_ins_2_1_4', 'r_m_ins_3_1_1', 'r_m_ins_3_1_2', 't_m_ins_3_1_3', 'h_m_ins_3_1_4', 'r_m_ins_4_1_1', 'r_m_ins_4_1_2', 't_m_ins_4_1_3', 'h_m_ins_4_1_4', 'r_m_ins_5_1_1', 'r_m_ins_5_1_2', 't_m_ins_5_1_3', 'h_m_ins_5_1_4', 'r_m_ins_6_1_1', 'r_m_ins_6_1_2', 't_m_ins_6_1_3', 'h_m_ins_6_1_4', 'r_m_ins_7_1_1', 'r_m_ins_7_1_2', 't_m_ins_7_1_3', 'h_m_ins_7_1_4', 'r_m_ins_7_2_1', 'r_m_ins_7_2_2', 't_m_ins_7_2_3', 'h_m_ins_7_2_4', 'r_m_ins_7_3_1', 'r_m_ins_7_3_2', 't_m_ins_7_3_3', 'h_m_ins_7_3_4', 'r_m_ins_7_4_1', 'r_m_ins_7_4_2', 't_m_ins_7_4_3', 'h_m_ins_7_4_4', 'r_m_ins_8_1_1', 'r_m_ins_8_1_2', 't_m_ins_8_1_3', 'h_m_ins_8_1_4', 'r_m_ins_8_2_1', 'r_m_ins_8_2_2', 't_m_ins_8_2_3', 'h_m_ins_8_2_4', 'r_m_ins_8_3_1', 'r_m_ins_8_3_2', 't_m_ins_8_3_3', 'h_m_ins_8_3_4', 'r_m_ins_8_4_1', 'r_m_ins_8_4_2', 't_m_ins_8_4_3', 'h_m_ins_8_4_4', 'r_m_ins_9_1_1', 'r_m_ins_9_1_2', 't_m_ins_9_1_3', 'h_m_ins_9_1_4', 'r_m_ins_9_2_1', 'r_m_ins_9_2_2', 't_m_ins_9_2_3', 'h_m_ins_9_2_4', 'r_m_ins_9_3_1', 'r_m_ins_9_3_2', 't_m_ins_9_3_3', 'h_m_ins_9_3_4', 'r_m_ins_9_4_1', 'r_m_ins_9_4_2', 't_m_ins_9_4_3', 'h_m_ins_9_4_4', 'r_m_ins_101112_1_1', 'r_m_ins_101112_1_2', 't_m_ins_101112_1_3', 'h_m_ins_101112_1_4', 'r_m_ins_101112_2_1', 'r_m_ins_101112_2_2', 't_m_ins_101112_2_3', 'h_m_ins_101112_2_4', 'r_m_ins_101112_3_1', 'r_m_ins_101112_3_2', 't_m_ins_101112_3_3', 'h_m_ins_101112_3_4', 'r_m_ins_101112_4_1', 'r_m_ins_101112_4_2', 't_m_ins_101112_4_3', 'h_m_ins_101112_4_4', 'r_m_ins_101112_5_1', 'r_m_ins_101112_5_2', 't_m_ins_101112_5_3', 'h_m_ins_101112_5_4', 'r_m_ins_101112_6_1', 'r_m_ins_101112_6_2', 't_m_ins_101112_6_3', 'h_m_ins_101112_6_4', 'r_m_ins_101112_7_1', 'r_m_ins_101112_7_2', 't_m_ins_101112_7_3', 'h_m_ins_101112_7_4', 'r_m_ins_101112_8_1', 'r_m_ins_101112_8_2', 't_m_ins_101112_8_3', 'h_m_ins_101112_8_4', 'r_m_ins_101112_9_1', 'r_m_ins_101112_9_2', 't_m_ins_101112_9_3', 'h_m_ins_101112_9_4'
					);
		$params['id'] = $createId;
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "INSERT INTO math_book_instructor( %s ) VALUES ( %s )";
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
						'r_m_ins_1_1_1', 'r_m_ins_1_1_2', 't_m_ins_1_1_3', 'h_m_ins_1_1_4', 'r_m_ins_1_2_1', 'r_m_ins_1_2_2', 't_m_ins_1_2_3', 'h_m_ins_1_2_4', 'r_m_ins_2_1_1', 'r_m_ins_2_1_2', 't_m_ins_2_1_3', 'h_m_ins_2_1_4', 'r_m_ins_3_1_1', 'r_m_ins_3_1_2', 't_m_ins_3_1_3', 'h_m_ins_3_1_4', 'r_m_ins_4_1_1', 'r_m_ins_4_1_2', 't_m_ins_4_1_3', 'h_m_ins_4_1_4', 'r_m_ins_5_1_1', 'r_m_ins_5_1_2', 't_m_ins_5_1_3', 'h_m_ins_5_1_4', 'r_m_ins_6_1_1', 'r_m_ins_6_1_2', 't_m_ins_6_1_3', 'h_m_ins_6_1_4', 'r_m_ins_7_1_1', 'r_m_ins_7_1_2', 't_m_ins_7_1_3', 'h_m_ins_7_1_4', 'r_m_ins_7_2_1', 'r_m_ins_7_2_2', 't_m_ins_7_2_3', 'h_m_ins_7_2_4', 'r_m_ins_7_3_1', 'r_m_ins_7_3_2', 't_m_ins_7_3_3', 'h_m_ins_7_3_4', 'r_m_ins_7_4_1', 'r_m_ins_7_4_2', 't_m_ins_7_4_3', 'h_m_ins_7_4_4', 'r_m_ins_8_1_1', 'r_m_ins_8_1_2', 't_m_ins_8_1_3', 'h_m_ins_8_1_4', 'r_m_ins_8_2_1', 'r_m_ins_8_2_2', 't_m_ins_8_2_3', 'h_m_ins_8_2_4', 'r_m_ins_8_3_1', 'r_m_ins_8_3_2', 't_m_ins_8_3_3', 'h_m_ins_8_3_4', 'r_m_ins_8_4_1', 'r_m_ins_8_4_2', 't_m_ins_8_4_3', 'h_m_ins_8_4_4', 'r_m_ins_9_1_1', 'r_m_ins_9_1_2', 't_m_ins_9_1_3', 'h_m_ins_9_1_4', 'r_m_ins_9_2_1', 'r_m_ins_9_2_2', 't_m_ins_9_2_3', 'h_m_ins_9_2_4', 'r_m_ins_9_3_1', 'r_m_ins_9_3_2', 't_m_ins_9_3_3', 'h_m_ins_9_3_4', 'r_m_ins_9_4_1', 'r_m_ins_9_4_2', 't_m_ins_9_4_3', 'h_m_ins_9_4_4', 'r_m_ins_101112_1_1', 'r_m_ins_101112_1_2', 't_m_ins_101112_1_3', 'h_m_ins_101112_1_4', 'r_m_ins_101112_2_1', 'r_m_ins_101112_2_2', 't_m_ins_101112_2_3', 'h_m_ins_101112_2_4', 'r_m_ins_101112_3_1', 'r_m_ins_101112_3_2', 't_m_ins_101112_3_3', 'h_m_ins_101112_3_4', 'r_m_ins_101112_4_1', 'r_m_ins_101112_4_2', 't_m_ins_101112_4_3', 'h_m_ins_101112_4_4', 'r_m_ins_101112_5_1', 'r_m_ins_101112_5_2', 't_m_ins_101112_5_3', 'h_m_ins_101112_5_4', 'r_m_ins_101112_6_1', 'r_m_ins_101112_6_2', 't_m_ins_101112_6_3', 'h_m_ins_101112_6_4', 'r_m_ins_101112_7_1', 'r_m_ins_101112_7_2', 't_m_ins_101112_7_3', 'h_m_ins_101112_7_4', 'r_m_ins_101112_8_1', 'r_m_ins_101112_8_2', 't_m_ins_101112_8_3', 'h_m_ins_101112_8_4', 'r_m_ins_101112_9_1', 'r_m_ins_101112_9_2', 't_m_ins_101112_9_3', 'h_m_ins_101112_9_4'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE math_book_instructor SET %s";

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
		$query = "SELECT * FROM math_book_instructor WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
}

?>