<?php
class Contribution
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
						'id', 'i_receiver_fullname', 't_receiver_address', 'i_receiver_postcode', 'r_contribute_book_category_selected', 'r_contribute_book_selected'
					);
		$params['id'] = $createId;
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "INSERT INTO contribute( %s ) VALUES ( %s )";
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
						'i_receiver_fullname', 't_receiver_address', 'i_receiver_postcode', 'r_contribute_book_category_selected', 'r_contribute_book_selected'
					);
		
		foreach ($fields as $field) {
			if(!isset($params[$field])){
				$params[$field] = null;
			}
		}
		
		$query = "UPDATE contribute SET %s ";
		// make a list of named parameters: titulo=:titulo, tipo_produto=:tipo_produto /*, etc. */
		$fieldsClause = implode( ', ', array_map( function( $value ) { return $value . '=:' . $value; }, $fields ) );
		
		$query = sprintf( $query, $fieldsClause);
		
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
		$query = "SELECT * FROM contribute WHERE id = :id";
		$stmt = $conn->prepare($query); 
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function searchControbutionBook($conn, $params){
		$firstCondition = true;
		
		$selectQuery = "SELECT a.*, c.name book_name ";
		$fromQuery = "FROM contribute a ";
		$fromQuery .= "INNER JOIN participant b ON a.id = b.id ";
		$fromQuery .= "INNER JOIN contribute_list c ON a.r_contribute_book_selected = c.id ";
		$whereQuery = "WHERE b.status = 'a' ";
		$whereQuery .= "AND b.type = '".$params['participant_type']."' ";
		
		if(isset($params['category'])){
			$whereQuery .= "AND a.r_contribute_book_category_selected = '".$params['category']."' ";
		}
		
		if(isset($params['contribute_selected'])){
			$whereQuery .= "AND a.r_contribute_book_selected = '".$params['contribute_selected']."' ";
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
}

?>