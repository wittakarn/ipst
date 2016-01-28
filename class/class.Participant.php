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
						'type', 'create_date', 'r_sex', 's_degree', 'i_school_name', 's_province', 's_age', 'r_degree', 'c_s', 'c_s_1', 'c_s_2', 'c_s_3', 'c_s_4', 'c_s_5', 'c_s_6', 'c_s_7', 'c_s_8', 'c_s_9', 'c_s_10', 'c_s_11', 'c_s_12', 'c_m', 'c_m_1', 'c_m_2', 'c_m_3', 'c_m_4', 'c_m_5', 'c_m_6', 'c_m_7', 'c_m_8', 'c_m_9', 'c_m_10', 'c_m_11', 'c_m_12', 'c_t', 'c_t_1', 'c_t_2', 'c_t_3', 'c_t_4', 'c_t_5', 'c_t_6', 'c_t_7', 'c_t_8', 'c_t_9', 'c_t_10', 'c_t_11', 'c_t_12', 'c_d', 'c_d_1', 'c_d_2', 'c_d_3', 'c_d_4', 'c_d_5', 'c_d_6', 'c_d_7', 'c_d_8', 'c_d_9', 'c_d_10', 'c_d_11', 'c_d_12', 'c_sp', 'c_sp_10', 'c_sp_11', 'c_sp_12', 'c_sc', 'c_sc_10', 'c_sc_11', 'c_sc_12', 'c_sb', 'c_sb_10', 'c_sb_11', 'c_sb_12', 'c_se', 'c_se_10', 'c_se_11', 'c_se_12', 's_experience', 'c_school_under_1', 'c_school_under_2', 'c_school_under_3', 'c_school_under_4', 'c_school_under_5', 'c_school_under_6', 'c_school_under_7', 'c_school_under_8', 'i_school_under_8', 'c_satisfy_group_1', 'c_satisfy_group_2', 'c_satisfy_group_3', 'c_satisfy_group_4', 'c_satisfy_group_5', 'i_satisfy_group_5', 'r_receive_contribute_book'
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
						'type', 'r_sex', 's_degree', 'i_school_name', 's_province', 's_age', 'r_degree', 'c_s', 'c_s_1', 'c_s_2', 'c_s_3', 'c_s_4', 'c_s_5', 'c_s_6', 'c_s_7', 'c_s_8', 'c_s_9', 'c_s_10', 'c_s_11', 'c_s_12', 'c_m', 'c_m_1', 'c_m_2', 'c_m_3', 'c_m_4', 'c_m_5', 'c_m_6', 'c_m_7', 'c_m_8', 'c_m_9', 'c_m_10', 'c_m_11', 'c_m_12', 'c_t', 'c_t_1', 'c_t_2', 'c_t_3', 'c_t_4', 'c_t_5', 'c_t_6', 'c_t_7', 'c_t_8', 'c_t_9', 'c_t_10', 'c_t_11', 'c_t_12', 'c_d', 'c_d_1', 'c_d_2', 'c_d_3', 'c_d_4', 'c_d_5', 'c_d_6', 'c_d_7', 'c_d_8', 'c_d_9', 'c_d_10', 'c_d_11', 'c_d_12', 'c_sp', 'c_sp_10', 'c_sp_11', 'c_sp_12', 'c_sc', 'c_sc_10', 'c_sc_11', 'c_sc_12', 'c_sb', 'c_sb_10', 'c_sb_11', 'c_sb_12', 'c_se', 'c_se_10', 'c_se_11', 'c_se_12', 's_experience', 'c_school_under_1', 'c_school_under_2', 'c_school_under_3', 'c_school_under_4', 'c_school_under_5', 'c_school_under_6', 'c_school_under_7', 'c_school_under_8', 'i_school_under_8', 'i_school_under_8', 'c_satisfy_group_1', 'c_satisfy_group_2', 'c_satisfy_group_3', 'c_satisfy_group_4', 'c_satisfy_group_5', 'i_satisfy_group_5', 'r_receive_contribute_book'
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
		$stmt -> bindParam( ':id', $params['updateId'], PDO::PARAM_INT );
		
		$stmt->execute();
	}
	
	public function updateStatus(){
		$params = $this->requests;
		$db = $this->dbh;
		
		$query = "UPDATE participant SET status=:status ";
		$query .= "WHERE id=:id";
		
		$stmt = $db->prepare($query);
		
		$stmt -> bindParam( ':status', $params['status'], PDO::PARAM_STR );
		$stmt -> bindParam( ':id', $params['updateId'], PDO::PARAM_INT );
		
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
	
	
	public static function searchQuestionnaireHistory($conn, $params){
		$firstCondition = true;
		
		$selectQuery = "SELECT * ";
		$fromQuery = "FROM participant a ";
		$fromQuery .= "LEFT JOIN science_book b ON a.id = b.id ";
		$fromQuery .= "LEFT JOIN science_book_instructor c ON a.id = c.id ";
		$fromQuery .= "LEFT JOIN math_book d ON a.id = d.id ";
		$fromQuery .= "LEFT JOIN math_book_instructor e ON a.id = e.id ";
		$fromQuery .= "LEFT JOIN technology_book f ON a.id = f.id ";
		$fromQuery .= "LEFT JOIN technology_book_instructor g ON a.id = g.id ";
		$fromQuery .= "LEFT JOIN design_book h ON a.id = h.id ";
		$fromQuery .= "LEFT JOIN design_book_instructor i ON a.id = i.id ";
		$whereQuery = "";
		
		if(isset($params['participant_type']) && $params['participant_type'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "a.type = '".$params['participant_type']."' ";
		}
		
		if(isset($params['start_date']) && $params['start_date'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "a.create_date >= STR_TO_DATE('".$params['start_date']."','%d/%m/%Y')";
		}
		
		if(isset($params['end_date']) && $params['end_date'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "a.create_date <= STR_TO_DATE('".$params['end_date']."','%d/%m/%Y')";
		}
		
		if(isset($params['status']) && $params['status'] !== ''){
			if($firstCondition){
				$whereQuery .= " WHERE ";
				$firstCondition = false;
			}else{
				$whereQuery .= " AND ";
			}
			$whereQuery .= "a.status = '".$params['status']."' ";
		}

		$orderQuery = " ORDER BY a.id ";
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
	
	public static function getSexOfParticipantStatistic($conn, $type){
		$selectQuery = "SELECT SUM(r_sex = '1') AS male_count, SUM(r_sex = '2') AS female_count, count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = '".$type."' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getTeacherDegreeStatistic($conn){
		$selectQuery = "SELECT SUM(r_degree = '1') AS 1_count, SUM(r_degree = '2') AS 2_count, SUM(r_degree = '3') AS 3_count, SUM(r_degree = '4') AS 4_count, count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getStudentDegreeStatistic($conn){
		$selectQuery = "SELECT SUM(s_degree = 1) AS 1_count, 
						SUM(s_degree = 2) AS 2_count, 
						SUM(s_degree = 3) AS 3_count, 
						SUM(s_degree = 4) AS 4_count, 
						SUM(s_degree = 5) AS 5_count, 
						SUM(s_degree = 6) AS 6_count, 
						SUM(s_degree = 7) AS 7_count, 
						SUM(s_degree = 8) AS 8_count, 
						SUM(s_degree = 9) AS 9_count, 
						SUM(s_degree = 10) AS 10_count, 
						SUM(s_degree = 11) AS 11_count, 
						SUM(s_degree = 12) AS 12_count, 
						count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 's' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getTeacherSubjectStatistic($conn){
		$selectQuery = "SELECT SUM(c_s = '1') AS s_count, SUM(c_sp = '1') AS sp_count, SUM(c_sc = '1') AS sc_count, SUM(c_sb = '1') AS sb_count, SUM(c_se = '1') AS se_count, SUM(c_m = '1') AS m_count, SUM(c_t = '1') AS t_count, SUM(c_d = '1') AS d_count, count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getTeacherSchoolUnderStatistic($conn){
		$selectQuery = "SELECT SUM(c_school_under_1 = 1) AS 1_count, 
						SUM(c_school_under_2 = 1) AS 2_count, 
						SUM(c_school_under_3 = 1) AS 3_count, 
						SUM(c_school_under_4 = 1) AS 4_count, 
						SUM(c_school_under_5 = 1) AS 5_count, 
						SUM(c_school_under_6 = 1) AS 6_count, 
						SUM(c_school_under_7 = 1) AS 7_count, 
						SUM(c_school_under_8 = 1) AS 8_count, 
						count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getSatisfyStatistic($conn){
		$selectQuery = "SELECT SUM(c_satisfy_group_1 = 1) AS 1_count, 
						SUM(c_satisfy_group_2 = 1) AS 2_count, 
						SUM(c_satisfy_group_3 = 1) AS 3_count, 
						SUM(c_satisfy_group_4 = 1) AS 4_count, 
						SUM(c_satisfy_group_5 = 1) AS 5_count, 
						count(id) AS all_count ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getScienceBookStatistic($conn, $type){
		$selectQuery = "SELECT 
						SUM(b.r_s_1_1_1 = '1') AS count_val1_r_s_1_1_1, SUM(b.r_s_1_1_1 = '2') AS count_val2_r_s_1_1_1, SUM(b.r_s_1_1_2 = '1') AS count_val1_r_s_1_1_2, SUM(b.r_s_1_1_2 = '2') AS count_val2_r_s_1_1_2,SUM(b.r_s_1_1_2 = '3') AS count_val3_r_s_1_1_2, SUM(b.r_s_1_2_1 = '1') AS count_val1_r_s_1_2_1, SUM(b.r_s_1_2_1 = '2') AS count_val2_r_s_1_2_1, SUM(b.r_s_1_2_2 = '1') AS count_val1_r_s_1_2_2, SUM(b.r_s_1_2_2 = '2') AS count_val2_r_s_1_2_2,SUM(b.r_s_1_2_2 = '3') AS count_val3_r_s_1_2_2, SUM(b.r_s_1_3_1 = '1') AS count_val1_r_s_1_3_1, SUM(b.r_s_1_3_1 = '2') AS count_val2_r_s_1_3_1, SUM(b.r_s_1_3_2 = '1') AS count_val1_r_s_1_3_2, SUM(b.r_s_1_3_2 = '2') AS count_val2_r_s_1_3_2,SUM(b.r_s_1_3_2 = '3') AS count_val3_r_s_1_3_2, SUM(b.r_s_1_4_1 = '1') AS count_val1_r_s_1_4_1, SUM(b.r_s_1_4_1 = '2') AS count_val2_r_s_1_4_1, SUM(b.r_s_1_4_2 = '1') AS count_val1_r_s_1_4_2, SUM(b.r_s_1_4_2 = '2') AS count_val2_r_s_1_4_2,SUM(b.r_s_1_4_2 = '3') AS count_val3_r_s_1_4_2, SUM(b.r_s_2_1_1 = '1') AS count_val1_r_s_2_1_1, SUM(b.r_s_2_1_1 = '2') AS count_val2_r_s_2_1_1, SUM(b.r_s_2_1_2 = '1') AS count_val1_r_s_2_1_2, SUM(b.r_s_2_1_2 = '2') AS count_val2_r_s_2_1_2,SUM(b.r_s_2_1_2 = '3') AS count_val3_r_s_2_1_2, SUM(b.r_s_2_2_1 = '1') AS count_val1_r_s_2_2_1, SUM(b.r_s_2_2_1 = '2') AS count_val2_r_s_2_2_1, SUM(b.r_s_2_2_2 = '1') AS count_val1_r_s_2_2_2, SUM(b.r_s_2_2_2 = '2') AS count_val2_r_s_2_2_2,SUM(b.r_s_2_2_2 = '3') AS count_val3_r_s_2_2_2, SUM(b.r_s_3_1_1 = '1') AS count_val1_r_s_3_1_1, SUM(b.r_s_3_1_1 = '2') AS count_val2_r_s_3_1_1, SUM(b.r_s_3_1_2 = '1') AS count_val1_r_s_3_1_2, SUM(b.r_s_3_1_2 = '2') AS count_val2_r_s_3_1_2,SUM(b.r_s_3_1_2 = '3') AS count_val3_r_s_3_1_2, SUM(b.r_s_3_2_1 = '1') AS count_val1_r_s_3_2_1, SUM(b.r_s_3_2_1 = '2') AS count_val2_r_s_3_2_1, SUM(b.r_s_3_2_2 = '1') AS count_val1_r_s_3_2_2, SUM(b.r_s_3_2_2 = '2') AS count_val2_r_s_3_2_2,SUM(b.r_s_3_2_2 = '3') AS count_val3_r_s_3_2_2, SUM(b.r_s_4_1_1 = '1') AS count_val1_r_s_4_1_1, SUM(b.r_s_4_1_1 = '2') AS count_val2_r_s_4_1_1, SUM(b.r_s_4_1_2 = '1') AS count_val1_r_s_4_1_2, SUM(b.r_s_4_1_2 = '2') AS count_val2_r_s_4_1_2,SUM(b.r_s_4_1_2 = '3') AS count_val3_r_s_4_1_2, SUM(b.r_s_4_2_1 = '1') AS count_val1_r_s_4_2_1, SUM(b.r_s_4_2_1 = '2') AS count_val2_r_s_4_2_1, SUM(b.r_s_4_2_2 = '1') AS count_val1_r_s_4_2_2, SUM(b.r_s_4_2_2 = '2') AS count_val2_r_s_4_2_2,SUM(b.r_s_4_2_2 = '3') AS count_val3_r_s_4_2_2, SUM(b.r_s_4_3_1 = '1') AS count_val1_r_s_4_3_1, SUM(b.r_s_4_3_1 = '2') AS count_val2_r_s_4_3_1, SUM(b.r_s_4_3_2 = '1') AS count_val1_r_s_4_3_2, SUM(b.r_s_4_3_2 = '2') AS count_val2_r_s_4_3_2,SUM(b.r_s_4_3_2 = '3') AS count_val3_r_s_4_3_2, SUM(b.r_s_4_4_1 = '1') AS count_val1_r_s_4_4_1, SUM(b.r_s_4_4_1 = '2') AS count_val2_r_s_4_4_1, SUM(b.r_s_4_4_2 = '1') AS count_val1_r_s_4_4_2, SUM(b.r_s_4_4_2 = '2') AS count_val2_r_s_4_4_2,SUM(b.r_s_4_4_2 = '3') AS count_val3_r_s_4_4_2, SUM(b.r_s_5_1_1 = '1') AS count_val1_r_s_5_1_1, SUM(b.r_s_5_1_1 = '2') AS count_val2_r_s_5_1_1, SUM(b.r_s_5_1_2 = '1') AS count_val1_r_s_5_1_2, SUM(b.r_s_5_1_2 = '2') AS count_val2_r_s_5_1_2,SUM(b.r_s_5_1_2 = '3') AS count_val3_r_s_5_1_2, SUM(b.r_s_5_2_1 = '1') AS count_val1_r_s_5_2_1, SUM(b.r_s_5_2_1 = '2') AS count_val2_r_s_5_2_1, SUM(b.r_s_5_2_2 = '1') AS count_val1_r_s_5_2_2, SUM(b.r_s_5_2_2 = '2') AS count_val2_r_s_5_2_2,SUM(b.r_s_5_2_2 = '3') AS count_val3_r_s_5_2_2, SUM(b.r_s_6_1_1 = '1') AS count_val1_r_s_6_1_1, SUM(b.r_s_6_1_1 = '2') AS count_val2_r_s_6_1_1, SUM(b.r_s_6_1_2 = '1') AS count_val1_r_s_6_1_2, SUM(b.r_s_6_1_2 = '2') AS count_val2_r_s_6_1_2,SUM(b.r_s_6_1_2 = '3') AS count_val3_r_s_6_1_2, SUM(b.r_s_6_2_1 = '1') AS count_val1_r_s_6_2_1, SUM(b.r_s_6_2_1 = '2') AS count_val2_r_s_6_2_1, SUM(b.r_s_6_2_2 = '1') AS count_val1_r_s_6_2_2, SUM(b.r_s_6_2_2 = '2') AS count_val2_r_s_6_2_2,SUM(b.r_s_6_2_2 = '3') AS count_val3_r_s_6_2_2, SUM(b.r_s_7_1_1 = '1') AS count_val1_r_s_7_1_1, SUM(b.r_s_7_1_1 = '2') AS count_val2_r_s_7_1_1, SUM(b.r_s_7_1_2 = '1') AS count_val1_r_s_7_1_2, SUM(b.r_s_7_1_2 = '2') AS count_val2_r_s_7_1_2,SUM(b.r_s_7_1_2 = '3') AS count_val3_r_s_7_1_2, SUM(b.r_s_7_2_1 = '1') AS count_val1_r_s_7_2_1, SUM(b.r_s_7_2_1 = '2') AS count_val2_r_s_7_2_1, SUM(b.r_s_7_2_2 = '1') AS count_val1_r_s_7_2_2, SUM(b.r_s_7_2_2 = '2') AS count_val2_r_s_7_2_2,SUM(b.r_s_7_2_2 = '3') AS count_val3_r_s_7_2_2, SUM(b.r_s_8_1_1 = '1') AS count_val1_r_s_8_1_1, SUM(b.r_s_8_1_1 = '2') AS count_val2_r_s_8_1_1, SUM(b.r_s_8_1_2 = '1') AS count_val1_r_s_8_1_2, SUM(b.r_s_8_1_2 = '2') AS count_val2_r_s_8_1_2,SUM(b.r_s_8_1_2 = '3') AS count_val3_r_s_8_1_2, SUM(b.r_s_8_2_1 = '1') AS count_val1_r_s_8_2_1, SUM(b.r_s_8_2_1 = '2') AS count_val2_r_s_8_2_1, SUM(b.r_s_8_2_2 = '1') AS count_val1_r_s_8_2_2, SUM(b.r_s_8_2_2 = '2') AS count_val2_r_s_8_2_2,SUM(b.r_s_8_2_2 = '3') AS count_val3_r_s_8_2_2, SUM(b.r_s_9_1_1 = '1') AS count_val1_r_s_9_1_1, SUM(b.r_s_9_1_1 = '2') AS count_val2_r_s_9_1_1, SUM(b.r_s_9_1_2 = '1') AS count_val1_r_s_9_1_2, SUM(b.r_s_9_1_2 = '2') AS count_val2_r_s_9_1_2,SUM(b.r_s_9_1_2 = '3') AS count_val3_r_s_9_1_2, SUM(b.r_s_9_2_1 = '1') AS count_val1_r_s_9_2_1, SUM(b.r_s_9_2_1 = '2') AS count_val2_r_s_9_2_1, SUM(b.r_s_9_2_2 = '1') AS count_val1_r_s_9_2_2, SUM(b.r_s_9_2_2 = '2') AS count_val2_r_s_9_2_2,SUM(b.r_s_9_2_2 = '3') AS count_val3_r_s_9_2_2, SUM(b.r_s_789_additional_1_1 = '1') AS count_val1_r_s_789_additional_1_1, SUM(b.r_s_789_additional_1_1 = '2') AS count_val2_r_s_789_additional_1_1, SUM(b.r_s_789_additional_1_2 = '1') AS count_val1_r_s_789_additional_1_2, SUM(b.r_s_789_additional_1_2 = '2') AS count_val2_r_s_789_additional_1_2,SUM(b.r_s_789_additional_1_2 = '3') AS count_val3_r_s_789_additional_1_2, SUM(b.r_s_789_additional_2_1 = '1') AS count_val1_r_s_789_additional_2_1, SUM(b.r_s_789_additional_2_1 = '2') AS count_val2_r_s_789_additional_2_1, SUM(b.r_s_789_additional_2_2 = '1') AS count_val1_r_s_789_additional_2_2, SUM(b.r_s_789_additional_2_2 = '2') AS count_val2_r_s_789_additional_2_2,SUM(b.r_s_789_additional_2_2 = '3') AS count_val3_r_s_789_additional_2_2, SUM(b.r_s_789_additional_3_1 = '1') AS count_val1_r_s_789_additional_3_1, SUM(b.r_s_789_additional_3_1 = '2') AS count_val2_r_s_789_additional_3_1, SUM(b.r_s_789_additional_3_2 = '1') AS count_val1_r_s_789_additional_3_2, SUM(b.r_s_789_additional_3_2 = '2') AS count_val2_r_s_789_additional_3_2,SUM(b.r_s_789_additional_3_2 = '3') AS count_val3_r_s_789_additional_3_2, SUM(b.r_s_789_additional_4_1 = '1') AS count_val1_r_s_789_additional_4_1, SUM(b.r_s_789_additional_4_1 = '2') AS count_val2_r_s_789_additional_4_1, SUM(b.r_s_789_additional_4_2 = '1') AS count_val1_r_s_789_additional_4_2, SUM(b.r_s_789_additional_4_2 = '2') AS count_val2_r_s_789_additional_4_2,SUM(b.r_s_789_additional_4_2 = '3') AS count_val3_r_s_789_additional_4_2, SUM(b.r_s_789_additional_5_1 = '1') AS count_val1_r_s_789_additional_5_1, SUM(b.r_s_789_additional_5_1 = '2') AS count_val2_r_s_789_additional_5_1, SUM(b.r_s_789_additional_5_2 = '1') AS count_val1_r_s_789_additional_5_2, SUM(b.r_s_789_additional_5_2 = '2') AS count_val2_r_s_789_additional_5_2,SUM(b.r_s_789_additional_5_2 = '3') AS count_val3_r_s_789_additional_5_2, SUM(b.r_s_101112n_1_1 = '1') AS count_val1_r_s_101112n_1_1, SUM(b.r_s_101112n_1_1 = '2') AS count_val2_r_s_101112n_1_1, SUM(b.r_s_101112n_1_2 = '1') AS count_val1_r_s_101112n_1_2, SUM(b.r_s_101112n_1_2 = '2') AS count_val2_r_s_101112n_1_2,SUM(b.r_s_101112n_1_2 = '3') AS count_val3_r_s_101112n_1_2, SUM(b.r_s_101112n_2_1 = '1') AS count_val1_r_s_101112n_2_1, SUM(b.r_s_101112n_2_1 = '2') AS count_val2_r_s_101112n_2_1, SUM(b.r_s_101112n_2_2 = '1') AS count_val1_r_s_101112n_2_2, SUM(b.r_s_101112n_2_2 = '2') AS count_val2_r_s_101112n_2_2,SUM(b.r_s_101112n_2_2 = '3') AS count_val3_r_s_101112n_2_2, SUM(b.r_s_101112n_3_1 = '1') AS count_val1_r_s_101112n_3_1, SUM(b.r_s_101112n_3_1 = '2') AS count_val2_r_s_101112n_3_1, SUM(b.r_s_101112n_3_2 = '1') AS count_val1_r_s_101112n_3_2, SUM(b.r_s_101112n_3_2 = '2') AS count_val2_r_s_101112n_3_2,SUM(b.r_s_101112n_3_2 = '3') AS count_val3_r_s_101112n_3_2, SUM(b.r_s_101112n_4_1 = '1') AS count_val1_r_s_101112n_4_1, SUM(b.r_s_101112n_4_1 = '2') AS count_val2_r_s_101112n_4_1, SUM(b.r_s_101112n_4_2 = '1') AS count_val1_r_s_101112n_4_2, SUM(b.r_s_101112n_4_2 = '2') AS count_val2_r_s_101112n_4_2,SUM(b.r_s_101112n_4_2 = '3') AS count_val3_r_s_101112n_4_2, SUM(b.r_s_101112n_5_1 = '1') AS count_val1_r_s_101112n_5_1, SUM(b.r_s_101112n_5_1 = '2') AS count_val2_r_s_101112n_5_1, SUM(b.r_s_101112n_5_2 = '1') AS count_val1_r_s_101112n_5_2, SUM(b.r_s_101112n_5_2 = '2') AS count_val2_r_s_101112n_5_2,SUM(b.r_s_101112n_5_2 = '3') AS count_val3_r_s_101112n_5_2, SUM(b.r_s_101112n_6_1 = '1') AS count_val1_r_s_101112n_6_1, SUM(b.r_s_101112n_6_1 = '2') AS count_val2_r_s_101112n_6_1, SUM(b.r_s_101112n_6_2 = '1') AS count_val1_r_s_101112n_6_2, SUM(b.r_s_101112n_6_2 = '2') AS count_val2_r_s_101112n_6_2,SUM(b.r_s_101112n_6_2 = '3') AS count_val3_r_s_101112n_6_2, SUM(b.r_s_101112p_1_1 = '1') AS count_val1_r_s_101112p_1_1, SUM(b.r_s_101112p_1_1 = '2') AS count_val2_r_s_101112p_1_1, SUM(b.r_s_101112p_1_2 = '1') AS count_val1_r_s_101112p_1_2, SUM(b.r_s_101112p_1_2 = '2') AS count_val2_r_s_101112p_1_2,SUM(b.r_s_101112p_1_2 = '3') AS count_val3_r_s_101112p_1_2, SUM(b.r_s_101112p_2_1 = '1') AS count_val1_r_s_101112p_2_1, SUM(b.r_s_101112p_2_1 = '2') AS count_val2_r_s_101112p_2_1, SUM(b.r_s_101112p_2_2 = '1') AS count_val1_r_s_101112p_2_2, SUM(b.r_s_101112p_2_2 = '2') AS count_val2_r_s_101112p_2_2,SUM(b.r_s_101112p_2_2 = '3') AS count_val3_r_s_101112p_2_2, SUM(b.r_s_101112p_3_1 = '1') AS count_val1_r_s_101112p_3_1, SUM(b.r_s_101112p_3_1 = '2') AS count_val2_r_s_101112p_3_1, SUM(b.r_s_101112p_3_2 = '1') AS count_val1_r_s_101112p_3_2, SUM(b.r_s_101112p_3_2 = '2') AS count_val2_r_s_101112p_3_2,SUM(b.r_s_101112p_3_2 = '3') AS count_val3_r_s_101112p_3_2, SUM(b.r_s_101112p_4_1 = '1') AS count_val1_r_s_101112p_4_1, SUM(b.r_s_101112p_4_1 = '2') AS count_val2_r_s_101112p_4_1, SUM(b.r_s_101112p_4_2 = '1') AS count_val1_r_s_101112p_4_2, SUM(b.r_s_101112p_4_2 = '2') AS count_val2_r_s_101112p_4_2,SUM(b.r_s_101112p_4_2 = '3') AS count_val3_r_s_101112p_4_2, SUM(b.r_s_101112p_5_1 = '1') AS count_val1_r_s_101112p_5_1, SUM(b.r_s_101112p_5_1 = '2') AS count_val2_r_s_101112p_5_1, SUM(b.r_s_101112p_5_2 = '1') AS count_val1_r_s_101112p_5_2, SUM(b.r_s_101112p_5_2 = '2') AS count_val2_r_s_101112p_5_2,SUM(b.r_s_101112p_5_2 = '3') AS count_val3_r_s_101112p_5_2, SUM(b.r_s_101112p_6_1 = '1') AS count_val1_r_s_101112p_6_1, SUM(b.r_s_101112p_6_1 = '2') AS count_val2_r_s_101112p_6_1, SUM(b.r_s_101112p_6_2 = '1') AS count_val1_r_s_101112p_6_2, SUM(b.r_s_101112p_6_2 = '2') AS count_val2_r_s_101112p_6_2,SUM(b.r_s_101112p_6_2 = '3') AS count_val3_r_s_101112p_6_2, SUM(b.r_s_101112c_1_1 = '1') AS count_val1_r_s_101112c_1_1, SUM(b.r_s_101112c_1_1 = '2') AS count_val2_r_s_101112c_1_1, SUM(b.r_s_101112c_1_2 = '1') AS count_val1_r_s_101112c_1_2, SUM(b.r_s_101112c_1_2 = '2') AS count_val2_r_s_101112c_1_2,SUM(b.r_s_101112c_1_2 = '3') AS count_val3_r_s_101112c_1_2, SUM(b.r_s_101112c_2_1 = '1') AS count_val1_r_s_101112c_2_1, SUM(b.r_s_101112c_2_1 = '2') AS count_val2_r_s_101112c_2_1, SUM(b.r_s_101112c_2_2 = '1') AS count_val1_r_s_101112c_2_2, SUM(b.r_s_101112c_2_2 = '2') AS count_val2_r_s_101112c_2_2,SUM(b.r_s_101112c_2_2 = '3') AS count_val3_r_s_101112c_2_2, SUM(b.r_s_101112c_3_1 = '1') AS count_val1_r_s_101112c_3_1, SUM(b.r_s_101112c_3_1 = '2') AS count_val2_r_s_101112c_3_1, SUM(b.r_s_101112c_3_2 = '1') AS count_val1_r_s_101112c_3_2, SUM(b.r_s_101112c_3_2 = '2') AS count_val2_r_s_101112c_3_2,SUM(b.r_s_101112c_3_2 = '3') AS count_val3_r_s_101112c_3_2, SUM(b.r_s_101112c_4_1 = '1') AS count_val1_r_s_101112c_4_1, SUM(b.r_s_101112c_4_1 = '2') AS count_val2_r_s_101112c_4_1, SUM(b.r_s_101112c_4_2 = '1') AS count_val1_r_s_101112c_4_2, SUM(b.r_s_101112c_4_2 = '2') AS count_val2_r_s_101112c_4_2,SUM(b.r_s_101112c_4_2 = '3') AS count_val3_r_s_101112c_4_2, SUM(b.r_s_101112c_5_1 = '1') AS count_val1_r_s_101112c_5_1, SUM(b.r_s_101112c_5_1 = '2') AS count_val2_r_s_101112c_5_1, SUM(b.r_s_101112c_5_2 = '1') AS count_val1_r_s_101112c_5_2, SUM(b.r_s_101112c_5_2 = '2') AS count_val2_r_s_101112c_5_2,SUM(b.r_s_101112c_5_2 = '3') AS count_val3_r_s_101112c_5_2, SUM(b.r_s_101112c_6_1 = '1') AS count_val1_r_s_101112c_6_1, SUM(b.r_s_101112c_6_1 = '2') AS count_val2_r_s_101112c_6_1, SUM(b.r_s_101112c_6_2 = '1') AS count_val1_r_s_101112c_6_2, SUM(b.r_s_101112c_6_2 = '2') AS count_val2_r_s_101112c_6_2,SUM(b.r_s_101112c_6_2 = '3') AS count_val3_r_s_101112c_6_2, SUM(b.r_s_101112b_1_1 = '1') AS count_val1_r_s_101112b_1_1, SUM(b.r_s_101112b_1_1 = '2') AS count_val2_r_s_101112b_1_1, SUM(b.r_s_101112b_1_2 = '1') AS count_val1_r_s_101112b_1_2, SUM(b.r_s_101112b_1_2 = '2') AS count_val2_r_s_101112b_1_2,SUM(b.r_s_101112b_1_2 = '3') AS count_val3_r_s_101112b_1_2, SUM(b.r_s_101112b_2_1 = '1') AS count_val1_r_s_101112b_2_1, SUM(b.r_s_101112b_2_1 = '2') AS count_val2_r_s_101112b_2_1, SUM(b.r_s_101112b_2_2 = '1') AS count_val1_r_s_101112b_2_2, SUM(b.r_s_101112b_2_2 = '2') AS count_val2_r_s_101112b_2_2,SUM(b.r_s_101112b_2_2 = '3') AS count_val3_r_s_101112b_2_2, SUM(b.r_s_101112b_3_1 = '1') AS count_val1_r_s_101112b_3_1, SUM(b.r_s_101112b_3_1 = '2') AS count_val2_r_s_101112b_3_1, SUM(b.r_s_101112b_3_2 = '1') AS count_val1_r_s_101112b_3_2, SUM(b.r_s_101112b_3_2 = '2') AS count_val2_r_s_101112b_3_2,SUM(b.r_s_101112b_3_2 = '3') AS count_val3_r_s_101112b_3_2, SUM(b.r_s_101112b_4_1 = '1') AS count_val1_r_s_101112b_4_1, SUM(b.r_s_101112b_4_1 = '2') AS count_val2_r_s_101112b_4_1, SUM(b.r_s_101112b_4_2 = '1') AS count_val1_r_s_101112b_4_2, SUM(b.r_s_101112b_4_2 = '2') AS count_val2_r_s_101112b_4_2,SUM(b.r_s_101112b_4_2 = '3') AS count_val3_r_s_101112b_4_2, SUM(b.r_s_101112b_5_1 = '1') AS count_val1_r_s_101112b_5_1, SUM(b.r_s_101112b_5_1 = '2') AS count_val2_r_s_101112b_5_1, SUM(b.r_s_101112b_5_2 = '1') AS count_val1_r_s_101112b_5_2, SUM(b.r_s_101112b_5_2 = '2') AS count_val2_r_s_101112b_5_2,SUM(b.r_s_101112b_5_2 = '3') AS count_val3_r_s_101112b_5_2, SUM(b.r_s_101112b_6_1 = '1') AS count_val1_r_s_101112b_6_1, SUM(b.r_s_101112b_6_1 = '2') AS count_val2_r_s_101112b_6_1, SUM(b.r_s_101112b_6_2 = '1') AS count_val1_r_s_101112b_6_2, SUM(b.r_s_101112b_6_2 = '2') AS count_val2_r_s_101112b_6_2,SUM(b.r_s_101112b_6_2 = '3') AS count_val3_r_s_101112b_6_2, SUM(b.r_s_101112e_1_1 = '1') AS count_val1_r_s_101112e_1_1, SUM(b.r_s_101112e_1_1 = '2') AS count_val2_r_s_101112e_1_1, SUM(b.r_s_101112e_1_2 = '1') AS count_val1_r_s_101112e_1_2, SUM(b.r_s_101112e_1_2 = '2') AS count_val2_r_s_101112e_1_2,SUM(b.r_s_101112e_1_2 = '3') AS count_val3_r_s_101112e_1_2, SUM(b.r_s_101112e_2_1 = '1') AS count_val1_r_s_101112e_2_1, SUM(b.r_s_101112e_2_1 = '2') AS count_val2_r_s_101112e_2_1, SUM(b.r_s_101112e_2_2 = '1') AS count_val1_r_s_101112e_2_2, SUM(b.r_s_101112e_2_2 = '2') AS count_val2_r_s_101112e_2_2,SUM(b.r_s_101112e_2_2 = '3') AS count_val3_r_s_101112e_2_2, SUM(b.r_s_101112e_3_1 = '1') AS count_val1_r_s_101112e_3_1, SUM(b.r_s_101112e_3_1 = '2') AS count_val2_r_s_101112e_3_1, SUM(b.r_s_101112e_3_2 = '1') AS count_val1_r_s_101112e_3_2, SUM(b.r_s_101112e_3_2 = '2') AS count_val2_r_s_101112e_3_2,SUM(b.r_s_101112e_3_2 = '3') AS count_val3_r_s_101112e_3_2, SUM(b.r_s_101112e_4_1 = '1') AS count_val1_r_s_101112e_4_1, SUM(b.r_s_101112e_4_1 = '2') AS count_val2_r_s_101112e_4_1, SUM(b.r_s_101112e_4_2 = '1') AS count_val1_r_s_101112e_4_2, SUM(b.r_s_101112e_4_2 = '2') AS count_val2_r_s_101112e_4_2,SUM(b.r_s_101112e_4_2 = '3') AS count_val3_r_s_101112e_4_2 ";
		$fromQuery = "FROM participant a INNER JOIN science_book b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = '".$type."' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getScienceBookInstructorStatistic($conn){
		$selectQuery = "SELECT
						SUM(b.r_s_ins_1_1_1 = '1') AS count_val1_r_s_ins_1_1_1, SUM(b.r_s_ins_1_1_1 = '2') AS count_val2_r_s_ins_1_1_1, SUM(b.r_s_ins_1_1_2 = '1') AS count_val1_r_s_ins_1_1_2, SUM(b.r_s_ins_1_1_2 = '2') AS count_val2_r_s_ins_1_1_2,SUM(b.r_s_ins_1_1_2 = '3') AS count_val3_r_s_ins_1_1_2, SUM(b.r_s_ins_2_1_1 = '1') AS count_val1_r_s_ins_2_1_1, SUM(b.r_s_ins_2_1_1 = '2') AS count_val2_r_s_ins_2_1_1, SUM(b.r_s_ins_2_1_2 = '1') AS count_val1_r_s_ins_2_1_2, SUM(b.r_s_ins_2_1_2 = '2') AS count_val2_r_s_ins_2_1_2,SUM(b.r_s_ins_2_1_2 = '3') AS count_val3_r_s_ins_2_1_2, SUM(b.r_s_ins_3_1_1 = '1') AS count_val1_r_s_ins_3_1_1, SUM(b.r_s_ins_3_1_1 = '2') AS count_val2_r_s_ins_3_1_1, SUM(b.r_s_ins_3_1_2 = '1') AS count_val1_r_s_ins_3_1_2, SUM(b.r_s_ins_3_1_2 = '2') AS count_val2_r_s_ins_3_1_2,SUM(b.r_s_ins_3_1_2 = '3') AS count_val3_r_s_ins_3_1_2, SUM(b.r_s_ins_4_1_1 = '1') AS count_val1_r_s_ins_4_1_1, SUM(b.r_s_ins_4_1_1 = '2') AS count_val2_r_s_ins_4_1_1, SUM(b.r_s_ins_4_1_2 = '1') AS count_val1_r_s_ins_4_1_2, SUM(b.r_s_ins_4_1_2 = '2') AS count_val2_r_s_ins_4_1_2,SUM(b.r_s_ins_4_1_2 = '3') AS count_val3_r_s_ins_4_1_2, SUM(b.r_s_ins_5_1_1 = '1') AS count_val1_r_s_ins_5_1_1, SUM(b.r_s_ins_5_1_1 = '2') AS count_val2_r_s_ins_5_1_1, SUM(b.r_s_ins_5_1_2 = '1') AS count_val1_r_s_ins_5_1_2, SUM(b.r_s_ins_5_1_2 = '2') AS count_val2_r_s_ins_5_1_2,SUM(b.r_s_ins_5_1_2 = '3') AS count_val3_r_s_ins_5_1_2, SUM(b.r_s_ins_6_1_1 = '1') AS count_val1_r_s_ins_6_1_1, SUM(b.r_s_ins_6_1_1 = '2') AS count_val2_r_s_ins_6_1_1, SUM(b.r_s_ins_6_1_2 = '1') AS count_val1_r_s_ins_6_1_2, SUM(b.r_s_ins_6_1_2 = '2') AS count_val2_r_s_ins_6_1_2,SUM(b.r_s_ins_6_1_2 = '3') AS count_val3_r_s_ins_6_1_2, SUM(b.r_s_ins_7_1_1 = '1') AS count_val1_r_s_ins_7_1_1, SUM(b.r_s_ins_7_1_1 = '2') AS count_val2_r_s_ins_7_1_1, SUM(b.r_s_ins_7_1_2 = '1') AS count_val1_r_s_ins_7_1_2, SUM(b.r_s_ins_7_1_2 = '2') AS count_val2_r_s_ins_7_1_2,SUM(b.r_s_ins_7_1_2 = '3') AS count_val3_r_s_ins_7_1_2, SUM(b.r_s_ins_7_2_1 = '1') AS count_val1_r_s_ins_7_2_1, SUM(b.r_s_ins_7_2_1 = '2') AS count_val2_r_s_ins_7_2_1, SUM(b.r_s_ins_7_2_2 = '1') AS count_val1_r_s_ins_7_2_2, SUM(b.r_s_ins_7_2_2 = '2') AS count_val2_r_s_ins_7_2_2,SUM(b.r_s_ins_7_2_2 = '3') AS count_val3_r_s_ins_7_2_2, SUM(b.r_s_ins_8_1_1 = '1') AS count_val1_r_s_ins_8_1_1, SUM(b.r_s_ins_8_1_1 = '2') AS count_val2_r_s_ins_8_1_1, SUM(b.r_s_ins_8_1_2 = '1') AS count_val1_r_s_ins_8_1_2, SUM(b.r_s_ins_8_1_2 = '2') AS count_val2_r_s_ins_8_1_2,SUM(b.r_s_ins_8_1_2 = '3') AS count_val3_r_s_ins_8_1_2, SUM(b.r_s_ins_8_2_1 = '1') AS count_val1_r_s_ins_8_2_1, SUM(b.r_s_ins_8_2_1 = '2') AS count_val2_r_s_ins_8_2_1, SUM(b.r_s_ins_8_2_2 = '1') AS count_val1_r_s_ins_8_2_2, SUM(b.r_s_ins_8_2_2 = '2') AS count_val2_r_s_ins_8_2_2,SUM(b.r_s_ins_8_2_2 = '3') AS count_val3_r_s_ins_8_2_2, SUM(b.r_s_ins_9_1_1 = '1') AS count_val1_r_s_ins_9_1_1, SUM(b.r_s_ins_9_1_1 = '2') AS count_val2_r_s_ins_9_1_1, SUM(b.r_s_ins_9_1_2 = '1') AS count_val1_r_s_ins_9_1_2, SUM(b.r_s_ins_9_1_2 = '2') AS count_val2_r_s_ins_9_1_2,SUM(b.r_s_ins_9_1_2 = '3') AS count_val3_r_s_ins_9_1_2, SUM(b.r_s_ins_9_2_1 = '1') AS count_val1_r_s_ins_9_2_1, SUM(b.r_s_ins_9_2_1 = '2') AS count_val2_r_s_ins_9_2_1, SUM(b.r_s_ins_9_2_2 = '1') AS count_val1_r_s_ins_9_2_2, SUM(b.r_s_ins_9_2_2 = '2') AS count_val2_r_s_ins_9_2_2,SUM(b.r_s_ins_9_2_2 = '3') AS count_val3_r_s_ins_9_2_2, SUM(b.r_s_ins_789_additional_1_1 = '1') AS count_val1_r_s_ins_789_additional_1_1, SUM(b.r_s_ins_789_additional_1_1 = '2') AS count_val2_r_s_ins_789_additional_1_1, SUM(b.r_s_ins_789_additional_1_2 = '1') AS count_val1_r_s_ins_789_additional_1_2, SUM(b.r_s_ins_789_additional_1_2 = '2') AS count_val2_r_s_ins_789_additional_1_2,SUM(b.r_s_ins_789_additional_1_2 = '3') AS count_val3_r_s_ins_789_additional_1_2, SUM(b.r_s_ins_789_additional_2_1 = '1') AS count_val1_r_s_ins_789_additional_2_1, SUM(b.r_s_ins_789_additional_2_1 = '2') AS count_val2_r_s_ins_789_additional_2_1, SUM(b.r_s_ins_789_additional_2_2 = '1') AS count_val1_r_s_ins_789_additional_2_2, SUM(b.r_s_ins_789_additional_2_2 = '2') AS count_val2_r_s_ins_789_additional_2_2,SUM(b.r_s_ins_789_additional_2_2 = '3') AS count_val3_r_s_ins_789_additional_2_2, SUM(b.r_s_ins_789_additional_3_1 = '1') AS count_val1_r_s_ins_789_additional_3_1, SUM(b.r_s_ins_789_additional_3_1 = '2') AS count_val2_r_s_ins_789_additional_3_1, SUM(b.r_s_ins_789_additional_3_2 = '1') AS count_val1_r_s_ins_789_additional_3_2, SUM(b.r_s_ins_789_additional_3_2 = '2') AS count_val2_r_s_ins_789_additional_3_2,SUM(b.r_s_ins_789_additional_3_2 = '3') AS count_val3_r_s_ins_789_additional_3_2, SUM(b.r_s_ins_789_additional_4_1 = '1') AS count_val1_r_s_ins_789_additional_4_1, SUM(b.r_s_ins_789_additional_4_1 = '2') AS count_val2_r_s_ins_789_additional_4_1, SUM(b.r_s_ins_789_additional_4_2 = '1') AS count_val1_r_s_ins_789_additional_4_2, SUM(b.r_s_ins_789_additional_4_2 = '2') AS count_val2_r_s_ins_789_additional_4_2,SUM(b.r_s_ins_789_additional_4_2 = '3') AS count_val3_r_s_ins_789_additional_4_2, SUM(b.r_s_ins_789_additional_5_1 = '1') AS count_val1_r_s_ins_789_additional_5_1, SUM(b.r_s_ins_789_additional_5_1 = '2') AS count_val2_r_s_ins_789_additional_5_1, SUM(b.r_s_ins_789_additional_5_2 = '1') AS count_val1_r_s_ins_789_additional_5_2, SUM(b.r_s_ins_789_additional_5_2 = '2') AS count_val2_r_s_ins_789_additional_5_2,SUM(b.r_s_ins_789_additional_5_2 = '3') AS count_val3_r_s_ins_789_additional_5_2, SUM(b.r_s_ins_101112n_1_1 = '1') AS count_val1_r_s_ins_101112n_1_1, SUM(b.r_s_ins_101112n_1_1 = '2') AS count_val2_r_s_ins_101112n_1_1, SUM(b.r_s_ins_101112n_1_2 = '1') AS count_val1_r_s_ins_101112n_1_2, SUM(b.r_s_ins_101112n_1_2 = '2') AS count_val2_r_s_ins_101112n_1_2,SUM(b.r_s_ins_101112n_1_2 = '3') AS count_val3_r_s_ins_101112n_1_2, SUM(b.r_s_ins_101112n_2_1 = '1') AS count_val1_r_s_ins_101112n_2_1, SUM(b.r_s_ins_101112n_2_1 = '2') AS count_val2_r_s_ins_101112n_2_1, SUM(b.r_s_ins_101112n_2_2 = '1') AS count_val1_r_s_ins_101112n_2_2, SUM(b.r_s_ins_101112n_2_2 = '2') AS count_val2_r_s_ins_101112n_2_2,SUM(b.r_s_ins_101112n_2_2 = '3') AS count_val3_r_s_ins_101112n_2_2, SUM(b.r_s_ins_101112n_3_1 = '1') AS count_val1_r_s_ins_101112n_3_1, SUM(b.r_s_ins_101112n_3_1 = '2') AS count_val2_r_s_ins_101112n_3_1, SUM(b.r_s_ins_101112n_3_2 = '1') AS count_val1_r_s_ins_101112n_3_2, SUM(b.r_s_ins_101112n_3_2 = '2') AS count_val2_r_s_ins_101112n_3_2,SUM(b.r_s_ins_101112n_3_2 = '3') AS count_val3_r_s_ins_101112n_3_2, SUM(b.r_s_ins_101112n_4_1 = '1') AS count_val1_r_s_ins_101112n_4_1, SUM(b.r_s_ins_101112n_4_1 = '2') AS count_val2_r_s_ins_101112n_4_1, SUM(b.r_s_ins_101112n_4_2 = '1') AS count_val1_r_s_ins_101112n_4_2, SUM(b.r_s_ins_101112n_4_2 = '2') AS count_val2_r_s_ins_101112n_4_2,SUM(b.r_s_ins_101112n_4_2 = '3') AS count_val3_r_s_ins_101112n_4_2, SUM(b.r_s_ins_101112n_5_1 = '1') AS count_val1_r_s_ins_101112n_5_1, SUM(b.r_s_ins_101112n_5_1 = '2') AS count_val2_r_s_ins_101112n_5_1, SUM(b.r_s_ins_101112n_5_2 = '1') AS count_val1_r_s_ins_101112n_5_2, SUM(b.r_s_ins_101112n_5_2 = '2') AS count_val2_r_s_ins_101112n_5_2,SUM(b.r_s_ins_101112n_5_2 = '3') AS count_val3_r_s_ins_101112n_5_2, SUM(b.r_s_ins_101112n_6_1 = '1') AS count_val1_r_s_ins_101112n_6_1, SUM(b.r_s_ins_101112n_6_1 = '2') AS count_val2_r_s_ins_101112n_6_1, SUM(b.r_s_ins_101112n_6_2 = '1') AS count_val1_r_s_ins_101112n_6_2, SUM(b.r_s_ins_101112n_6_2 = '2') AS count_val2_r_s_ins_101112n_6_2,SUM(b.r_s_ins_101112n_6_2 = '3') AS count_val3_r_s_ins_101112n_6_2, SUM(b.r_s_ins_101112p_1_1 = '1') AS count_val1_r_s_ins_101112p_1_1, SUM(b.r_s_ins_101112p_1_1 = '2') AS count_val2_r_s_ins_101112p_1_1, SUM(b.r_s_ins_101112p_1_2 = '1') AS count_val1_r_s_ins_101112p_1_2, SUM(b.r_s_ins_101112p_1_2 = '2') AS count_val2_r_s_ins_101112p_1_2,SUM(b.r_s_ins_101112p_1_2 = '3') AS count_val3_r_s_ins_101112p_1_2, SUM(b.r_s_ins_101112p_2_1 = '1') AS count_val1_r_s_ins_101112p_2_1, SUM(b.r_s_ins_101112p_2_1 = '2') AS count_val2_r_s_ins_101112p_2_1, SUM(b.r_s_ins_101112p_2_2 = '1') AS count_val1_r_s_ins_101112p_2_2, SUM(b.r_s_ins_101112p_2_2 = '2') AS count_val2_r_s_ins_101112p_2_2,SUM(b.r_s_ins_101112p_2_2 = '3') AS count_val3_r_s_ins_101112p_2_2, SUM(b.r_s_ins_101112p_3_1 = '1') AS count_val1_r_s_ins_101112p_3_1, SUM(b.r_s_ins_101112p_3_1 = '2') AS count_val2_r_s_ins_101112p_3_1, SUM(b.r_s_ins_101112p_3_2 = '1') AS count_val1_r_s_ins_101112p_3_2, SUM(b.r_s_ins_101112p_3_2 = '2') AS count_val2_r_s_ins_101112p_3_2,SUM(b.r_s_ins_101112p_3_2 = '3') AS count_val3_r_s_ins_101112p_3_2, SUM(b.r_s_ins_101112p_4_1 = '1') AS count_val1_r_s_ins_101112p_4_1, SUM(b.r_s_ins_101112p_4_1 = '2') AS count_val2_r_s_ins_101112p_4_1, SUM(b.r_s_ins_101112p_4_2 = '1') AS count_val1_r_s_ins_101112p_4_2, SUM(b.r_s_ins_101112p_4_2 = '2') AS count_val2_r_s_ins_101112p_4_2,SUM(b.r_s_ins_101112p_4_2 = '3') AS count_val3_r_s_ins_101112p_4_2, SUM(b.r_s_ins_101112p_5_1 = '1') AS count_val1_r_s_ins_101112p_5_1, SUM(b.r_s_ins_101112p_5_1 = '2') AS count_val2_r_s_ins_101112p_5_1, SUM(b.r_s_ins_101112p_5_2 = '1') AS count_val1_r_s_ins_101112p_5_2, SUM(b.r_s_ins_101112p_5_2 = '2') AS count_val2_r_s_ins_101112p_5_2,SUM(b.r_s_ins_101112p_5_2 = '3') AS count_val3_r_s_ins_101112p_5_2, SUM(b.r_s_ins_101112p_6_1 = '1') AS count_val1_r_s_ins_101112p_6_1, SUM(b.r_s_ins_101112p_6_1 = '2') AS count_val2_r_s_ins_101112p_6_1, SUM(b.r_s_ins_101112p_6_2 = '1') AS count_val1_r_s_ins_101112p_6_2, SUM(b.r_s_ins_101112p_6_2 = '2') AS count_val2_r_s_ins_101112p_6_2,SUM(b.r_s_ins_101112p_6_2 = '3') AS count_val3_r_s_ins_101112p_6_2, SUM(b.r_s_ins_101112c_1_1 = '1') AS count_val1_r_s_ins_101112c_1_1, SUM(b.r_s_ins_101112c_1_1 = '2') AS count_val2_r_s_ins_101112c_1_1, SUM(b.r_s_ins_101112c_1_2 = '1') AS count_val1_r_s_ins_101112c_1_2, SUM(b.r_s_ins_101112c_1_2 = '2') AS count_val2_r_s_ins_101112c_1_2,SUM(b.r_s_ins_101112c_1_2 = '3') AS count_val3_r_s_ins_101112c_1_2, SUM(b.r_s_ins_101112c_2_1 = '1') AS count_val1_r_s_ins_101112c_2_1, SUM(b.r_s_ins_101112c_2_1 = '2') AS count_val2_r_s_ins_101112c_2_1, SUM(b.r_s_ins_101112c_2_2 = '1') AS count_val1_r_s_ins_101112c_2_2, SUM(b.r_s_ins_101112c_2_2 = '2') AS count_val2_r_s_ins_101112c_2_2,SUM(b.r_s_ins_101112c_2_2 = '3') AS count_val3_r_s_ins_101112c_2_2, SUM(b.r_s_ins_101112c_3_1 = '1') AS count_val1_r_s_ins_101112c_3_1, SUM(b.r_s_ins_101112c_3_1 = '2') AS count_val2_r_s_ins_101112c_3_1, SUM(b.r_s_ins_101112c_3_2 = '1') AS count_val1_r_s_ins_101112c_3_2, SUM(b.r_s_ins_101112c_3_2 = '2') AS count_val2_r_s_ins_101112c_3_2,SUM(b.r_s_ins_101112c_3_2 = '3') AS count_val3_r_s_ins_101112c_3_2, SUM(b.r_s_ins_101112c_4_1 = '1') AS count_val1_r_s_ins_101112c_4_1, SUM(b.r_s_ins_101112c_4_1 = '2') AS count_val2_r_s_ins_101112c_4_1, SUM(b.r_s_ins_101112c_4_2 = '1') AS count_val1_r_s_ins_101112c_4_2, SUM(b.r_s_ins_101112c_4_2 = '2') AS count_val2_r_s_ins_101112c_4_2,SUM(b.r_s_ins_101112c_4_2 = '3') AS count_val3_r_s_ins_101112c_4_2, SUM(b.r_s_ins_101112c_5_1 = '1') AS count_val1_r_s_ins_101112c_5_1, SUM(b.r_s_ins_101112c_5_1 = '2') AS count_val2_r_s_ins_101112c_5_1, SUM(b.r_s_ins_101112c_5_2 = '1') AS count_val1_r_s_ins_101112c_5_2, SUM(b.r_s_ins_101112c_5_2 = '2') AS count_val2_r_s_ins_101112c_5_2,SUM(b.r_s_ins_101112c_5_2 = '3') AS count_val3_r_s_ins_101112c_5_2, SUM(b.r_s_ins_101112c_6_1 = '1') AS count_val1_r_s_ins_101112c_6_1, SUM(b.r_s_ins_101112c_6_1 = '2') AS count_val2_r_s_ins_101112c_6_1, SUM(b.r_s_ins_101112c_6_2 = '1') AS count_val1_r_s_ins_101112c_6_2, SUM(b.r_s_ins_101112c_6_2 = '2') AS count_val2_r_s_ins_101112c_6_2,SUM(b.r_s_ins_101112c_6_2 = '3') AS count_val3_r_s_ins_101112c_6_2, SUM(b.r_s_ins_101112b_1_1 = '1') AS count_val1_r_s_ins_101112b_1_1, SUM(b.r_s_ins_101112b_1_1 = '2') AS count_val2_r_s_ins_101112b_1_1, SUM(b.r_s_ins_101112b_1_2 = '1') AS count_val1_r_s_ins_101112b_1_2, SUM(b.r_s_ins_101112b_1_2 = '2') AS count_val2_r_s_ins_101112b_1_2,SUM(b.r_s_ins_101112b_1_2 = '3') AS count_val3_r_s_ins_101112b_1_2, SUM(b.r_s_ins_101112b_2_1 = '1') AS count_val1_r_s_ins_101112b_2_1, SUM(b.r_s_ins_101112b_2_1 = '2') AS count_val2_r_s_ins_101112b_2_1, SUM(b.r_s_ins_101112b_2_2 = '1') AS count_val1_r_s_ins_101112b_2_2, SUM(b.r_s_ins_101112b_2_2 = '2') AS count_val2_r_s_ins_101112b_2_2,SUM(b.r_s_ins_101112b_2_2 = '3') AS count_val3_r_s_ins_101112b_2_2, SUM(b.r_s_ins_101112b_3_1 = '1') AS count_val1_r_s_ins_101112b_3_1, SUM(b.r_s_ins_101112b_3_1 = '2') AS count_val2_r_s_ins_101112b_3_1, SUM(b.r_s_ins_101112b_3_2 = '1') AS count_val1_r_s_ins_101112b_3_2, SUM(b.r_s_ins_101112b_3_2 = '2') AS count_val2_r_s_ins_101112b_3_2,SUM(b.r_s_ins_101112b_3_2 = '3') AS count_val3_r_s_ins_101112b_3_2, SUM(b.r_s_ins_101112b_4_1 = '1') AS count_val1_r_s_ins_101112b_4_1, SUM(b.r_s_ins_101112b_4_1 = '2') AS count_val2_r_s_ins_101112b_4_1, SUM(b.r_s_ins_101112b_4_2 = '1') AS count_val1_r_s_ins_101112b_4_2, SUM(b.r_s_ins_101112b_4_2 = '2') AS count_val2_r_s_ins_101112b_4_2,SUM(b.r_s_ins_101112b_4_2 = '3') AS count_val3_r_s_ins_101112b_4_2, SUM(b.r_s_ins_101112b_5_1 = '1') AS count_val1_r_s_ins_101112b_5_1, SUM(b.r_s_ins_101112b_5_1 = '2') AS count_val2_r_s_ins_101112b_5_1, SUM(b.r_s_ins_101112b_5_2 = '1') AS count_val1_r_s_ins_101112b_5_2, SUM(b.r_s_ins_101112b_5_2 = '2') AS count_val2_r_s_ins_101112b_5_2,SUM(b.r_s_ins_101112b_5_2 = '3') AS count_val3_r_s_ins_101112b_5_2, SUM(b.r_s_ins_101112b_6_1 = '1') AS count_val1_r_s_ins_101112b_6_1, SUM(b.r_s_ins_101112b_6_1 = '2') AS count_val2_r_s_ins_101112b_6_1, SUM(b.r_s_ins_101112b_6_2 = '1') AS count_val1_r_s_ins_101112b_6_2, SUM(b.r_s_ins_101112b_6_2 = '2') AS count_val2_r_s_ins_101112b_6_2,SUM(b.r_s_ins_101112b_6_2 = '3') AS count_val3_r_s_ins_101112b_6_2, SUM(b.r_s_ins_101112e_1_1 = '1') AS count_val1_r_s_ins_101112e_1_1, SUM(b.r_s_ins_101112e_1_1 = '2') AS count_val2_r_s_ins_101112e_1_1, SUM(b.r_s_ins_101112e_1_2 = '1') AS count_val1_r_s_ins_101112e_1_2, SUM(b.r_s_ins_101112e_1_2 = '2') AS count_val2_r_s_ins_101112e_1_2,SUM(b.r_s_ins_101112e_1_2 = '3') AS count_val3_r_s_ins_101112e_1_2, SUM(b.r_s_ins_101112e_2_1 = '1') AS count_val1_r_s_ins_101112e_2_1, SUM(b.r_s_ins_101112e_2_1 = '2') AS count_val2_r_s_ins_101112e_2_1, SUM(b.r_s_ins_101112e_2_2 = '1') AS count_val1_r_s_ins_101112e_2_2, SUM(b.r_s_ins_101112e_2_2 = '2') AS count_val2_r_s_ins_101112e_2_2,SUM(b.r_s_ins_101112e_2_2 = '3') AS count_val3_r_s_ins_101112e_2_2, SUM(b.r_s_ins_101112e_3_1 = '1') AS count_val1_r_s_ins_101112e_3_1, SUM(b.r_s_ins_101112e_3_1 = '2') AS count_val2_r_s_ins_101112e_3_1, SUM(b.r_s_ins_101112e_3_2 = '1') AS count_val1_r_s_ins_101112e_3_2, SUM(b.r_s_ins_101112e_3_2 = '2') AS count_val2_r_s_ins_101112e_3_2,SUM(b.r_s_ins_101112e_3_2 = '3') AS count_val3_r_s_ins_101112e_3_2, SUM(b.r_s_ins_101112e_4_1 = '1') AS count_val1_r_s_ins_101112e_4_1, SUM(b.r_s_ins_101112e_4_1 = '2') AS count_val2_r_s_ins_101112e_4_1, SUM(b.r_s_ins_101112e_4_2 = '1') AS count_val1_r_s_ins_101112e_4_2, SUM(b.r_s_ins_101112e_4_2 = '2') AS count_val2_r_s_ins_101112e_4_2,SUM(b.r_s_ins_101112e_4_2 = '3') AS count_val3_r_s_ins_101112e_4_2 ";
		$fromQuery = "FROM participant a INNER JOIN science_book_instructor b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a'  ";
		$whereQuery .= "AND a.type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getMathBookStatistic($conn, $type){
		$selectQuery = "SELECT 
						SUM(b.r_m_1_1_1 = '1') AS count_val1_r_m_1_1_1, SUM(b.r_m_1_1_1 = '2') AS count_val2_r_m_1_1_1, SUM(b.r_m_1_1_2 = '1') AS count_val1_r_m_1_1_2, SUM(b.r_m_1_1_2 = '2') AS count_val2_r_m_1_1_2,SUM(b.r_m_1_1_2 = '3') AS count_val3_r_m_1_1_2, SUM(b.r_m_1_2_1 = '1') AS count_val1_r_m_1_2_1, SUM(b.r_m_1_2_1 = '2') AS count_val2_r_m_1_2_1, SUM(b.r_m_1_2_2 = '1') AS count_val1_r_m_1_2_2, SUM(b.r_m_1_2_2 = '2') AS count_val2_r_m_1_2_2,SUM(b.r_m_1_2_2 = '3') AS count_val3_r_m_1_2_2, SUM(b.r_m_1_3_1 = '1') AS count_val1_r_m_1_3_1, SUM(b.r_m_1_3_1 = '2') AS count_val2_r_m_1_3_1, SUM(b.r_m_1_3_2 = '1') AS count_val1_r_m_1_3_2, SUM(b.r_m_1_3_2 = '2') AS count_val2_r_m_1_3_2,SUM(b.r_m_1_3_2 = '3') AS count_val3_r_m_1_3_2, SUM(b.r_m_1_4_1 = '1') AS count_val1_r_m_1_4_1, SUM(b.r_m_1_4_1 = '2') AS count_val2_r_m_1_4_1, SUM(b.r_m_1_4_2 = '1') AS count_val1_r_m_1_4_2, SUM(b.r_m_1_4_2 = '2') AS count_val2_r_m_1_4_2,SUM(b.r_m_1_4_2 = '3') AS count_val3_r_m_1_4_2, SUM(b.r_m_2_1_1 = '1') AS count_val1_r_m_2_1_1, SUM(b.r_m_2_1_1 = '2') AS count_val2_r_m_2_1_1, SUM(b.r_m_2_1_2 = '1') AS count_val1_r_m_2_1_2, SUM(b.r_m_2_1_2 = '2') AS count_val2_r_m_2_1_2,SUM(b.r_m_2_1_2 = '3') AS count_val3_r_m_2_1_2, SUM(b.r_m_2_2_1 = '1') AS count_val1_r_m_2_2_1, SUM(b.r_m_2_2_1 = '2') AS count_val2_r_m_2_2_1, SUM(b.r_m_2_2_2 = '1') AS count_val1_r_m_2_2_2, SUM(b.r_m_2_2_2 = '2') AS count_val2_r_m_2_2_2,SUM(b.r_m_2_2_2 = '3') AS count_val3_r_m_2_2_2, SUM(b.r_m_2_3_1 = '1') AS count_val1_r_m_2_3_1, SUM(b.r_m_2_3_1 = '2') AS count_val2_r_m_2_3_1, SUM(b.r_m_2_3_2 = '1') AS count_val1_r_m_2_3_2, SUM(b.r_m_2_3_2 = '2') AS count_val2_r_m_2_3_2,SUM(b.r_m_2_3_2 = '3') AS count_val3_r_m_2_3_2, SUM(b.r_m_3_1_1 = '1') AS count_val1_r_m_3_1_1, SUM(b.r_m_3_1_1 = '2') AS count_val2_r_m_3_1_1, SUM(b.r_m_3_1_2 = '1') AS count_val1_r_m_3_1_2, SUM(b.r_m_3_1_2 = '2') AS count_val2_r_m_3_1_2,SUM(b.r_m_3_1_2 = '3') AS count_val3_r_m_3_1_2, SUM(b.r_m_3_2_1 = '1') AS count_val1_r_m_3_2_1, SUM(b.r_m_3_2_1 = '2') AS count_val2_r_m_3_2_1, SUM(b.r_m_3_2_2 = '1') AS count_val1_r_m_3_2_2, SUM(b.r_m_3_2_2 = '2') AS count_val2_r_m_3_2_2,SUM(b.r_m_3_2_2 = '3') AS count_val3_r_m_3_2_2, SUM(b.r_m_3_3_1 = '1') AS count_val1_r_m_3_3_1, SUM(b.r_m_3_3_1 = '2') AS count_val2_r_m_3_3_1, SUM(b.r_m_3_3_2 = '1') AS count_val1_r_m_3_3_2, SUM(b.r_m_3_3_2 = '2') AS count_val2_r_m_3_3_2,SUM(b.r_m_3_3_2 = '3') AS count_val3_r_m_3_3_2, SUM(b.r_m_4_1_1 = '1') AS count_val1_r_m_4_1_1, SUM(b.r_m_4_1_1 = '2') AS count_val2_r_m_4_1_1, SUM(b.r_m_4_1_2 = '1') AS count_val1_r_m_4_1_2, SUM(b.r_m_4_1_2 = '2') AS count_val2_r_m_4_1_2,SUM(b.r_m_4_1_2 = '3') AS count_val3_r_m_4_1_2, SUM(b.r_m_4_2_1 = '1') AS count_val1_r_m_4_2_1, SUM(b.r_m_4_2_1 = '2') AS count_val2_r_m_4_2_1, SUM(b.r_m_4_2_2 = '1') AS count_val1_r_m_4_2_2, SUM(b.r_m_4_2_2 = '2') AS count_val2_r_m_4_2_2,SUM(b.r_m_4_2_2 = '3') AS count_val3_r_m_4_2_2, SUM(b.r_m_4_3_1 = '1') AS count_val1_r_m_4_3_1, SUM(b.r_m_4_3_1 = '2') AS count_val2_r_m_4_3_1, SUM(b.r_m_4_3_2 = '1') AS count_val1_r_m_4_3_2, SUM(b.r_m_4_3_2 = '2') AS count_val2_r_m_4_3_2,SUM(b.r_m_4_3_2 = '3') AS count_val3_r_m_4_3_2, SUM(b.r_m_5_1_1 = '1') AS count_val1_r_m_5_1_1, SUM(b.r_m_5_1_1 = '2') AS count_val2_r_m_5_1_1, SUM(b.r_m_5_1_2 = '1') AS count_val1_r_m_5_1_2, SUM(b.r_m_5_1_2 = '2') AS count_val2_r_m_5_1_2,SUM(b.r_m_5_1_2 = '3') AS count_val3_r_m_5_1_2, SUM(b.r_m_5_2_1 = '1') AS count_val1_r_m_5_2_1, SUM(b.r_m_5_2_1 = '2') AS count_val2_r_m_5_2_1, SUM(b.r_m_5_2_2 = '1') AS count_val1_r_m_5_2_2, SUM(b.r_m_5_2_2 = '2') AS count_val2_r_m_5_2_2,SUM(b.r_m_5_2_2 = '3') AS count_val3_r_m_5_2_2, SUM(b.r_m_5_3_1 = '1') AS count_val1_r_m_5_3_1, SUM(b.r_m_5_3_1 = '2') AS count_val2_r_m_5_3_1, SUM(b.r_m_5_3_2 = '1') AS count_val1_r_m_5_3_2, SUM(b.r_m_5_3_2 = '2') AS count_val2_r_m_5_3_2,SUM(b.r_m_5_3_2 = '3') AS count_val3_r_m_5_3_2, SUM(b.r_m_6_1_1 = '1') AS count_val1_r_m_6_1_1, SUM(b.r_m_6_1_1 = '2') AS count_val2_r_m_6_1_1, SUM(b.r_m_6_1_2 = '1') AS count_val1_r_m_6_1_2, SUM(b.r_m_6_1_2 = '2') AS count_val2_r_m_6_1_2,SUM(b.r_m_6_1_2 = '3') AS count_val3_r_m_6_1_2, SUM(b.r_m_6_2_1 = '1') AS count_val1_r_m_6_2_1, SUM(b.r_m_6_2_1 = '2') AS count_val2_r_m_6_2_1, SUM(b.r_m_6_2_2 = '1') AS count_val1_r_m_6_2_2, SUM(b.r_m_6_2_2 = '2') AS count_val2_r_m_6_2_2,SUM(b.r_m_6_2_2 = '3') AS count_val3_r_m_6_2_2, SUM(b.r_m_6_3_1 = '1') AS count_val1_r_m_6_3_1, SUM(b.r_m_6_3_1 = '2') AS count_val2_r_m_6_3_1, SUM(b.r_m_6_3_2 = '1') AS count_val1_r_m_6_3_2, SUM(b.r_m_6_3_2 = '2') AS count_val2_r_m_6_3_2,SUM(b.r_m_6_3_2 = '3') AS count_val3_r_m_6_3_2, SUM(b.r_m_7_1_1 = '1') AS count_val1_r_m_7_1_1, SUM(b.r_m_7_1_1 = '2') AS count_val2_r_m_7_1_1, SUM(b.r_m_7_1_2 = '1') AS count_val1_r_m_7_1_2, SUM(b.r_m_7_1_2 = '2') AS count_val2_r_m_7_1_2,SUM(b.r_m_7_1_2 = '3') AS count_val3_r_m_7_1_2, SUM(b.r_m_7_2_1 = '1') AS count_val1_r_m_7_2_1, SUM(b.r_m_7_2_1 = '2') AS count_val2_r_m_7_2_1, SUM(b.r_m_7_2_2 = '1') AS count_val1_r_m_7_2_2, SUM(b.r_m_7_2_2 = '2') AS count_val2_r_m_7_2_2,SUM(b.r_m_7_2_2 = '3') AS count_val3_r_m_7_2_2, SUM(b.r_m_7_3_1 = '1') AS count_val1_r_m_7_3_1, SUM(b.r_m_7_3_1 = '2') AS count_val2_r_m_7_3_1, SUM(b.r_m_7_3_2 = '1') AS count_val1_r_m_7_3_2, SUM(b.r_m_7_3_2 = '2') AS count_val2_r_m_7_3_2,SUM(b.r_m_7_3_2 = '3') AS count_val3_r_m_7_3_2, SUM(b.r_m_7_4_1 = '1') AS count_val1_r_m_7_4_1, SUM(b.r_m_7_4_1 = '2') AS count_val2_r_m_7_4_1, SUM(b.r_m_7_4_2 = '1') AS count_val1_r_m_7_4_2, SUM(b.r_m_7_4_2 = '2') AS count_val2_r_m_7_4_2,SUM(b.r_m_7_4_2 = '3') AS count_val3_r_m_7_4_2, SUM(b.r_m_8_1_1 = '1') AS count_val1_r_m_8_1_1, SUM(b.r_m_8_1_1 = '2') AS count_val2_r_m_8_1_1, SUM(b.r_m_8_1_2 = '1') AS count_val1_r_m_8_1_2, SUM(b.r_m_8_1_2 = '2') AS count_val2_r_m_8_1_2,SUM(b.r_m_8_1_2 = '3') AS count_val3_r_m_8_1_2, SUM(b.r_m_8_2_1 = '1') AS count_val1_r_m_8_2_1, SUM(b.r_m_8_2_1 = '2') AS count_val2_r_m_8_2_1, SUM(b.r_m_8_2_2 = '1') AS count_val1_r_m_8_2_2, SUM(b.r_m_8_2_2 = '2') AS count_val2_r_m_8_2_2,SUM(b.r_m_8_2_2 = '3') AS count_val3_r_m_8_2_2, SUM(b.r_m_8_3_1 = '1') AS count_val1_r_m_8_3_1, SUM(b.r_m_8_3_1 = '2') AS count_val2_r_m_8_3_1, SUM(b.r_m_8_3_2 = '1') AS count_val1_r_m_8_3_2, SUM(b.r_m_8_3_2 = '2') AS count_val2_r_m_8_3_2,SUM(b.r_m_8_3_2 = '3') AS count_val3_r_m_8_3_2, SUM(b.r_m_8_4_1 = '1') AS count_val1_r_m_8_4_1, SUM(b.r_m_8_4_1 = '2') AS count_val2_r_m_8_4_1, SUM(b.r_m_8_4_2 = '1') AS count_val1_r_m_8_4_2, SUM(b.r_m_8_4_2 = '2') AS count_val2_r_m_8_4_2,SUM(b.r_m_8_4_2 = '3') AS count_val3_r_m_8_4_2, SUM(b.r_m_9_1_1 = '1') AS count_val1_r_m_9_1_1, SUM(b.r_m_9_1_1 = '2') AS count_val2_r_m_9_1_1, SUM(b.r_m_9_1_2 = '1') AS count_val1_r_m_9_1_2, SUM(b.r_m_9_1_2 = '2') AS count_val2_r_m_9_1_2,SUM(b.r_m_9_1_2 = '3') AS count_val3_r_m_9_1_2, SUM(b.r_m_9_2_1 = '1') AS count_val1_r_m_9_2_1, SUM(b.r_m_9_2_1 = '2') AS count_val2_r_m_9_2_1, SUM(b.r_m_9_2_2 = '1') AS count_val1_r_m_9_2_2, SUM(b.r_m_9_2_2 = '2') AS count_val2_r_m_9_2_2,SUM(b.r_m_9_2_2 = '3') AS count_val3_r_m_9_2_2, SUM(b.r_m_9_3_1 = '1') AS count_val1_r_m_9_3_1, SUM(b.r_m_9_3_1 = '2') AS count_val2_r_m_9_3_1, SUM(b.r_m_9_3_2 = '1') AS count_val1_r_m_9_3_2, SUM(b.r_m_9_3_2 = '2') AS count_val2_r_m_9_3_2,SUM(b.r_m_9_3_2 = '3') AS count_val3_r_m_9_3_2, SUM(b.r_m_9_4_1 = '1') AS count_val1_r_m_9_4_1, SUM(b.r_m_9_4_1 = '2') AS count_val2_r_m_9_4_1, SUM(b.r_m_9_4_2 = '1') AS count_val1_r_m_9_4_2, SUM(b.r_m_9_4_2 = '2') AS count_val2_r_m_9_4_2,SUM(b.r_m_9_4_2 = '3') AS count_val3_r_m_9_4_2, SUM(b.r_m_101112_1_1 = '1') AS count_val1_r_m_101112_1_1, SUM(b.r_m_101112_1_1 = '2') AS count_val2_r_m_101112_1_1, SUM(b.r_m_101112_1_2 = '1') AS count_val1_r_m_101112_1_2, SUM(b.r_m_101112_1_2 = '2') AS count_val2_r_m_101112_1_2,SUM(b.r_m_101112_1_2 = '3') AS count_val3_r_m_101112_1_2, SUM(b.r_m_101112_2_1 = '1') AS count_val1_r_m_101112_2_1, SUM(b.r_m_101112_2_1 = '2') AS count_val2_r_m_101112_2_1, SUM(b.r_m_101112_2_2 = '1') AS count_val1_r_m_101112_2_2, SUM(b.r_m_101112_2_2 = '2') AS count_val2_r_m_101112_2_2,SUM(b.r_m_101112_2_2 = '3') AS count_val3_r_m_101112_2_2, SUM(b.r_m_101112_3_1 = '1') AS count_val1_r_m_101112_3_1, SUM(b.r_m_101112_3_1 = '2') AS count_val2_r_m_101112_3_1, SUM(b.r_m_101112_3_2 = '1') AS count_val1_r_m_101112_3_2, SUM(b.r_m_101112_3_2 = '2') AS count_val2_r_m_101112_3_2,SUM(b.r_m_101112_3_2 = '3') AS count_val3_r_m_101112_3_2, SUM(b.r_m_101112_4_1 = '1') AS count_val1_r_m_101112_4_1, SUM(b.r_m_101112_4_1 = '2') AS count_val2_r_m_101112_4_1, SUM(b.r_m_101112_4_2 = '1') AS count_val1_r_m_101112_4_2, SUM(b.r_m_101112_4_2 = '2') AS count_val2_r_m_101112_4_2,SUM(b.r_m_101112_4_2 = '3') AS count_val3_r_m_101112_4_2, SUM(b.r_m_101112_5_1 = '1') AS count_val1_r_m_101112_5_1, SUM(b.r_m_101112_5_1 = '2') AS count_val2_r_m_101112_5_1, SUM(b.r_m_101112_5_2 = '1') AS count_val1_r_m_101112_5_2, SUM(b.r_m_101112_5_2 = '2') AS count_val2_r_m_101112_5_2,SUM(b.r_m_101112_5_2 = '3') AS count_val3_r_m_101112_5_2, SUM(b.r_m_101112_6_1 = '1') AS count_val1_r_m_101112_6_1, SUM(b.r_m_101112_6_1 = '2') AS count_val2_r_m_101112_6_1, SUM(b.r_m_101112_6_2 = '1') AS count_val1_r_m_101112_6_2, SUM(b.r_m_101112_6_2 = '2') AS count_val2_r_m_101112_6_2,SUM(b.r_m_101112_6_2 = '3') AS count_val3_r_m_101112_6_2, SUM(b.r_m_101112_7_1 = '1') AS count_val1_r_m_101112_7_1, SUM(b.r_m_101112_7_1 = '2') AS count_val2_r_m_101112_7_1, SUM(b.r_m_101112_7_2 = '1') AS count_val1_r_m_101112_7_2, SUM(b.r_m_101112_7_2 = '2') AS count_val2_r_m_101112_7_2,SUM(b.r_m_101112_7_2 = '3') AS count_val3_r_m_101112_7_2, SUM(b.r_m_101112_8_1 = '1') AS count_val1_r_m_101112_8_1, SUM(b.r_m_101112_8_1 = '2') AS count_val2_r_m_101112_8_1, SUM(b.r_m_101112_8_2 = '1') AS count_val1_r_m_101112_8_2, SUM(b.r_m_101112_8_2 = '2') AS count_val2_r_m_101112_8_2,SUM(b.r_m_101112_8_2 = '3') AS count_val3_r_m_101112_8_2, SUM(b.r_m_101112_9_1 = '1') AS count_val1_r_m_101112_9_1, SUM(b.r_m_101112_9_1 = '2') AS count_val2_r_m_101112_9_1, SUM(b.r_m_101112_9_2 = '1') AS count_val1_r_m_101112_9_2, SUM(b.r_m_101112_9_2 = '2') AS count_val2_r_m_101112_9_2,SUM(b.r_m_101112_9_2 = '3') AS count_val3_r_m_101112_9_2 ";
		$fromQuery = "FROM participant a INNER JOIN math_book b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = '".$type."' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getMathBookInstructorStatistic($conn){
		$selectQuery = "SELECT 
						SUM(b.r_m_ins_1_1_1 = '1') AS count_val1_r_m_ins_1_1_1, SUM(b.r_m_ins_1_1_1 = '2') AS count_val2_r_m_ins_1_1_1, SUM(b.r_m_ins_1_1_2 = '1') AS count_val1_r_m_ins_1_1_2, SUM(b.r_m_ins_1_1_2 = '2') AS count_val2_r_m_ins_1_1_2,SUM(b.r_m_ins_1_1_2 = '3') AS count_val3_r_m_ins_1_1_2, SUM(b.r_m_ins_1_2_1 = '1') AS count_val1_r_m_ins_1_2_1, SUM(b.r_m_ins_1_2_1 = '2') AS count_val2_r_m_ins_1_2_1, SUM(b.r_m_ins_1_2_2 = '1') AS count_val1_r_m_ins_1_2_2, SUM(b.r_m_ins_1_2_2 = '2') AS count_val2_r_m_ins_1_2_2,SUM(b.r_m_ins_1_2_2 = '3') AS count_val3_r_m_ins_1_2_2, SUM(b.r_m_ins_2_1_1 = '1') AS count_val1_r_m_ins_2_1_1, SUM(b.r_m_ins_2_1_1 = '2') AS count_val2_r_m_ins_2_1_1, SUM(b.r_m_ins_2_1_2 = '1') AS count_val1_r_m_ins_2_1_2, SUM(b.r_m_ins_2_1_2 = '2') AS count_val2_r_m_ins_2_1_2,SUM(b.r_m_ins_2_1_2 = '3') AS count_val3_r_m_ins_2_1_2, SUM(b.r_m_ins_3_1_1 = '1') AS count_val1_r_m_ins_3_1_1, SUM(b.r_m_ins_3_1_1 = '2') AS count_val2_r_m_ins_3_1_1, SUM(b.r_m_ins_3_1_2 = '1') AS count_val1_r_m_ins_3_1_2, SUM(b.r_m_ins_3_1_2 = '2') AS count_val2_r_m_ins_3_1_2,SUM(b.r_m_ins_3_1_2 = '3') AS count_val3_r_m_ins_3_1_2, SUM(b.r_m_ins_4_1_1 = '1') AS count_val1_r_m_ins_4_1_1, SUM(b.r_m_ins_4_1_1 = '2') AS count_val2_r_m_ins_4_1_1, SUM(b.r_m_ins_4_1_2 = '1') AS count_val1_r_m_ins_4_1_2, SUM(b.r_m_ins_4_1_2 = '2') AS count_val2_r_m_ins_4_1_2,SUM(b.r_m_ins_4_1_2 = '3') AS count_val3_r_m_ins_4_1_2, SUM(b.r_m_ins_5_1_1 = '1') AS count_val1_r_m_ins_5_1_1, SUM(b.r_m_ins_5_1_1 = '2') AS count_val2_r_m_ins_5_1_1, SUM(b.r_m_ins_5_1_2 = '1') AS count_val1_r_m_ins_5_1_2, SUM(b.r_m_ins_5_1_2 = '2') AS count_val2_r_m_ins_5_1_2,SUM(b.r_m_ins_5_1_2 = '3') AS count_val3_r_m_ins_5_1_2, SUM(b.r_m_ins_6_1_1 = '1') AS count_val1_r_m_ins_6_1_1, SUM(b.r_m_ins_6_1_1 = '2') AS count_val2_r_m_ins_6_1_1, SUM(b.r_m_ins_6_1_2 = '1') AS count_val1_r_m_ins_6_1_2, SUM(b.r_m_ins_6_1_2 = '2') AS count_val2_r_m_ins_6_1_2,SUM(b.r_m_ins_6_1_2 = '3') AS count_val3_r_m_ins_6_1_2, SUM(b.r_m_ins_7_1_1 = '1') AS count_val1_r_m_ins_7_1_1, SUM(b.r_m_ins_7_1_1 = '2') AS count_val2_r_m_ins_7_1_1, SUM(b.r_m_ins_7_1_2 = '1') AS count_val1_r_m_ins_7_1_2, SUM(b.r_m_ins_7_1_2 = '2') AS count_val2_r_m_ins_7_1_2,SUM(b.r_m_ins_7_1_2 = '3') AS count_val3_r_m_ins_7_1_2, SUM(b.r_m_ins_7_2_1 = '1') AS count_val1_r_m_ins_7_2_1, SUM(b.r_m_ins_7_2_1 = '2') AS count_val2_r_m_ins_7_2_1, SUM(b.r_m_ins_7_2_2 = '1') AS count_val1_r_m_ins_7_2_2, SUM(b.r_m_ins_7_2_2 = '2') AS count_val2_r_m_ins_7_2_2,SUM(b.r_m_ins_7_2_2 = '3') AS count_val3_r_m_ins_7_2_2, SUM(b.r_m_ins_7_3_1 = '1') AS count_val1_r_m_ins_7_3_1, SUM(b.r_m_ins_7_3_1 = '2') AS count_val2_r_m_ins_7_3_1, SUM(b.r_m_ins_7_3_2 = '1') AS count_val1_r_m_ins_7_3_2, SUM(b.r_m_ins_7_3_2 = '2') AS count_val2_r_m_ins_7_3_2,SUM(b.r_m_ins_7_3_2 = '3') AS count_val3_r_m_ins_7_3_2, SUM(b.r_m_ins_7_4_1 = '1') AS count_val1_r_m_ins_7_4_1, SUM(b.r_m_ins_7_4_1 = '2') AS count_val2_r_m_ins_7_4_1, SUM(b.r_m_ins_7_4_2 = '1') AS count_val1_r_m_ins_7_4_2, SUM(b.r_m_ins_7_4_2 = '2') AS count_val2_r_m_ins_7_4_2,SUM(b.r_m_ins_7_4_2 = '3') AS count_val3_r_m_ins_7_4_2, SUM(b.r_m_ins_8_1_1 = '1') AS count_val1_r_m_ins_8_1_1, SUM(b.r_m_ins_8_1_1 = '2') AS count_val2_r_m_ins_8_1_1, SUM(b.r_m_ins_8_1_2 = '1') AS count_val1_r_m_ins_8_1_2, SUM(b.r_m_ins_8_1_2 = '2') AS count_val2_r_m_ins_8_1_2,SUM(b.r_m_ins_8_1_2 = '3') AS count_val3_r_m_ins_8_1_2, SUM(b.r_m_ins_8_2_1 = '1') AS count_val1_r_m_ins_8_2_1, SUM(b.r_m_ins_8_2_1 = '2') AS count_val2_r_m_ins_8_2_1, SUM(b.r_m_ins_8_2_2 = '1') AS count_val1_r_m_ins_8_2_2, SUM(b.r_m_ins_8_2_2 = '2') AS count_val2_r_m_ins_8_2_2,SUM(b.r_m_ins_8_2_2 = '3') AS count_val3_r_m_ins_8_2_2, SUM(b.r_m_ins_8_3_1 = '1') AS count_val1_r_m_ins_8_3_1, SUM(b.r_m_ins_8_3_1 = '2') AS count_val2_r_m_ins_8_3_1, SUM(b.r_m_ins_8_3_2 = '1') AS count_val1_r_m_ins_8_3_2, SUM(b.r_m_ins_8_3_2 = '2') AS count_val2_r_m_ins_8_3_2,SUM(b.r_m_ins_8_3_2 = '3') AS count_val3_r_m_ins_8_3_2, SUM(b.r_m_ins_8_4_1 = '1') AS count_val1_r_m_ins_8_4_1, SUM(b.r_m_ins_8_4_1 = '2') AS count_val2_r_m_ins_8_4_1, SUM(b.r_m_ins_8_4_2 = '1') AS count_val1_r_m_ins_8_4_2, SUM(b.r_m_ins_8_4_2 = '2') AS count_val2_r_m_ins_8_4_2,SUM(b.r_m_ins_8_4_2 = '3') AS count_val3_r_m_ins_8_4_2, SUM(b.r_m_ins_9_1_1 = '1') AS count_val1_r_m_ins_9_1_1, SUM(b.r_m_ins_9_1_1 = '2') AS count_val2_r_m_ins_9_1_1, SUM(b.r_m_ins_9_1_2 = '1') AS count_val1_r_m_ins_9_1_2, SUM(b.r_m_ins_9_1_2 = '2') AS count_val2_r_m_ins_9_1_2,SUM(b.r_m_ins_9_1_2 = '3') AS count_val3_r_m_ins_9_1_2, SUM(b.r_m_ins_9_2_1 = '1') AS count_val1_r_m_ins_9_2_1, SUM(b.r_m_ins_9_2_1 = '2') AS count_val2_r_m_ins_9_2_1, SUM(b.r_m_ins_9_2_2 = '1') AS count_val1_r_m_ins_9_2_2, SUM(b.r_m_ins_9_2_2 = '2') AS count_val2_r_m_ins_9_2_2,SUM(b.r_m_ins_9_2_2 = '3') AS count_val3_r_m_ins_9_2_2, SUM(b.r_m_ins_9_3_1 = '1') AS count_val1_r_m_ins_9_3_1, SUM(b.r_m_ins_9_3_1 = '2') AS count_val2_r_m_ins_9_3_1, SUM(b.r_m_ins_9_3_2 = '1') AS count_val1_r_m_ins_9_3_2, SUM(b.r_m_ins_9_3_2 = '2') AS count_val2_r_m_ins_9_3_2,SUM(b.r_m_ins_9_3_2 = '3') AS count_val3_r_m_ins_9_3_2, SUM(b.r_m_ins_9_4_1 = '1') AS count_val1_r_m_ins_9_4_1, SUM(b.r_m_ins_9_4_1 = '2') AS count_val2_r_m_ins_9_4_1, SUM(b.r_m_ins_9_4_2 = '1') AS count_val1_r_m_ins_9_4_2, SUM(b.r_m_ins_9_4_2 = '2') AS count_val2_r_m_ins_9_4_2,SUM(b.r_m_ins_9_4_2 = '3') AS count_val3_r_m_ins_9_4_2, SUM(b.r_m_ins_101112_1_1 = '1') AS count_val1_r_m_ins_101112_1_1, SUM(b.r_m_ins_101112_1_1 = '2') AS count_val2_r_m_ins_101112_1_1, SUM(b.r_m_ins_101112_1_2 = '1') AS count_val1_r_m_ins_101112_1_2, SUM(b.r_m_ins_101112_1_2 = '2') AS count_val2_r_m_ins_101112_1_2,SUM(b.r_m_ins_101112_1_2 = '3') AS count_val3_r_m_ins_101112_1_2, SUM(b.r_m_ins_101112_2_1 = '1') AS count_val1_r_m_ins_101112_2_1, SUM(b.r_m_ins_101112_2_1 = '2') AS count_val2_r_m_ins_101112_2_1, SUM(b.r_m_ins_101112_2_2 = '1') AS count_val1_r_m_ins_101112_2_2, SUM(b.r_m_ins_101112_2_2 = '2') AS count_val2_r_m_ins_101112_2_2,SUM(b.r_m_ins_101112_2_2 = '3') AS count_val3_r_m_ins_101112_2_2, SUM(b.r_m_ins_101112_3_1 = '1') AS count_val1_r_m_ins_101112_3_1, SUM(b.r_m_ins_101112_3_1 = '2') AS count_val2_r_m_ins_101112_3_1, SUM(b.r_m_ins_101112_3_2 = '1') AS count_val1_r_m_ins_101112_3_2, SUM(b.r_m_ins_101112_3_2 = '2') AS count_val2_r_m_ins_101112_3_2,SUM(b.r_m_ins_101112_3_2 = '3') AS count_val3_r_m_ins_101112_3_2, SUM(b.r_m_ins_101112_4_1 = '1') AS count_val1_r_m_ins_101112_4_1, SUM(b.r_m_ins_101112_4_1 = '2') AS count_val2_r_m_ins_101112_4_1, SUM(b.r_m_ins_101112_4_2 = '1') AS count_val1_r_m_ins_101112_4_2, SUM(b.r_m_ins_101112_4_2 = '2') AS count_val2_r_m_ins_101112_4_2,SUM(b.r_m_ins_101112_4_2 = '3') AS count_val3_r_m_ins_101112_4_2, SUM(b.r_m_ins_101112_5_1 = '1') AS count_val1_r_m_ins_101112_5_1, SUM(b.r_m_ins_101112_5_1 = '2') AS count_val2_r_m_ins_101112_5_1, SUM(b.r_m_ins_101112_5_2 = '1') AS count_val1_r_m_ins_101112_5_2, SUM(b.r_m_ins_101112_5_2 = '2') AS count_val2_r_m_ins_101112_5_2,SUM(b.r_m_ins_101112_5_2 = '3') AS count_val3_r_m_ins_101112_5_2, SUM(b.r_m_ins_101112_6_1 = '1') AS count_val1_r_m_ins_101112_6_1, SUM(b.r_m_ins_101112_6_1 = '2') AS count_val2_r_m_ins_101112_6_1, SUM(b.r_m_ins_101112_6_2 = '1') AS count_val1_r_m_ins_101112_6_2, SUM(b.r_m_ins_101112_6_2 = '2') AS count_val2_r_m_ins_101112_6_2,SUM(b.r_m_ins_101112_6_2 = '3') AS count_val3_r_m_ins_101112_6_2, SUM(b.r_m_ins_101112_7_1 = '1') AS count_val1_r_m_ins_101112_7_1, SUM(b.r_m_ins_101112_7_1 = '2') AS count_val2_r_m_ins_101112_7_1, SUM(b.r_m_ins_101112_7_2 = '1') AS count_val1_r_m_ins_101112_7_2, SUM(b.r_m_ins_101112_7_2 = '2') AS count_val2_r_m_ins_101112_7_2,SUM(b.r_m_ins_101112_7_2 = '3') AS count_val3_r_m_ins_101112_7_2, SUM(b.r_m_ins_101112_8_1 = '1') AS count_val1_r_m_ins_101112_8_1, SUM(b.r_m_ins_101112_8_1 = '2') AS count_val2_r_m_ins_101112_8_1, SUM(b.r_m_ins_101112_8_2 = '1') AS count_val1_r_m_ins_101112_8_2, SUM(b.r_m_ins_101112_8_2 = '2') AS count_val2_r_m_ins_101112_8_2,SUM(b.r_m_ins_101112_8_2 = '3') AS count_val3_r_m_ins_101112_8_2, SUM(b.r_m_ins_101112_9_1 = '1') AS count_val1_r_m_ins_101112_9_1, SUM(b.r_m_ins_101112_9_1 = '2') AS count_val2_r_m_ins_101112_9_1, SUM(b.r_m_ins_101112_9_2 = '1') AS count_val1_r_m_ins_101112_9_2, SUM(b.r_m_ins_101112_9_2 = '2') AS count_val2_r_m_ins_101112_9_2,SUM(b.r_m_ins_101112_9_2 = '3') AS count_val3_r_m_ins_101112_9_2 ";
		$fromQuery = "FROM participant a INNER JOIN math_book_instructor b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getTechnologyBookStatistic($conn, $type){
		$selectQuery = "SELECT 
						SUM(b.r_t_1_1_1 = '1') AS count_val1_r_t_1_1_1, SUM(b.r_t_1_1_1 = '2') AS count_val2_r_t_1_1_1, SUM(b.r_t_1_1_2 = '1') AS count_val1_r_t_1_1_2, SUM(b.r_t_1_1_2 = '2') AS count_val2_r_t_1_1_2,SUM(b.r_t_1_1_2 = '3') AS count_val3_r_t_1_1_2, 						SUM(b.r_t_1_2_1 = '1') AS count_val1_r_t_1_2_1, SUM(b.r_t_1_2_1 = '2') AS count_val2_r_t_1_2_1, SUM(b.r_t_1_2_2 = '1') AS count_val1_r_t_1_2_2, SUM(b.r_t_1_2_2 = '2') AS count_val2_r_t_1_2_2,SUM(b.r_t_1_2_2 = '3') AS count_val3_r_t_1_2_2, 						SUM(b.r_t_2_1_1 = '1') AS count_val1_r_t_2_1_1, SUM(b.r_t_2_1_1 = '2') AS count_val2_r_t_2_1_1, SUM(b.r_t_2_1_2 = '1') AS count_val1_r_t_2_1_2, SUM(b.r_t_2_1_2 = '2') AS count_val2_r_t_2_1_2,SUM(b.r_t_2_1_2 = '3') AS count_val3_r_t_2_1_2, 						SUM(b.r_t_2_2_1 = '1') AS count_val1_r_t_2_2_1, SUM(b.r_t_2_2_1 = '2') AS count_val2_r_t_2_2_1, SUM(b.r_t_2_2_2 = '1') AS count_val1_r_t_2_2_2, SUM(b.r_t_2_2_2 = '2') AS count_val2_r_t_2_2_2,SUM(b.r_t_2_2_2 = '3') AS count_val3_r_t_2_2_2, 						SUM(b.r_t_3_1_1 = '1') AS count_val1_r_t_3_1_1, SUM(b.r_t_3_1_1 = '2') AS count_val2_r_t_3_1_1, SUM(b.r_t_3_1_2 = '1') AS count_val1_r_t_3_1_2, SUM(b.r_t_3_1_2 = '2') AS count_val2_r_t_3_1_2,SUM(b.r_t_3_1_2 = '3') AS count_val3_r_t_3_1_2, 						SUM(b.r_t_3_2_1 = '1') AS count_val1_r_t_3_2_1, SUM(b.r_t_3_2_1 = '2') AS count_val2_r_t_3_2_1, SUM(b.r_t_3_2_2 = '1') AS count_val1_r_t_3_2_2, SUM(b.r_t_3_2_2 = '2') AS count_val2_r_t_3_2_2,SUM(b.r_t_3_2_2 = '3') AS count_val3_r_t_3_2_2, 						SUM(b.r_t_4_1_1 = '1') AS count_val1_r_t_4_1_1, SUM(b.r_t_4_1_1 = '2') AS count_val2_r_t_4_1_1, SUM(b.r_t_4_1_2 = '1') AS count_val1_r_t_4_1_2, SUM(b.r_t_4_1_2 = '2') AS count_val2_r_t_4_1_2,SUM(b.r_t_4_1_2 = '3') AS count_val3_r_t_4_1_2, 						SUM(b.r_t_4_2_1 = '1') AS count_val1_r_t_4_2_1, SUM(b.r_t_4_2_1 = '2') AS count_val2_r_t_4_2_1, SUM(b.r_t_4_2_2 = '1') AS count_val1_r_t_4_2_2, SUM(b.r_t_4_2_2 = '2') AS count_val2_r_t_4_2_2,SUM(b.r_t_4_2_2 = '3') AS count_val3_r_t_4_2_2, 						SUM(b.r_t_5_1_1 = '1') AS count_val1_r_t_5_1_1, SUM(b.r_t_5_1_1 = '2') AS count_val2_r_t_5_1_1, SUM(b.r_t_5_1_2 = '1') AS count_val1_r_t_5_1_2, SUM(b.r_t_5_1_2 = '2') AS count_val2_r_t_5_1_2,SUM(b.r_t_5_1_2 = '3') AS count_val3_r_t_5_1_2, 						SUM(b.r_t_5_2_1 = '1') AS count_val1_r_t_5_2_1, SUM(b.r_t_5_2_1 = '2') AS count_val2_r_t_5_2_1, SUM(b.r_t_5_2_2 = '1') AS count_val1_r_t_5_2_2, SUM(b.r_t_5_2_2 = '2') AS count_val2_r_t_5_2_2,SUM(b.r_t_5_2_2 = '3') AS count_val3_r_t_5_2_2, 						SUM(b.r_t_6_1_1 = '1') AS count_val1_r_t_6_1_1, SUM(b.r_t_6_1_1 = '2') AS count_val2_r_t_6_1_1, SUM(b.r_t_6_1_2 = '1') AS count_val1_r_t_6_1_2, SUM(b.r_t_6_1_2 = '2') AS count_val2_r_t_6_1_2,SUM(b.r_t_6_1_2 = '3') AS count_val3_r_t_6_1_2, 						SUM(b.r_t_6_2_1 = '1') AS count_val1_r_t_6_2_1, SUM(b.r_t_6_2_1 = '2') AS count_val2_r_t_6_2_1, SUM(b.r_t_6_2_2 = '1') AS count_val1_r_t_6_2_2, SUM(b.r_t_6_2_2 = '2') AS count_val2_r_t_6_2_2,SUM(b.r_t_6_2_2 = '3') AS count_val3_r_t_6_2_2, 						SUM(b.r_t_7_1_1 = '1') AS count_val1_r_t_7_1_1, SUM(b.r_t_7_1_1 = '2') AS count_val2_r_t_7_1_1, SUM(b.r_t_7_1_2 = '1') AS count_val1_r_t_7_1_2, SUM(b.r_t_7_1_2 = '2') AS count_val2_r_t_7_1_2,SUM(b.r_t_7_1_2 = '3') AS count_val3_r_t_7_1_2, 						SUM(b.r_t_8_1_1 = '1') AS count_val1_r_t_8_1_1, SUM(b.r_t_8_1_1 = '2') AS count_val2_r_t_8_1_1, SUM(b.r_t_8_1_2 = '1') AS count_val1_r_t_8_1_2, SUM(b.r_t_8_1_2 = '2') AS count_val2_r_t_8_1_2,SUM(b.r_t_8_1_2 = '3') AS count_val3_r_t_8_1_2, 						SUM(b.r_t_9_1_1 = '1') AS count_val1_r_t_9_1_1, SUM(b.r_t_9_1_1 = '2') AS count_val2_r_t_9_1_1, SUM(b.r_t_9_1_2 = '1') AS count_val1_r_t_9_1_2, SUM(b.r_t_9_1_2 = '2') AS count_val2_r_t_9_1_2,SUM(b.r_t_9_1_2 = '3') AS count_val3_r_t_9_1_2, 						SUM(b.r_t_789_additional_1_1 = '1') AS count_val1_r_t_789_additional_1_1, SUM(b.r_t_789_additional_1_1 = '2') AS count_val2_r_t_789_additional_1_1, SUM(b.r_t_789_additional_1_2 = '1') AS count_val1_r_t_789_additional_1_2, SUM(b.r_t_789_additional_1_2 = '2') AS count_val2_r_t_789_additional_1_2,SUM(b.r_t_789_additional_1_2 = '3') AS count_val3_r_t_789_additional_1_2, 						SUM(b.r_t_789_additional_2_1 = '1') AS count_val1_r_t_789_additional_2_1, SUM(b.r_t_789_additional_2_1 = '2') AS count_val2_r_t_789_additional_2_1, SUM(b.r_t_789_additional_2_2 = '1') AS count_val1_r_t_789_additional_2_2, SUM(b.r_t_789_additional_2_2 = '2') AS count_val2_r_t_789_additional_2_2,SUM(b.r_t_789_additional_2_2 = '3') AS count_val3_r_t_789_additional_2_2, 						SUM(b.r_t_789_additional_3_1 = '1') AS count_val1_r_t_789_additional_3_1, SUM(b.r_t_789_additional_3_1 = '2') AS count_val2_r_t_789_additional_3_1, SUM(b.r_t_789_additional_3_2 = '1') AS count_val1_r_t_789_additional_3_2, SUM(b.r_t_789_additional_3_2 = '2') AS count_val2_r_t_789_additional_3_2,SUM(b.r_t_789_additional_3_2 = '3') AS count_val3_r_t_789_additional_3_2, 						SUM(b.r_t_101112_1_1 = '1') AS count_val1_r_t_101112_1_1, SUM(b.r_t_101112_1_1 = '2') AS count_val2_r_t_101112_1_1, SUM(b.r_t_101112_1_2 = '1') AS count_val1_r_t_101112_1_2, SUM(b.r_t_101112_1_2 = '2') AS count_val2_r_t_101112_1_2,SUM(b.r_t_101112_1_2 = '3') AS count_val3_r_t_101112_1_2, 						SUM(b.r_t_101112_2_1 = '1') AS count_val1_r_t_101112_2_1, SUM(b.r_t_101112_2_1 = '2') AS count_val2_r_t_101112_2_1, SUM(b.r_t_101112_2_2 = '1') AS count_val1_r_t_101112_2_2, SUM(b.r_t_101112_2_2 = '2') AS count_val2_r_t_101112_2_2,SUM(b.r_t_101112_2_2 = '3') AS count_val3_r_t_101112_2_2, 						SUM(b.r_t_101112_3_1 = '1') AS count_val1_r_t_101112_3_1, SUM(b.r_t_101112_3_1 = '2') AS count_val2_r_t_101112_3_1, SUM(b.r_t_101112_3_2 = '1') AS count_val1_r_t_101112_3_2, SUM(b.r_t_101112_3_2 = '2') AS count_val2_r_t_101112_3_2,SUM(b.r_t_101112_3_2 = '3') AS count_val3_r_t_101112_3_2, 						SUM(b.r_t_101112_4_1 = '1') AS count_val1_r_t_101112_4_1, SUM(b.r_t_101112_4_1 = '2') AS count_val2_r_t_101112_4_1, SUM(b.r_t_101112_4_2 = '1') AS count_val1_r_t_101112_4_2, SUM(b.r_t_101112_4_2 = '2') AS count_val2_r_t_101112_4_2,SUM(b.r_t_101112_4_2 = '3') AS count_val3_r_t_101112_4_2, 						SUM(b.r_t_101112_5_1 = '1') AS count_val1_r_t_101112_5_1, SUM(b.r_t_101112_5_1 = '2') AS count_val2_r_t_101112_5_1, SUM(b.r_t_101112_5_2 = '1') AS count_val1_r_t_101112_5_2, SUM(b.r_t_101112_5_2 = '2') AS count_val2_r_t_101112_5_2,SUM(b.r_t_101112_5_2 = '3') AS count_val3_r_t_101112_5_2 ";
		$fromQuery = "FROM participant a INNER JOIN technology_book b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = '".$type."' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getTechnologyBookInstructorStatistic($conn){
		$selectQuery = "SELECT 
						SUM(b.r_t_ins_1_1_1 = '1') AS count_val1_r_t_ins_1_1_1, SUM(b.r_t_ins_1_1_1 = '2') AS count_val2_r_t_ins_1_1_1, SUM(b.r_t_ins_1_1_2 = '1') AS count_val1_r_t_ins_1_1_2, SUM(b.r_t_ins_1_1_2 = '2') AS count_val2_r_t_ins_1_1_2,SUM(b.r_t_ins_1_1_2 = '3') AS count_val3_r_t_ins_1_1_2, SUM(b.r_t_ins_2_1_1 = '1') AS count_val1_r_t_ins_2_1_1, SUM(b.r_t_ins_2_1_1 = '2') AS count_val2_r_t_ins_2_1_1, SUM(b.r_t_ins_2_1_2 = '1') AS count_val1_r_t_ins_2_1_2, SUM(b.r_t_ins_2_1_2 = '2') AS count_val2_r_t_ins_2_1_2,SUM(b.r_t_ins_2_1_2 = '3') AS count_val3_r_t_ins_2_1_2, SUM(b.r_t_ins_3_1_1 = '1') AS count_val1_r_t_ins_3_1_1, SUM(b.r_t_ins_3_1_1 = '2') AS count_val2_r_t_ins_3_1_1, SUM(b.r_t_ins_3_1_2 = '1') AS count_val1_r_t_ins_3_1_2, SUM(b.r_t_ins_3_1_2 = '2') AS count_val2_r_t_ins_3_1_2,SUM(b.r_t_ins_3_1_2 = '3') AS count_val3_r_t_ins_3_1_2, SUM(b.r_t_ins_4_1_1 = '1') AS count_val1_r_t_ins_4_1_1, SUM(b.r_t_ins_4_1_1 = '2') AS count_val2_r_t_ins_4_1_1, SUM(b.r_t_ins_4_1_2 = '1') AS count_val1_r_t_ins_4_1_2, SUM(b.r_t_ins_4_1_2 = '2') AS count_val2_r_t_ins_4_1_2,SUM(b.r_t_ins_4_1_2 = '3') AS count_val3_r_t_ins_4_1_2, SUM(b.r_t_ins_5_1_1 = '1') AS count_val1_r_t_ins_5_1_1, SUM(b.r_t_ins_5_1_1 = '2') AS count_val2_r_t_ins_5_1_1, SUM(b.r_t_ins_5_1_2 = '1') AS count_val1_r_t_ins_5_1_2, SUM(b.r_t_ins_5_1_2 = '2') AS count_val2_r_t_ins_5_1_2,SUM(b.r_t_ins_5_1_2 = '3') AS count_val3_r_t_ins_5_1_2, SUM(b.r_t_ins_6_1_1 = '1') AS count_val1_r_t_ins_6_1_1, SUM(b.r_t_ins_6_1_1 = '2') AS count_val2_r_t_ins_6_1_1, SUM(b.r_t_ins_6_1_2 = '1') AS count_val1_r_t_ins_6_1_2, SUM(b.r_t_ins_6_1_2 = '2') AS count_val2_r_t_ins_6_1_2,SUM(b.r_t_ins_6_1_2 = '3') AS count_val3_r_t_ins_6_1_2, SUM(b.r_t_ins_7_1_1 = '1') AS count_val1_r_t_ins_7_1_1, SUM(b.r_t_ins_7_1_1 = '2') AS count_val2_r_t_ins_7_1_1, SUM(b.r_t_ins_7_1_2 = '1') AS count_val1_r_t_ins_7_1_2, SUM(b.r_t_ins_7_1_2 = '2') AS count_val2_r_t_ins_7_1_2,SUM(b.r_t_ins_7_1_2 = '3') AS count_val3_r_t_ins_7_1_2, SUM(b.r_t_ins_8_1_1 = '1') AS count_val1_r_t_ins_8_1_1, SUM(b.r_t_ins_8_1_1 = '2') AS count_val2_r_t_ins_8_1_1, SUM(b.r_t_ins_8_1_2 = '1') AS count_val1_r_t_ins_8_1_2, SUM(b.r_t_ins_8_1_2 = '2') AS count_val2_r_t_ins_8_1_2,SUM(b.r_t_ins_8_1_2 = '3') AS count_val3_r_t_ins_8_1_2, SUM(b.r_t_ins_9_1_1 = '1') AS count_val1_r_t_ins_9_1_1, SUM(b.r_t_ins_9_1_1 = '2') AS count_val2_r_t_ins_9_1_1, SUM(b.r_t_ins_9_1_2 = '1') AS count_val1_r_t_ins_9_1_2, SUM(b.r_t_ins_9_1_2 = '2') AS count_val2_r_t_ins_9_1_2,SUM(b.r_t_ins_9_1_2 = '3') AS count_val3_r_t_ins_9_1_2, SUM(b.r_t_ins_789_additional_1_1 = '1') AS count_val1_r_t_ins_789_additional_1_1, SUM(b.r_t_ins_789_additional_1_1 = '2') AS count_val2_r_t_ins_789_additional_1_1, SUM(b.r_t_ins_789_additional_1_2 = '1') AS count_val1_r_t_ins_789_additional_1_2, SUM(b.r_t_ins_789_additional_1_2 = '2') AS count_val2_r_t_ins_789_additional_1_2,SUM(b.r_t_ins_789_additional_1_2 = '3') AS count_val3_r_t_ins_789_additional_1_2, SUM(b.r_t_ins_789_additional_2_1 = '1') AS count_val1_r_t_ins_789_additional_2_1, SUM(b.r_t_ins_789_additional_2_1 = '2') AS count_val2_r_t_ins_789_additional_2_1, SUM(b.r_t_ins_789_additional_2_2 = '1') AS count_val1_r_t_ins_789_additional_2_2, SUM(b.r_t_ins_789_additional_2_2 = '2') AS count_val2_r_t_ins_789_additional_2_2,SUM(b.r_t_ins_789_additional_2_2 = '3') AS count_val3_r_t_ins_789_additional_2_2, SUM(b.r_t_ins_789_additional_3_1 = '1') AS count_val1_r_t_ins_789_additional_3_1, SUM(b.r_t_ins_789_additional_3_1 = '2') AS count_val2_r_t_ins_789_additional_3_1, SUM(b.r_t_ins_789_additional_3_2 = '1') AS count_val1_r_t_ins_789_additional_3_2, SUM(b.r_t_ins_789_additional_3_2 = '2') AS count_val2_r_t_ins_789_additional_3_2,SUM(b.r_t_ins_789_additional_3_2 = '3') AS count_val3_r_t_ins_789_additional_3_2, SUM(b.r_t_ins_101112_1_1 = '1') AS count_val1_r_t_ins_101112_1_1, SUM(b.r_t_ins_101112_1_1 = '2') AS count_val2_r_t_ins_101112_1_1, SUM(b.r_t_ins_101112_1_2 = '1') AS count_val1_r_t_ins_101112_1_2, SUM(b.r_t_ins_101112_1_2 = '2') AS count_val2_r_t_ins_101112_1_2,SUM(b.r_t_ins_101112_1_2 = '3') AS count_val3_r_t_ins_101112_1_2, SUM(b.r_t_ins_101112_2_1 = '1') AS count_val1_r_t_ins_101112_2_1, SUM(b.r_t_ins_101112_2_1 = '2') AS count_val2_r_t_ins_101112_2_1, SUM(b.r_t_ins_101112_2_2 = '1') AS count_val1_r_t_ins_101112_2_2, SUM(b.r_t_ins_101112_2_2 = '2') AS count_val2_r_t_ins_101112_2_2,SUM(b.r_t_ins_101112_2_2 = '3') AS count_val3_r_t_ins_101112_2_2, SUM(b.r_t_ins_101112_3_1 = '1') AS count_val1_r_t_ins_101112_3_1, SUM(b.r_t_ins_101112_3_1 = '2') AS count_val2_r_t_ins_101112_3_1, SUM(b.r_t_ins_101112_3_2 = '1') AS count_val1_r_t_ins_101112_3_2, SUM(b.r_t_ins_101112_3_2 = '2') AS count_val2_r_t_ins_101112_3_2,SUM(b.r_t_ins_101112_3_2 = '3') AS count_val3_r_t_ins_101112_3_2, SUM(b.r_t_ins_101112_4_1 = '1') AS count_val1_r_t_ins_101112_4_1, SUM(b.r_t_ins_101112_4_1 = '2') AS count_val2_r_t_ins_101112_4_1, SUM(b.r_t_ins_101112_4_2 = '1') AS count_val1_r_t_ins_101112_4_2, SUM(b.r_t_ins_101112_4_2 = '2') AS count_val2_r_t_ins_101112_4_2,SUM(b.r_t_ins_101112_4_2 = '3') AS count_val3_r_t_ins_101112_4_2, SUM(b.r_t_ins_101112_5_1 = '1') AS count_val1_r_t_ins_101112_5_1, SUM(b.r_t_ins_101112_5_1 = '2') AS count_val2_r_t_ins_101112_5_1, SUM(b.r_t_ins_101112_5_2 = '1') AS count_val1_r_t_ins_101112_5_2, SUM(b.r_t_ins_101112_5_2 = '2') AS count_val2_r_t_ins_101112_5_2,SUM(b.r_t_ins_101112_5_2 = '3') AS count_val3_r_t_ins_101112_5_2 ";
		$fromQuery = "FROM participant a INNER JOIN technology_book_instructor b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getDesignBookStatistic($conn, $type){
		$selectQuery = "SELECT 
						SUM(b.r_d_2_1_1 = '1') AS count_val1_r_d_2_1_1, SUM(b.r_d_2_1_1 = '2') AS count_val2_r_d_2_1_1, SUM(b.r_d_2_1_2 = '1') AS count_val1_r_d_2_1_2, SUM(b.r_d_2_1_2 = '2') AS count_val2_r_d_2_1_2,SUM(b.r_d_2_1_2 = '3') AS count_val3_r_d_2_1_2, SUM(b.r_d_3_1_1 = '1') AS count_val1_r_d_3_1_1, SUM(b.r_d_3_1_1 = '2') AS count_val2_r_d_3_1_1, SUM(b.r_d_3_1_2 = '1') AS count_val1_r_d_3_1_2, SUM(b.r_d_3_1_2 = '2') AS count_val2_r_d_3_1_2,SUM(b.r_d_3_1_2 = '3') AS count_val3_r_d_3_1_2, SUM(b.r_d_5_1_1 = '1') AS count_val1_r_d_5_1_1, SUM(b.r_d_5_1_1 = '2') AS count_val2_r_d_5_1_1, SUM(b.r_d_5_1_2 = '1') AS count_val1_r_d_5_1_2, SUM(b.r_d_5_1_2 = '2') AS count_val2_r_d_5_1_2,SUM(b.r_d_5_1_2 = '3') AS count_val3_r_d_5_1_2, SUM(b.r_d_6_1_1 = '1') AS count_val1_r_d_6_1_1, SUM(b.r_d_6_1_1 = '2') AS count_val2_r_d_6_1_1, SUM(b.r_d_6_1_2 = '1') AS count_val1_r_d_6_1_2, SUM(b.r_d_6_1_2 = '2') AS count_val2_r_d_6_1_2,SUM(b.r_d_6_1_2 = '3') AS count_val3_r_d_6_1_2, SUM(b.r_d_8_1_1 = '1') AS count_val1_r_d_8_1_1, SUM(b.r_d_8_1_1 = '2') AS count_val2_r_d_8_1_1, SUM(b.r_d_8_1_2 = '1') AS count_val1_r_d_8_1_2, SUM(b.r_d_8_1_2 = '2') AS count_val2_r_d_8_1_2,SUM(b.r_d_8_1_2 = '3') AS count_val3_r_d_8_1_2, SUM(b.r_d_9_1_1 = '1') AS count_val1_r_d_9_1_1, SUM(b.r_d_9_1_1 = '2') AS count_val2_r_d_9_1_1, SUM(b.r_d_9_1_2 = '1') AS count_val1_r_d_9_1_2, SUM(b.r_d_9_1_2 = '2') AS count_val2_r_d_9_1_2,SUM(b.r_d_9_1_2 = '3') AS count_val3_r_d_9_1_2, SUM(b.r_d_89_1_1 = '1') AS count_val1_r_d_89_1_1, SUM(b.r_d_89_1_1 = '2') AS count_val2_r_d_89_1_1, SUM(b.r_d_89_1_2 = '1') AS count_val1_r_d_89_1_2, SUM(b.r_d_89_1_2 = '2') AS count_val2_r_d_89_1_2,SUM(b.r_d_89_1_2 = '3') AS count_val3_r_d_89_1_2, SUM(b.r_d_101112_1_1 = '1') AS count_val1_r_d_101112_1_1, SUM(b.r_d_101112_1_1 = '2') AS count_val2_r_d_101112_1_1, SUM(b.r_d_101112_1_2 = '1') AS count_val1_r_d_101112_1_2, SUM(b.r_d_101112_1_2 = '2') AS count_val2_r_d_101112_1_2,SUM(b.r_d_101112_1_2 = '3') AS count_val3_r_d_101112_1_2, SUM(b.r_d_101112_2_1 = '1') AS count_val1_r_d_101112_2_1, SUM(b.r_d_101112_2_1 = '2') AS count_val2_r_d_101112_2_1, SUM(b.r_d_101112_2_2 = '1') AS count_val1_r_d_101112_2_2, SUM(b.r_d_101112_2_2 = '2') AS count_val2_r_d_101112_2_2,SUM(b.r_d_101112_2_2 = '3') AS count_val3_r_d_101112_2_2, SUM(b.r_d_all_1_1 = '1') AS count_val1_r_d_all_1_1, SUM(b.r_d_all_1_1 = '2') AS count_val2_r_d_all_1_1, SUM(b.r_d_all_1_2 = '1') AS count_val1_r_d_all_1_2, SUM(b.r_d_all_1_2 = '2') AS count_val2_r_d_all_1_2,SUM(b.r_d_all_1_2 = '3') AS count_val3_r_d_all_1_2 ";
		$fromQuery = "FROM participant a INNER JOIN design_book b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = '".$type."' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getDesignBookInstructorStatistic($conn){
		$selectQuery = "SELECT 
						SUM(b.r_d_ins_2_1_1 = '1') AS count_val1_r_d_ins_2_1_1, SUM(b.r_d_ins_2_1_1 = '2') AS count_val2_r_d_ins_2_1_1, SUM(b.r_d_ins_2_1_2 = '1') AS count_val1_r_d_ins_2_1_2, SUM(b.r_d_ins_2_1_2 = '2') AS count_val2_r_d_ins_2_1_2,SUM(b.r_d_ins_2_1_2 = '3') AS count_val3_r_d_ins_2_1_2, SUM(b.r_d_ins_3_1_1 = '1') AS count_val1_r_d_ins_3_1_1, SUM(b.r_d_ins_3_1_1 = '2') AS count_val2_r_d_ins_3_1_1, SUM(b.r_d_ins_3_1_2 = '1') AS count_val1_r_d_ins_3_1_2, SUM(b.r_d_ins_3_1_2 = '2') AS count_val2_r_d_ins_3_1_2,SUM(b.r_d_ins_3_1_2 = '3') AS count_val3_r_d_ins_3_1_2, SUM(b.r_d_ins_5_1_1 = '1') AS count_val1_r_d_ins_5_1_1, SUM(b.r_d_ins_5_1_1 = '2') AS count_val2_r_d_ins_5_1_1, SUM(b.r_d_ins_5_1_2 = '1') AS count_val1_r_d_ins_5_1_2, SUM(b.r_d_ins_5_1_2 = '2') AS count_val2_r_d_ins_5_1_2,SUM(b.r_d_ins_5_1_2 = '3') AS count_val3_r_d_ins_5_1_2, SUM(b.r_d_ins_6_1_1 = '1') AS count_val1_r_d_ins_6_1_1, SUM(b.r_d_ins_6_1_1 = '2') AS count_val2_r_d_ins_6_1_1, SUM(b.r_d_ins_6_1_2 = '1') AS count_val1_r_d_ins_6_1_2, SUM(b.r_d_ins_6_1_2 = '2') AS count_val2_r_d_ins_6_1_2,SUM(b.r_d_ins_6_1_2 = '3') AS count_val3_r_d_ins_6_1_2, SUM(b.r_d_ins_8_1_1 = '1') AS count_val1_r_d_ins_8_1_1, SUM(b.r_d_ins_8_1_1 = '2') AS count_val2_r_d_ins_8_1_1, SUM(b.r_d_ins_8_1_2 = '1') AS count_val1_r_d_ins_8_1_2, SUM(b.r_d_ins_8_1_2 = '2') AS count_val2_r_d_ins_8_1_2,SUM(b.r_d_ins_8_1_2 = '3') AS count_val3_r_d_ins_8_1_2, SUM(b.r_d_ins_9_1_1 = '1') AS count_val1_r_d_ins_9_1_1, SUM(b.r_d_ins_9_1_1 = '2') AS count_val2_r_d_ins_9_1_1, SUM(b.r_d_ins_9_1_2 = '1') AS count_val1_r_d_ins_9_1_2, SUM(b.r_d_ins_9_1_2 = '2') AS count_val2_r_d_ins_9_1_2,SUM(b.r_d_ins_9_1_2 = '3') AS count_val3_r_d_ins_9_1_2, SUM(b.r_d_ins_101112_1_1 = '1') AS count_val1_r_d_ins_101112_1_1, SUM(b.r_d_ins_101112_1_1 = '2') AS count_val2_r_d_ins_101112_1_1, SUM(b.r_d_ins_101112_1_2 = '1') AS count_val1_r_d_ins_101112_1_2, SUM(b.r_d_ins_101112_1_2 = '2') AS count_val2_r_d_ins_101112_1_2,SUM(b.r_d_ins_101112_1_2 = '3') AS count_val3_r_d_ins_101112_1_2 ";
		$fromQuery = "FROM participant a INNER JOIN design_book_instructor b ON a.id = b.id ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getSummaryOfAgeAndExp($conn){
		$selectQuery = "SELECT MIN(s_age) min_age, MAX(s_age) max_age, MIN(s_experience) min_exp, MAX(s_experience) max_exp, SUM(s_age) sum_age, SUM(s_experience) sum_exp, COUNT(s_age) count_age, COUNT(s_experience) count_exp ";
		$fromQuery = "FROM participant a ";
		$whereQuery = "WHERE a.status = 'a' ";
		$whereQuery .= "AND a.type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function getAllAgeAndExp($conn){
		$selectQuery = "SELECT s_age, s_experience ";
		$fromQuery = "FROM participant ";
		$whereQuery = "WHERE status = 'a' ";
		$whereQuery .= "AND type = 't' ";
		
		$query = $selectQuery.$fromQuery.$whereQuery;
		
		$stmt = $conn->prepare($query);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>