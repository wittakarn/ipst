<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once '../config.php';
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Participant.php';

// output headers so that the file is downloaded rather than displayed
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=questionnaire-history.csv');
echo "\xEF\xBB\xBF"; // UTF-8 BOM
$response = null;
try{
	$conn = DataBaseConnection::createConnect();
	
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');
	
	$results = Participant::searchQuestionnaireHistory($conn, $_REQUEST);
	
	// output the column headings
	if(count($results) > 0){
		unset($results[0]['id']);
		fputcsv($output, array_keys($results[0]));
	}

	// loop over the rows, outputting them
	foreach($results as $row) {
		unset($row['id']);
		fputcsv($output, $row);
	}
}catch(Exception $e) {
	echo "Error: " . $e->getMessage();
}
?>