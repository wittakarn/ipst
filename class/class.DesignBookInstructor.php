<?php
class DesignBookInstructor
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
						'id', 'r_d_ins_2_1_1', 'r_d_ins_2_1_2', 't_d_ins_2_1_3', 'h_d_ins_2_1_4', 'r_d_ins_3_1_1', 'r_d_ins_3_1_2', 't_d_ins_3_1_3', 'h_d_ins_3_1_4', 'r_d_ins_5_1_1', 'r_d_ins_5_1_2', 't_d_ins_5_1_3', 'h_d_ins_5_1_4', 'r_d_ins_6_1_1', 'r_d_ins_6_1_2', 't_d_ins_6_1_3', 'h_d_ins_6_1_4', 'r_d_ins_8_1_1', 'r_d_ins_8_1_2', 't_d_ins_8_1_3', 'h_d_ins_8_1_4', 'r_d_ins_9_1_1', 'r_d_ins_9_1_2', 't_d_ins_9_1_3', 'h_d_ins_9_1_4', 'r_d_ins_101112_1_1', 'r_d_ins_101112_1_2', 't_d_ins_101112_1_3', 'h_d_ins_101112_1_4'
					);
		$params['id'] = $createId;
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "INSERT INTO design_book_instructor( %s ) VALUES ( %s )";
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
						'r_d_ins_2_1_1', 'r_d_ins_2_1_2', 't_d_ins_2_1_3', 'h_d_ins_2_1_4', 'r_d_ins_3_1_1', 'r_d_ins_3_1_2', 't_d_ins_3_1_3', 'h_d_ins_3_1_4', 'r_d_ins_5_1_1', 'r_d_ins_5_1_2', 't_d_ins_5_1_3', 'h_d_ins_5_1_4', 'r_d_ins_6_1_1', 'r_d_ins_6_1_2', 't_d_ins_6_1_3', 'h_d_ins_6_1_4', 'r_d_ins_8_1_1', 'r_d_ins_8_1_2', 't_d_ins_8_1_3', 'h_d_ins_8_1_4', 'r_d_ins_9_1_1', 'r_d_ins_9_1_2', 't_d_ins_9_1_3', 'h_d_ins_9_1_4', 'r_d_ins_101112_1_1', 'r_d_ins_101112_1_2', 't_d_ins_101112_1_3', 'h_d_ins_101112_1_4'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE design_book_instructor SET %s";

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
		$query = "SELECT * FROM design_book_instructor WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
}

?>