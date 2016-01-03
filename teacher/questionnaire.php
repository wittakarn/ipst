<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
ini_set('session.gc_maxlifetime', SESSION_MAX_LIFE_TIME);
session_set_cookie_params(SESSION_MAX_LIFE_TIME);
session_start();

$_SESSION['SUBMIT_INFORMATION'] = $_POST;

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
		
		function removeAllBookTab(){
			$(".book-tab").remove();
		}
	
		function populateBookTabs(){
			var tabRef;
			var liElement;
			var checkboxs = $(".subject-selected").filter( ":checked" );
			var length = $(".nav-pills").children().length;
			var dynamicHead = $(".head-of-dynamic-tab");
			checkboxs.each(function() {
				tabRef = $(this).attr("tabRef");
				if (tabRef != "designBook") {
					liElement = createBookTab(length, "#" + tabRef);
					dynamicHead.after(liElement);
					dynamicHead = liElement;
					length++;
				}else{
					reRenderDesignBookTabs();
				}
			});
		}
		
		function reRenderDesignBookTabs(){
			var renderTab = false;
			var tabRef = "#designBook";
			var designTab = $("a[ref='#designBook']");
			var liElement;
			var checkboxs = $(".d-degree").filter( ":checked" );
			var length = $(".nav-pills").children().length;
			var dynamicTail = $(".tail-of-dynamic-tab");
			var fieldName;
			var splitArray;
			var splitSize;
			var degree;
			checkboxs.each(function() {
				fieldName = $(this).attr("name");
				splitArray = fieldName.split("_");
				splitSize = splitArray.length;
				degree = splitArray[splitSize-1];
				if (degree != 1 && degree != 4 && degree != 7) {
                    renderTab = true;
                }
			});
			if (renderTab) {
				
				if (designTab.length == 0) {
                    liElement = createBookTab(length, tabRef);
					dynamicTail.before(liElement);
					dynamicTail = liElement;
                }
            }else{
				designTab.parent().remove();
			}
		}
	
		function createBookTab(index, ref){
			var tabName = "ส่วนที่" + index;
			var liElement = $('<li>').attr("role", "presentation")
										.attr("class", "disabled book-tab");
			var aElement = $('<a>').attr("class", "section-tab")
									.attr("href", "#")
									.attr("ref", ref)
									.attr("aria-controls", ref)
									.attr("role", "tab");
			aElement.text(tabName);
			liElement.append(aElement);
			
			return liElement;
		}
		
		function loadScienceBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/science-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php?type=t");
			$("#scienceBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function loadMathBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/math-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php?type=t");
			$("#mathBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
						
		function loadTechnologyQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/technology-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php?type=t");
			$("#technologyBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function loadDesignQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/design-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php?type=t");
			$("#designBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function showWellOfBookUsageSelected(){
			var ref;
			var href;
			var bookUsageSelecteds = $(".book-usage-selected").filter(":checked");
			$.each(bookUsageSelecteds, function( i ) {
				ref = $(this).attr("ref");
				href = "#" + ref;
				if ($(this).val() == '1') {
					$(href).collapse('show');
				}
			});
		}

		function initialSection(){
			$(".explanation").html("ในปีการศึกษา 2558 ท่านได้ใช้หนังสือเรียนหรือสื่อการเรียนรู้ต่าง ๆ ต่อไปนี้ของ สสวท. ในการจัดการเรียนรู้หรือไม่ ถ้าท่านได้ใช้ ท่านรู้สึกอย่างไร โปรดแสดงความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง");
			<?php
				$isEditMode = isset($_SESSION['user_id']) && $_SESSION['user_id'] != null && isset($_GET['id']) && $_GET['id'] !== '';
				if($isEditMode){
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
					
					$conn = DataBaseConnection::createConnect();
					$participant = Participant::get($conn, $_GET['id']);
					
					if(isset($participant)){
						$scienceBook = ScienceBook::get($conn, $_GET['id']);
						$scienceBookInstructor = ScienceBookInstructor::get($conn, $_GET['id']);
						$mathBook = MathBook::get($conn, $_GET['id']);
						$mathBookInstructor = MathBookInstructor::get($conn, $_GET['id']);
						$technologyBook = TechnologyBook::get($conn, $_GET['id']);
						$technologyBookInstructor = TechnologyBookInstructor::get($conn, $_GET['id']);
						$designBook = DesignBook::get($conn, $_GET['id']);
						$designBookInstructor = DesignBookInstructor::get($conn, $_GET['id']);
						
						if($participant['r_receive_contribute_book'] === '1'){
							$contribution = Contribution::get($conn, $_GET['id']);
							
							echo '$("#receiveBookSelectedCollapse").collapse("show");';
							echo 'var loadContributePage = "'.ROOT.'include/contribute-";';
							echo 'loadContributePage = loadContributePage.concat('.$contribution['r_contribute_book_category_selected'].');';
							echo 'loadContributePage = loadContributePage.concat(".php");';
							
						}
					}
					
					echo 'var defs = [];';
					$defCount = 0;
					
					if(isset($participant['c_s']) && $participant['c_s'] === '1'){
						echo '$("#scienceSubjectSelectedCollapse").collapse("show");';
						$isLoad101112Science = false;
						$isLoad789ScienceAdditional = false;
						for($i=1;$i<=12;$i++){
							if(isset($participant['c_s_'.$i]) && $participant['c_s_'.$i] === '1'){
								if($i <= 9){
									echo 'defs['.$defCount.'] = $.Deferred();';
									echo 'loadScienceBookQuestionnair('.$i.', defs['.$defCount.']);';
									$defCount++;
									
									if($i > 6 && $i < 10 && !$isLoad789ScienceAdditional){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadScienceBookQuestionnair("789-additional", defs['.$defCount.']);';
										$isLoad789ScienceAdditional = true;
										$defCount++;
									}
								}else{
									if($i > 9 && !$isLoad101112Science){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadScienceBookQuestionnair('.$i.', defs['.$defCount.']);';
										$isLoad101112Science = true;
										$defCount++;
									}
								}
							}
						}
					}
					
					if(isset($participant['c_m']) && $participant['c_m'] === '1'){
						echo '$("#mathematicSubjectSelectedCollapse").collapse("show");';
						$isLoad101112Math = false;
						for($i=1;$i<=12;$i++){
							if(isset($participant['c_m_'.$i]) && $participant['c_m_'.$i] === '1'){
								if($i <= 9){
									echo 'defs['.$defCount.'] = $.Deferred();';
									echo 'loadMathBookQuestionnair('.$i.', defs['.$defCount.']);';
									$defCount++;
								}else{
									if($i > 9 && !$isLoad101112Math){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadMathBookQuestionnair('.$i.', defs['.$defCount.']);';
										$isLoad101112Math = true;
										$defCount++;
									}
								}
							}
						}
					}
					
					if(isset($participant['c_t']) && $participant['c_t'] === '1'){
						echo '$("#technologySubjectSelectedCollapse").collapse("show");';
						$isLoad101112Technology = false;
						$isLoad789TechnologyAdditional = false;
						for($i=1;$i<=12;$i++){
							if(isset($participant['c_t_'.$i]) && $participant['c_t_'.$i] === '1'){
								if($i <= 9){
									echo 'defs['.$defCount.'] = $.Deferred();';
									echo 'loadTechnologyQuestionnair('.$i.', defs['.$defCount.']);';
									$defCount++;
									
									if($i > 6 && $i < 10 && !$isLoad789TechnologyAdditional){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadTechnologyQuestionnair("789-additional", defs['.$defCount.']);';
										$isLoad789TechnologyAdditional = true;
										$defCount++;
									}
								}else{
									if($i > 9 && !$isLoad101112Technology){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadTechnologyQuestionnair('.$i.', defs['.$defCount.']);';
										$isLoad101112Technology = true;
										$defCount++;
									}
								}
							}
						}
					}
					
					if(isset($participant['c_d']) && $participant['c_d'] === '1'){
						echo '$("#designSubjectSelectedCollapse").collapse("show");';
						$isLoad101112Design = false;
						$isLoad89Design = false;
						$isLoadAllDesign = false;
						for($i=1;$i<=12;$i++){
							if(isset($participant['c_d_'.$i]) && $participant['c_d_'.$i] === '1'){
								if($i <= 9){
									echo 'defs['.$defCount.'] = $.Deferred();';
									echo 'loadDesignQuestionnair('.$i.', defs['.$defCount.']);';
									$defCount++;
									
									if(($i == 8 || $i == 9) && !$isLoad89Design){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadDesignQuestionnair("89", defs['.$defCount.']);';
										$isLoad89Design = true;
										$defCount++;
									}
								}else{
									if($i > 9 && !$isLoad101112Design){
										echo 'defs['.$defCount.'] = $.Deferred();';
										echo 'loadDesignQuestionnair('.$i.', defs['.$defCount.']);';
										$isLoad101112Design = true;
										$defCount++;
									}
								}
								
								if($i != 1 && $i != 4 && $i != 7 && !$isLoadAllDesign){
									echo 'defs['.$defCount.'] = $.Deferred();';
									echo 'loadDesignQuestionnair("all", defs['.$defCount.']);';
									$isLoadAllDesign = true;
									$defCount++;
								}
							}
						}
					}
					
					
					if($participant['r_receive_contribute_book'] === '1'){
						echo 'defs['.$defCount.'] = $.Deferred();';
						echo '$("#contributeBookSelectedCollapse").collapse("show");';
						echo 'var loadContributePage = "'.ROOT.'include/contribute-";';
						echo 'loadContributePage = loadContributePage.concat('.$contribution['r_contribute_book_category_selected'].');';
						echo 'loadContributePage = loadContributePage.concat(".php?type=t");';

						echo '$("#contributeBookSelectedSection").load(loadContributePage, function(){defs['.$defCount.'].resolve()});';
					}
					
					echo '$.when.apply($,defs).done(function() {initialSelectedQuestionnaire();populateBookTabs();showWellOfBookUsageSelected();reRenderDesignBookTabs();setBookSatisfactionEvent();});';
				}
			?>
		}
		
		function initialSelectedQuestionnaire(){

			<?php
				if($isEditMode){
					foreach($participant as $key=>$value){
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
					
					if(isset($scienceBook) && $scienceBook != null){
						foreach($scienceBook as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($scienceBookInstructor) && $scienceBookInstructor != null){
						foreach($scienceBookInstructor as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($mathBook) && $mathBook != null){
						foreach($mathBook as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($mathBookInstructor) && $mathBookInstructor != null){
						foreach($mathBookInstructor as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($technologyBook) && $technologyBook != null){
						foreach($technologyBook as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($technologyBookInstructor) && $technologyBookInstructor != null){
						foreach($technologyBookInstructor as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($designBook) && $designBook != null){
						foreach($designBook as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($designBookInstructor) && $designBookInstructor != null){
						foreach($designBookInstructor as $key=>$value){
							if($value !== ''){
								if(startsWith($key, 'i_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
								}else if(startsWith($key, 'h_')){
									echo '$("input[name=\''.$key,'\']").val("'.$value.'");';
									echo 'var link = $("a[ref=\'link_ref_'.$key,'\']");';
									echo 'var remover = $("a[ref=\'remove_ref_'.$key,'\']");';
									echo "link.attr('href', '".ROOT."downloader/file-viewer.php?file=".$value."');";
									echo "link.attr('style', 'display:inline;');";
									echo "remover.attr('style', 'display:inline;');";
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
					
					if(isset($contribution) && $contribution != null){
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
				}
				
				function startsWith($pattern, $startWith) {
					return $startWith === "" || strrpos($pattern, $startWith, -strlen($pattern)) !== FALSE;
				}
			?>
		}
	</script>
	
	<script src="<?php echo ROOT; ?>teacher/script/information.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>teacher/script/questionnaire.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>script/book-satisfaction.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>script/contribute.js" type="text/javascript"></script>
  </head>

  <body>

	<?php
		include DOCUMENT_ROOT.'teacher/include/header.php';
	?>
	
	<form id="questionForm" method="POST" enctype="multipart/form-data">
		<!-- Begin page content -->
		<div class="container">
			<!-- Nav tabs -->
			<ul class="nav nav-pills" role="tablist">
				<li role="presentation" class="active"><a class="section-tab" href="#generalInformation" aria-controls="generalInformation" role="tab" data-toggle="pill">ส่วนที่ 1</a></li>
				<li role="presentation" class="disabled head-of-dynamic-tab"><a class="section-tab" href="#" ref="#satisfaction" aria-controls="satisfaction" role="tab" >ส่วนที่ 2</a></li>
				<li role="presentation" class="disabled tail-of-dynamic-tab"><a class="section-tab" href="#" ref="#contribute" aria-controls="contribute" role="tab" >ส่วนสุดท้าย</a></li>
			</ul>
			<br/>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="generalInformation">
					<?php
						include DOCUMENT_ROOT.'teacher/include/information.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="satisfaction">
					<?php
						include DOCUMENT_ROOT.'teacher/include/satisfaction.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="scienceBook">
					<?php
						include DOCUMENT_ROOT.'include/science-book.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="mathBook">
					<?php
						include DOCUMENT_ROOT.'include/math-book.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="technologyBook">
					<?php
						include DOCUMENT_ROOT.'include/technology-book.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="designBook">
					<?php
						include DOCUMENT_ROOT.'include/design-book.php';
					?>
				</div>
				<div role="tabpanel" class="tab-pane" id="contribute">
					<?php
						include DOCUMENT_ROOT.'include/receiver-information.php';
					?>
				</div>
			</div>
			<nav>
				<ul class="pager">
					<li>
						<?php
							if($isEditMode){
								echo '<button type="button" 
											class="btn btn-warning"
											data-toggle="modal" 
											data-target="#myDisableModal">
											ไม่นำมาประมวลผล
										</button>';
							}
						?>
					</li>
				</ul>
			</nav>
			<div class="modal fade" id="myDisableModal" tabindex="-1" role="dialog" aria-labelledby="myDisableModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myDisableModalLabel">ยืนยันการไม่นำมาประมวลผล</h4>
					</div>
					<div class="modal-body">
						ท่านยืนยันที่จะไม่นำแบบประเมินนี้มาประมวลผล ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="disableButton">ตกลง</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
					</div>
					</div>
				</div>
			</div>
		</div>
		<input id="pType" type="hidden" name="type" value="t"/>
		<input type="hidden" name="updateId" value="<?php echo $_REQUEST['id']?>"/>
	</form>
    
  </body>
</html>
