<?php
class ScienceBookInstructor
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
						'id', 'r_s_ins_1_1_1', 'r_s_ins_1_1_2', 't_s_ins_1_1_3', 'h_s_ins_1_1_4', 'r_s_ins_2_1_1', 'r_s_ins_2_1_2', 't_s_ins_2_1_3', 'h_s_ins_2_1_4', 'r_s_ins_3_1_1', 'r_s_ins_3_1_2', 't_s_ins_3_1_3', 'h_s_ins_3_1_4', 'r_s_ins_4_1_1', 'r_s_ins_4_1_2', 't_s_ins_4_1_3', 'h_s_ins_4_1_4', 'r_s_ins_5_1_1', 'r_s_ins_5_1_2', 't_s_ins_5_1_3', 'h_s_ins_5_1_4', 'r_s_ins_6_1_1', 'r_s_ins_6_1_2', 't_s_ins_6_1_3', 'h_s_ins_6_1_4', 'r_s_ins_7_1_1', 'r_s_ins_7_1_2', 't_s_ins_7_1_3', 'h_ins_s_7_1_4', 'r_s_ins_7_2_1', 'r_s_ins_7_2_2', 't_s_ins_7_2_3', 'h_s_ins_7_2_4', 'r_s_ins_8_1_1', 'r_s_ins_8_1_2', 't_s_ins_8_1_3', 'h_s_ins_8_1_4', 'r_s_ins_8_2_1', 'r_s_ins_8_2_2', 't_s_ins_8_2_3', 'h_s_ins_8_2_4', 'r_s_ins_9_1_1', 'r_s_ins_9_1_2', 't_s_ins_9_1_3', 'h_s_ins_9_1_4', 'r_s_ins_9_2_1', 'r_s_ins_9_2_2', 't_s_ins_9_2_3', 'h_s_ins_9_2_4', 'r_s_ins_789_additional_1_1', 'r_s_ins_789_additional_1_2', 't_s_ins_789_additional_1_3', 'h_s_ins_789_additional_1_4', 'r_s_ins_789_additional_2_1', 'r_s_ins_789_additional_2_2', 't_s_ins_789_additional_2_3', 'h_s_ins_789_additional_2_4', 'r_s_ins_789_additional_3_1', 'r_s_ins_789_additional_3_2', 't_s_ins_789_additional_3_3', 'h_s_ins_789_additional_3_4', 'r_s_ins_789_additional_4_1', 'r_s_ins_789_additional_4_2', 't_s_ins_789_additional_4_3', 'h_s_ins_789_additional_4_4', 'r_s_ins_789_additional_5_1', 'r_s_ins_789_additional_5_2', 't_s_ins_789_additional_5_3', 'h_s_ins_789_additional_5_4', 'r_s_ins_101112n_1_1', 'r_s_ins_101112n_1_2', 't_s_ins_101112n_1_3', 'h_s_ins_101112n_1_4', 'r_s_ins_101112n_2_1', 'r_s_ins_101112n_2_2', 't_s_ins_101112n_2_3', 'h_s_ins_101112n_2_4', 'r_s_ins_101112n_3_1', 'r_s_ins_101112n_3_2', 't_s_ins_101112n_3_3', 'h_s_ins_101112n_3_4', 'r_s_ins_101112n_4_1', 'r_s_ins_101112n_4_2', 't_s_ins_101112n_4_3', 'h_s_ins_101112n_4_4', 'r_s_ins_101112n_5_1', 'r_s_ins_101112n_5_2', 't_s_ins_101112n_5_3', 'h_s_ins_101112n_5_4', 'r_s_ins_101112n_6_1', 'r_s_ins_101112n_6_2', 't_s_ins_101112n_6_3', 'h_s_ins_101112n_6_4', 'r_s_ins_101112p_1_1', 'r_s_ins_101112p_1_2', 't_s_ins_101112p_1_3', 'h_s_ins_101112p_1_4', 'r_s_ins_101112p_2_1', 'r_s_ins_101112p_2_2', 't_s_ins_101112p_2_3', 'h_s_ins_101112p_2_4', 'r_s_ins_101112p_3_1', 'r_s_ins_101112p_3_2', 't_s_ins_101112p_3_3', 'h_s_ins_101112p_3_4', 'r_s_ins_101112p_4_1', 'r_s_ins_101112p_4_2', 't_s_ins_101112p_4_3', 'h_s_ins_101112p_4_4', 'r_s_ins_101112p_5_1', 'r_s_ins_101112p_5_2', 't_s_ins_101112p_5_3', 'h_s_ins_101112p_5_4', 'r_s_ins_101112p_6_1', 'r_s_ins_101112p_6_2', 't_s_ins_101112p_6_3', 'h_s_ins_101112p_6_4', 'r_s_ins_101112c_1_1', 'r_s_ins_101112c_1_2', 't_s_ins_101112c_1_3', 'h_s_ins_101112c_1_4', 'r_s_ins_101112c_2_1', 'r_s_ins_101112c_2_2', 't_s_ins_101112c_2_3', 'h_s_ins_101112c_2_4', 'r_s_ins_101112c_3_1', 'r_s_ins_101112c_3_2', 't_s_ins_101112c_3_3', 'h_s_ins_101112c_3_4', 'r_s_ins_101112c_4_1', 'r_s_ins_101112c_4_2', 't_s_ins_101112c_4_3', 'h_s_ins_101112c_4_4', 'r_s_ins_101112c_5_1', 'r_s_ins_101112c_5_2', 't_s_ins_101112c_5_3', 'h_s_ins_101112c_5_4', 'r_s_ins_101112c_6_1', 'r_s_ins_101112c_6_2', 't_s_ins_101112c_6_3', 'h_s_ins_101112c_6_4', 'r_s_ins_101112b_1_1', 'r_s_ins_101112b_1_2', 't_s_ins_101112b_1_3', 'h_s_ins_101112b_1_4', 'r_s_ins_101112b_2_1', 'r_s_ins_101112b_2_2', 't_s_ins_101112b_2_3', 'h_s_ins_101112b_2_4', 'r_s_ins_101112b_3_1', 'r_s_ins_101112b_3_2', 't_s_ins_101112b_3_3', 'h_s_ins_101112b_3_4', 'r_s_ins_101112b_4_1', 'r_s_ins_101112b_4_2', 't_s_ins_101112b_4_3', 'h_s_ins_101112b_4_4', 'r_s_ins_101112b_5_1', 'r_s_ins_101112b_5_2', 't_s_ins_101112b_5_3', 'h_s_ins_101112b_5_4', 'r_s_ins_101112b_6_1', 'r_s_ins_101112b_6_2', 't_s_ins_101112b_6_3', 'h_s_ins_101112b_6_4', 'r_s_ins_101112e_1_1', 'r_s_ins_101112e_1_2', 't_s_ins_101112e_1_3', 'h_s_ins_101112e_1_4', 'r_s_ins_101112e_2_1', 'r_s_ins_101112e_2_2', 't_s_ins_101112e_2_3', 'h_s_ins_101112e_2_4', 'r_s_ins_101112e_3_1', 'r_s_ins_101112e_3_2', 't_s_ins_101112e_3_3', 'h_s_ins_101112e_3_4', 'r_s_ins_101112e_4_1', 'r_s_ins_101112e_4_2', 't_s_ins_101112e_4_3', 'h_s_ins_101112e_4_4'
					);
		$params['id'] = $createId;
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "INSERT INTO science_book_instructor( %s ) VALUES ( %s )";
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
						'r_s_ins_1_1_1', 'r_s_ins_1_1_2', 't_s_ins_1_1_3', 'h_s_ins_1_1_4', 'r_s_ins_2_1_1', 'r_s_ins_2_1_2', 't_s_ins_2_1_3', 'h_s_ins_2_1_4', 'r_s_ins_3_1_1', 'r_s_ins_3_1_2', 't_s_ins_3_1_3', 'h_s_ins_3_1_4', 'r_s_ins_4_1_1', 'r_s_ins_4_1_2', 't_s_ins_4_1_3', 'h_s_ins_4_1_4', 'r_s_ins_5_1_1', 'r_s_ins_5_1_2', 't_s_ins_5_1_3', 'h_s_ins_5_1_4', 'r_s_ins_6_1_1', 'r_s_ins_6_1_2', 't_s_ins_6_1_3', 'h_s_ins_6_1_4', 'r_s_ins_7_1_1', 'r_s_ins_7_1_2', 't_s_ins_7_1_3', 'h_ins_s_7_1_4', 'r_s_ins_7_2_1', 'r_s_ins_7_2_2', 't_s_ins_7_2_3', 'h_s_ins_7_2_4', 'r_s_ins_8_1_1', 'r_s_ins_8_1_2', 't_s_ins_8_1_3', 'h_s_ins_8_1_4', 'r_s_ins_8_2_1', 'r_s_ins_8_2_2', 't_s_ins_8_2_3', 'h_s_ins_8_2_4', 'r_s_ins_9_1_1', 'r_s_ins_9_1_2', 't_s_ins_9_1_3', 'h_s_ins_9_1_4', 'r_s_ins_9_2_1', 'r_s_ins_9_2_2', 't_s_ins_9_2_3', 'h_s_ins_9_2_4', 'r_s_ins_789_additional_1_1', 'r_s_ins_789_additional_1_2', 't_s_ins_789_additional_1_3', 'h_s_ins_789_additional_1_4', 'r_s_ins_789_additional_2_1', 'r_s_ins_789_additional_2_2', 't_s_ins_789_additional_2_3', 'h_s_ins_789_additional_2_4', 'r_s_ins_789_additional_3_1', 'r_s_ins_789_additional_3_2', 't_s_ins_789_additional_3_3', 'h_s_ins_789_additional_3_4', 'r_s_ins_789_additional_4_1', 'r_s_ins_789_additional_4_2', 't_s_ins_789_additional_4_3', 'h_s_ins_789_additional_4_4', 'r_s_ins_789_additional_5_1', 'r_s_ins_789_additional_5_2', 't_s_ins_789_additional_5_3', 'h_s_ins_789_additional_5_4', 'r_s_ins_101112n_1_1', 'r_s_ins_101112n_1_2', 't_s_ins_101112n_1_3', 'h_s_ins_101112n_1_4', 'r_s_ins_101112n_2_1', 'r_s_ins_101112n_2_2', 't_s_ins_101112n_2_3', 'h_s_ins_101112n_2_4', 'r_s_ins_101112n_3_1', 'r_s_ins_101112n_3_2', 't_s_ins_101112n_3_3', 'h_s_ins_101112n_3_4', 'r_s_ins_101112n_4_1', 'r_s_ins_101112n_4_2', 't_s_ins_101112n_4_3', 'h_s_ins_101112n_4_4', 'r_s_ins_101112n_5_1', 'r_s_ins_101112n_5_2', 't_s_ins_101112n_5_3', 'h_s_ins_101112n_5_4', 'r_s_ins_101112n_6_1', 'r_s_ins_101112n_6_2', 't_s_ins_101112n_6_3', 'h_s_ins_101112n_6_4', 'r_s_ins_101112p_1_1', 'r_s_ins_101112p_1_2', 't_s_ins_101112p_1_3', 'h_s_ins_101112p_1_4', 'r_s_ins_101112p_2_1', 'r_s_ins_101112p_2_2', 't_s_ins_101112p_2_3', 'h_s_ins_101112p_2_4', 'r_s_ins_101112p_3_1', 'r_s_ins_101112p_3_2', 't_s_ins_101112p_3_3', 'h_s_ins_101112p_3_4', 'r_s_ins_101112p_4_1', 'r_s_ins_101112p_4_2', 't_s_ins_101112p_4_3', 'h_s_ins_101112p_4_4', 'r_s_ins_101112p_5_1', 'r_s_ins_101112p_5_2', 't_s_ins_101112p_5_3', 'h_s_ins_101112p_5_4', 'r_s_ins_101112p_6_1', 'r_s_ins_101112p_6_2', 't_s_ins_101112p_6_3', 'h_s_ins_101112p_6_4', 'r_s_ins_101112c_1_1', 'r_s_ins_101112c_1_2', 't_s_ins_101112c_1_3', 'h_s_ins_101112c_1_4', 'r_s_ins_101112c_2_1', 'r_s_ins_101112c_2_2', 't_s_ins_101112c_2_3', 'h_s_ins_101112c_2_4', 'r_s_ins_101112c_3_1', 'r_s_ins_101112c_3_2', 't_s_ins_101112c_3_3', 'h_s_ins_101112c_3_4', 'r_s_ins_101112c_4_1', 'r_s_ins_101112c_4_2', 't_s_ins_101112c_4_3', 'h_s_ins_101112c_4_4', 'r_s_ins_101112c_5_1', 'r_s_ins_101112c_5_2', 't_s_ins_101112c_5_3', 'h_s_ins_101112c_5_4', 'r_s_ins_101112c_6_1', 'r_s_ins_101112c_6_2', 't_s_ins_101112c_6_3', 'h_s_ins_101112c_6_4', 'r_s_ins_101112b_1_1', 'r_s_ins_101112b_1_2', 't_s_ins_101112b_1_3', 'h_s_ins_101112b_1_4', 'r_s_ins_101112b_2_1', 'r_s_ins_101112b_2_2', 't_s_ins_101112b_2_3', 'h_s_ins_101112b_2_4', 'r_s_ins_101112b_3_1', 'r_s_ins_101112b_3_2', 't_s_ins_101112b_3_3', 'h_s_ins_101112b_3_4', 'r_s_ins_101112b_4_1', 'r_s_ins_101112b_4_2', 't_s_ins_101112b_4_3', 'h_s_ins_101112b_4_4', 'r_s_ins_101112b_5_1', 'r_s_ins_101112b_5_2', 't_s_ins_101112b_5_3', 'h_s_ins_101112b_5_4', 'r_s_ins_101112b_6_1', 'r_s_ins_101112b_6_2', 't_s_ins_101112b_6_3', 'h_s_ins_101112b_6_4', 'r_s_ins_101112e_1_1', 'r_s_ins_101112e_1_2', 't_s_ins_101112e_1_3', 'h_s_ins_101112e_1_4', 'r_s_ins_101112e_2_1', 'r_s_ins_101112e_2_2', 't_s_ins_101112e_2_3', 'h_s_ins_101112e_2_4', 'r_s_ins_101112e_3_1', 'r_s_ins_101112e_3_2', 't_s_ins_101112e_3_3', 'h_s_ins_101112e_3_4', 'r_s_ins_101112e_4_1', 'r_s_ins_101112e_4_2', 't_s_ins_101112e_4_3', 'h_s_ins_101112e_4_4'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE science_book_instructor SET %s";

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
		$query = "SELECT * FROM science_book_instructor WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
}

?>