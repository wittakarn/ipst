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
		
		function removeAllBookTab(){
			$(".book-tab").remove();
		}
	
		function populateBookTabs(degree){
			var liElement;
			var length = $(".nav-pills").children().length;
			var dynamicHead = $(".head-of-dynamic-tab");
			
			liElement = createBookTab(length++, "#scienceBook");
			dynamicHead.after(liElement);
			dynamicHead = liElement;
			
			liElement = createBookTab(length++, "#mathBook");
			dynamicHead.after(liElement);
			dynamicHead = liElement;
			
			liElement = createBookTab(length++, "#technologyBook");
			dynamicHead.after(liElement);
			dynamicHead = liElement;
			
			if(degree != '1' && degree != '4' && degree != '7'){					
				liElement = createBookTab(length++, "#designBook");
				dynamicHead.after(liElement);
				dynamicHead = liElement;
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
		
		function reBindingTabEvent() {
            $(".remove-file").unbind();
			$('.section-tab').click(function (e) {
				var li = $(this).parent();
				var currentIndex = li.index();
				var ul = li.parent();
				$(ul).find(".section-tab").each(function() {
					var a = $(this);
					li = $(this).parent();
					if(li.index() > currentIndex){
						li.addClass("disabled");
						a.removeAttr("data-toggle");
						a.attr("href", "#");
					}
				});
			});
        }
		
		function loadScienceBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/science-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php");
			
			$("#scienceBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function loadMathBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/math-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php");
			
			$("#mathBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function loadTechnologyBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/technology-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php");
			
			$("#technologyBookSection" + degree).load(loadPage, function() {def.resolve()});
		}
		
		function loadDesignBookQuestionnair(degree, def){
			var loadPage = contextRoot.concat("include/design-");
			loadPage = loadPage.concat(degree);
			loadPage = loadPage.concat(".php");
			
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
			$(".explanation").html("ในปีการศึกษา 2558 นักเรียนได้ใช้หนังสือเรียนหรือสื่อการเรียนรู้ต่าง ๆ ต่อไปนี้ของ สสวท. ในการเรียนของนักเรียนหรือไม่ (ทั้งการเรียนในโรงเรียนและการเรียนรู้ด้วยตนเอง) ถ้านักเรียนได้ใช้หนังสือเรียนและสื่อการเรียนรู้ดังกล่าว นักเรียนรู้สึกอย่างไร โปรดแสดงความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง");
			<?php
				$isEditMode = isset($_SESSION['user_id']) && $_SESSION['user_id'] != null && isset($_GET['id']) && $_GET['id'] !== '';
				if($isEditMode){
					require_once DOCUMENT_ROOT.'/connection.php';
					require_once DOCUMENT_ROOT.'/class/class.Participant.php';
					require_once DOCUMENT_ROOT.'/class/class.Contribution.php';
					require_once DOCUMENT_ROOT.'/class/class.ScienceBook.php';
					require_once DOCUMENT_ROOT.'/class/class.MathBook.php';
					require_once DOCUMENT_ROOT.'/class/class.TechnologyBook.php';
					require_once DOCUMENT_ROOT.'/class/class.DesignBook.php';
					
					$conn = DataBaseConnection::createConnect();
					$participant = Participant::get($conn, $_GET['id']);
					
					if(isset($participant)){
						$scienceBook = ScienceBook::get($conn, $_GET['id']);
						$mathBook = MathBook::get($conn, $_GET['id']);
						$technologyBook = TechnologyBook::get($conn, $_GET['id']);
						$designBook = DesignBook::get($conn, $_GET['id']);
						
						if($participant['r_receive_contribute_book'] === '1'){
							$contribution = Contribution::get($conn, $_GET['id']);
							
							echo '$("#receiveBookSelectedCollapse").collapse("show");';
							echo 'var loadContributePage = "'.ROOT.'include/contribute-";';
							echo 'loadContributePage = loadContributePage.concat('.$contribution['r_contribute_book_category_selected'].');';
							echo 'loadContributePage = loadContributePage.concat(".php");';
							
						}
					}
					echo 'var defs = [];';
					echo 'var degree = '.$participant["s_degree"].';';
					echo 'populateBookTabs(degree);';
						
					echo 'defs[0] = $.Deferred();';
					echo 'defs[1] = $.Deferred();';
					echo 'defs[2] = $.Deferred();';
					echo 'defs[3] = $.Deferred();';
					
					echo 'loadScienceBookQuestionnair(degree, defs[0]);';
					echo 'loadMathBookQuestionnair(degree, defs[1]);';
					echo 'loadTechnologyBookQuestionnair(degree, defs[2]);';
					echo 'loadDesignBookQuestionnair(degree, defs[3]);';
					
					echo 'if(degree > 6 && degree < 10){';
					echo 'defs[4] = $.Deferred();';
					echo 'loadScienceBookQuestionnair("789-additional", defs[4]);';

					echo 'defs[5] = $.Deferred();';
					echo 'loadTechnologyBookQuestionnair("789-additional", defs[5]);';
						
					echo 'if(degree > 7 && degree < 10){';
					echo 'defs[6] = $.Deferred();';
					echo 'loadDesignBookQuestionnair("89", defs[6]);';
					echo '}';
					echo '}';
					
					echo 'if(degree != 1 && degree != 4 && degree != 7){';
					echo 'defs[7] = $.Deferred();';
					echo 'loadDesignBookQuestionnair("all", defs[7]);';
					echo '}';
					
					if($participant['r_receive_contribute_book'] === '1'){
						echo 'defs[8] = $.Deferred();';	
						echo '$("#contributeBookSelectedCollapse").collapse("show");';
						echo 'var loadContributePage = "'.ROOT.'include/contribute-";';
						echo 'loadContributePage = loadContributePage.concat('.$contribution['r_contribute_book_category_selected'].');';
						echo 'loadContributePage = loadContributePage.concat(".php?type=s");';
  
						echo '$("#contributeBookSelectedSection").load(loadContributePage, function(){defs[8].resolve()});';
					}
					
					echo '$.when.apply($,defs).done(function() {initialSelectedQuestionnaire();showWellOfBookUsageSelected();reBindingTabEvent();setBookSatisfactionEvent();});';
					
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
				<li role="presentation" class="active head-of-dynamic-tab"><a class="section-tab" href="#generalInformation" aria-controls="generalInformation" role="tab" data-toggle="pill">ส่วนที่ 1</a></li>

				<li role="presentation" class="disabled"><a class="section-tab" href="#" ref="#contribute" aria-controls="contribute" role="tab" >ส่วนสุดท้าย</a></li>
			</ul>
			<br/>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="generalInformation">
					<?php
						include DOCUMENT_ROOT.'student/include/information.php';
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
								if($participant['status'] === 'a'){
									echo '<button type="button" 
											  class="btn btn-warning"
											  data-toggle="modal" 
											  data-target="#myDisableModal">
											  ไม่นำมาประมวลผล
										  </button>';
								}else{
									echo '<button type="button"
											  id="enableButton"
											  class="btn btn-success">
											  นำกลับมาประมวลผล
										  </button>'; 
								}
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
		<input id="pType" type="hidden" name="type" value="s"/>
		<input type="hidden" name="updateId" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ''; ?>"/>
	</form>
    
  </body>
</html>
