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
						'type', 'create_date', 'r_sex', 's_degree', 'i_school_name', 's_province', 's_age', 'r_degree', 'c_s', 'c_s_1', 'c_s_2', 'c_s_3', 'c_s_4', 'c_s_5', 'c_s_6', 'c_s_7', 'c_s_8', 'c_s_9', 'c_s_10', 'c_s_11', 'c_s_12', 'c_m', 'c_m_1', 'c_m_2', 'c_m_3', 'c_m_4', 'c_m_5', 'c_m_6', 'c_m_7', 'c_m_8', 'c_m_9', 'c_m_10', 'c_m_11', 'c_m_12', 'c_t', 'c_t_1', 'c_t_2', 'c_t_3', 'c_t_4', 'c_t_5', 'c_t_6', 'c_t_7', 'c_t_8', 'c_t_9', 'c_t_10', 'c_t_11', 'c_t_12', 'c_d', 'c_d_1', 'c_d_2', 'c_d_3', 'c_d_4', 'c_d_5', 'c_d_6', 'c_d_7', 'c_d_8', 'c_d_9', 'c_d_10', 'c_d_11', 'c_d_12', 's_experience', 'c_school_under_1', 'c_school_under_2', 'c_school_under_3', 'c_school_under_4', 'c_school_under_5', 'c_school_under_6', 'c_school_under_7', 'c_school_under_8', 'i_school_under_8', 'c_satisfy_group_1', 'c_satisfy_group_2', 'c_satisfy_group_3', 'c_satisfy_group_4', 'c_satisfy_group_5', 'i_satisfy_group_5', 'r_receive_contribute_book'
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
	
	public function update(){
		$params = $this->requests;
		$db = $this->dbh;
		
		$fields = array(
						'type', 'status', 'r_sex', 's_degree', 'i_school_name', 's_province', 's_age', 'r_degree', 'c_s', 'c_s_1', 'c_s_2', 'c_s_3', 'c_s_4', 'c_s_5', 'c_s_6', 'c_s_7', 'c_s_8', 'c_s_9', 'c_s_10', 'c_s_11', 'c_s_12', 'c_m', 'c_m_1', 'c_m_2', 'c_m_3', 'c_m_4', 'c_m_5', 'c_m_6', 'c_m_7', 'c_m_8', 'c_m_9', 'c_m_10', 'c_m_11', 'c_m_12', 'c_t', 'c_t_1', 'c_t_2', 'c_t_3', 'c_t_4', 'c_t_5', 'c_t_6', 'c_t_7', 'c_t_8', 'c_t_9', 'c_t_10', 'c_t_11', 'c_t_12', 'c_d', 'c_d_1', 'c_d_2', 'c_d_3', 'c_d_4', 'c_d_5', 'c_d_6', 'c_d_7', 'c_d_8', 'c_d_9', 'c_d_10', 'c_d_11', 'c_d_12', 's_experience', 'c_school_under_1', 'c_school_under_2', 'c_school_under_3', 'c_school_under_4', 'c_school_under_5', 'c_school_under_6', 'c_school_under_7', 'c_school_under_8', 'i_school_under_8', 'i_school_under_8', 'c_satisfy_group_1', 'c_satisfy_group_2', 'c_satisfy_group_3', 'c_satisfy_group_4', 'c_satisfy_group_5', 'i_satisfy_group_5', 'r_receive_contribute_book'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE participant SET %s";

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
		$query = "SELECT * FROM participant WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function read($conn, $params){
		$firstCondition = true;
		
		$selectQuery = "SELECT id, type, status, DATE_FORMAT(create_date, '%d/%m/%Y') create_date, r_sex ";
		$fromQuery = "FROM participant ";
		$whereQuery = "";
		
		if(isset($params['participant_type']) && $params['participant_type'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "type = '".$params['participant_type']."' ";
		}
		
		if(isset($params['start_date']) && $params['start_date'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "create_date >= STR_TO_DATE('".$params['start_date']."','%d/%m/%Y')";
		}
		
		if(isset($params['end_date']) && $params['end_date'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "create_date <= STR_TO_DATE('".$params['end_date']."','%d/%m/%Y')";
		}
		
		if(isset($params['status']) && $params['status'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "status = '".$params['status']."' ";
		}

		$orderQuery = " ORDER BY id ";
		$limit = "";
		if(isset($params['start_index']) && isset($params['count']) && $params['start_index'] !== '' && $params['count'] !== ''){
			$limit .= " LIMIT ".$params['count'];
			$offset = ($params['start_index'] - 1) > 0 ? ($params['start_index'] - 1) : 0;
			$limit .= " OFFSET ".($offset);
		}
		
		$query = $selectQuery.$fromQuery.$whereQuery.$orderQuery.$limit;

		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
}

?>