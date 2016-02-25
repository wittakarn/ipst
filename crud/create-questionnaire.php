<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Participant.php';
require_once DOCUMENT_ROOT.'/class/class.Contribution.php';
require_once DOCUMENT_ROOT.'/class/class.ScienceBook.php';
require_once DOCUMENT_ROOT.'/class/class.ScienceBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.MathBook.php';
require_once DOCUMENT_ROOT.'/class/class.MathBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.TechnologyBook.php';
require_once DOCUMENT_ROOT.'/class/class.TechnologyBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.DesignBook.php';
require_once DOCUMENT_ROOT.'/class/class.DesignBookInstructor.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		
		if(isset($_REQUEST['type'])){
			$participant = new Participant($conn, $_REQUEST);
			$createId = $participant->create();
			
			$scienceBook = new ScienceBook($conn, $_REQUEST);
			$scienceBook->create($createId);
			
			$mathBook = new MathBook($conn, $_REQUEST);
			$mathBook->create($createId);
			
			$technologyBook = new TechnologyBook($conn, $_REQUEST);
			$technologyBook->create($createId);
			
			$designBook = new DesignBook($conn, $_REQUEST);
			$designBook->create($createId);
			
			if($_REQUEST['type'] === 't'){
				$scienceBookInstructor = new ScienceBookInstructor($conn, $_REQUEST);
				$scienceBookInstructor->create($createId);
				
				$mathBookInstructor = new MathBookInstructor($conn, $_REQUEST);
				$mathBookInstructor->create($createId);
				
				$technologyBookInstructor = new TechnologyBookInstructor($conn, $_REQUEST);
				$technologyBookInstructor->create($createId);
				
				$designBookInstructor = new DesignBookInstructor($conn, $_REQUEST);
				$designBookInstructor->create($createId);
			}
			
			if(isset($_REQUEST['r_receive_contribute_book']) && $_REQUEST['r_receive_contribute_book'] == '1'){
				$contribution = new Contribution($conn, $_REQUEST);
				$contribution->create($createId);
			}
		}
  
		$conn->commit();
	} catch (PDOException $e) {
		$conn->rollBack();
		$error = " Failed: " . $e->getMessage();
		echo $error;
		error_log(date('Y/m/d H:i:s').$error.PHP_EOL, 3, APP_LOG);
	}
	$conn = null;
}
header('Location: '.ROOT.'pages/complete.php');
?>