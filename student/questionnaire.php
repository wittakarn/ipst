<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>แบบสอบถามสื่อการเรียนรู้</title>
	
	<link rel='shortcut icon' href='<?php echo ROOT; ?>favicon.ico' type='image/x-icon'/ >
	<link rel="icon" href="<?php echo ROOT; ?>favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT; ?>/style/header-template.css" rel="stylesheet">
	<link href="<?php echo ROOT; ?>/style/template.css" rel="stylesheet">
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/error.message.css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.custom.message.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/additional-methods.min.js"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.custom.message.js" type="text/javascript"></script>
	
	<script language="javascript" type="text/javascript">
		var contextRoot = "<?php echo ROOT; ?>";
		var RecaptchaOptions = {
			theme : 'custom',
			custom_theme_widget: 'recaptcha_widget'
		};
		
		function initialSection(){
			<?php
				$isEditMode = isset($_SESSION['user_id']) && $_SESSION['user_id'] != null && isset($_GET['id']) && $_GET['id'] !== '';
				if($isEditMode){
					require_once(DOCUMENT_ROOT.'/connection.php');
					require_once(DOCUMENT_ROOT.'/class/class.Participant.php');
					require_once(DOCUMENT_ROOT.'/class/class.Contribution.php');
					
					$conn = DataBaseConnection::createConnect();
					$participant = Participant::get($conn, $_GET['id']);
					
					if(isset($participant)){
						
						if($participant['r_receive_contribute_book'] === '1'){
							$contribution = Contribution::get($conn, $_GET['id']);
							
							echo '$("#receiveBookSelectedCollapse").collapse("show");';
							echo 'var loadPage = "'.ROOT.'include/contribute-";';
							echo 'loadPage = loadPage.concat('.$contribution['r_contribute_book_category_selected'].');';
							echo 'loadPage = loadPage.concat(".php");';
							echo '$("#contributeBookSelectedSection").load(loadPage, function() {initialSelectedQuestionnaire();});';
							
						}
					}
				}
			?>
		}
		
		function initialSelectedQuestionnaire(){
			<?php
				if($isEditMode){
					foreach($participant as $key=>$value){
						if($value !== ''){
							if(startsWith($key, 'i_') || startsWith($key, 't_') || startsWith($key, 'h_')){
								echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
							}else if(startsWith($key, 'c_')){
								if($value === '1'){
									echo '$("input[name=\''.$key,'\']").prop("checked", true);';
								}
							}if(startsWith($key, 'r_')){
								echo '$("input[name=\''.$key,'\'][value=\''.$value,'\']").prop("checked", true);';
							}if(startsWith($key, 's_')){
								echo '$("select[name=\''.$key,'\']").val("'.$value.'");';
							}
						}
					}
					
					foreach($contribution as $key=>$value){
						if($value !== ''){
							if(startsWith($key, 'i_') || startsWith($key, 'h_')){
								echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
							}else if(startsWith($key, 'c_')){
								if($value === '1'){
									echo '$("input[name=\''.$key,'\']").prop("checked", true);';
								}
							}if(startsWith($key, 'r_')){
								echo '$("input[name=\''.$key,'\'][value=\''.$value,'\']").prop("checked", true);';
							}if(startsWith($key, 's_')){
								echo '$("select[name=\''.$key,'\']").val("'.$value.'");';
							}if(startsWith($key, 't_')){
								echo '$("textarea[name=\''.$key,'\']").val("'.$value.'");';
							}
						}
					}
				}
				
				function startsWith($pattern, $startWith) {
					return $startWith === "" || strrpos($pattern, $startWith, -strlen($pattern)) !== FALSE;
				}
			?>
		}
	</script>
	
	<script src="<?php echo ROOT; ?>student/script/information.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>student/script/questionnaire.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>script/book-satisfaction.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>script/contribute.js" type="text/javascript"></script>
  </head>

  <body>

	<?php
		include DOCUMENT_ROOT.'student/include/header.php';
	?>
	
	<form id="questionForm" method="POST" enctype="multipart/form-data">
		<!-- Begin page content -->
		<div class="container">
			<!-- Nav tabs -->
			<ul class="nav nav-pills" role="tablist">
				<li role="presentation" class="active"><a class="section-tab" href="#generalInformation" aria-controls="generalInformation" role="tab" data-toggle="pill">ส่วนที่ 1</a></li>
				<li role="presentation" class="disabled"><a class="section-tab" href="#" ref="#booksSatisfaction" aria-controls="booksSatisfaction" role="tab" >ส่วนที่ 2</a></li>
				<li role="presentation" class="disabled"><a class="section-tab" href="#" ref="#contribute" aria-controls="contribute" role="tab" >ส่วนที่ 3</a></li>
			</ul>
			<br/>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="generalInformation">
					<?php
						include DOCUMENT_ROOT.'student/include/information.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="booksSatisfaction">
					<?php
						include DOCUMENT_ROOT.'include/book-satisfaction.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="contribute">
					<?php
						include DOCUMENT_ROOT.'include/receiver-information.php';
					?>
				</div>
			</div>
		</div>
		<input type="hidden" name="type" value="s"/>
	</form>
    
  </body>
</html>
