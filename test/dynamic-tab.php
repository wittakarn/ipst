<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");

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
		$(document)
					.ready(
							function() {
									
									$(".subject-selected").click(function() {
										var tabRef = $(this).attr("tabRef");
										if ($(this).is(":checked")) {
											var id = $(".nav-pills").children().length;
											var tabName = "ส่วนที่" + (id + 1);
											var id = $(".nav-pills").children().length;
											var lastPill = $(".nav-pills").children().last();
											
											var liElement = $('<li>').attr("role", "presentation");
											var aElement = $('<a>').attr("class", "section-tab")
																	.attr("href", "#" + tabRef)
																	.attr("aria-controls", tabRef)
																	.attr("role", "tab")
																	.attr("data-toggle", "pill");
											aElement.text(tabName);
											liElement.append(aElement);
											lastPill.after(liElement);
										}else{
											$("a[aria-controls='" + tabRef + "']").parent().remove();
										}
										
										
									});
							
							}
					);		
	</script>
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
				<li role="presentation" ><a class="section-tab" href="#satisfaction" aria-controls="satisfaction" role="tab" data-toggle="pill">ส่วนที่ 2</a></li>
			</ul>
			<br/>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="generalInformation">
					<div class="panel panel-primary">
					<div class="panel-heading">ข้อมูลทั่วไปของผู้ตอบแบบสอบถาม</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="checkbox">
									  <label>
										<input class="subject-selected subject-group" 
												type="checkbox" 
												id="scienceSubjectSelected" 
												value="1" 
												name="c_s"
												ref="scienceSubjectSelectedCollapse"
												tabRef="scienceBook"/>
										วิทยาศาสตร์
									  </label>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="checkbox">
									  <label>
										<input class="subject-selected subject-group"
												type="checkbox" 
												id="mathematicSubjectSelected" 
												value="1" 
												name="c_m"
												ref="mathematicSubjectSelectedCollapse"
												tabRef="mathBook"/>
										คณิตศาสตร์
									  </label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="checkbox">
									  <label>
										<input class="subject-selected subject-group"
												type="checkbox" 
												id="technologySubjectSelected" 
												value="1" 
												name="c_t"
												ref="technologySubjectSelectedCollapse"
												tabRef="technologyBook"/>
										เทคโนโลยีสารสนเทศและการสื่อสาร
									  </label>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="checkbox">
									  <label>
										<input class="subject-selected subject-group"
												type="checkbox" 
												id="designSubjectSelected" 
												value="1" 
												name="c_d"
												ref="designSubjectSelectedCollapse"
												tabRef="designBook"/>
										การออกแบบและเทคโนโลยี
									  </label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="scienceBook">
					scienceBook
				</div>
				<div role="tabpanel" class="tab-pane" id="mathBook">
					mathBook
				</div>
				<div role="tabpanel" class="tab-pane" id="technologyBook">
					technologyBook
				</div>
				<div role="tabpanel" class="tab-pane" id="designBook">
					designBook
				</div>
				<div role="tabpanel" class="tab-pane" id="satisfaction">
					satisfaction
				</div>
				<div role="tabpanel" class="tab-pane" id="contribute">
					contribute
				</div>
			</div>
		<input type="hidden" name="type" value="t"/>
		<input type="hidden" name="updateId" value="<?php echo $_REQUEST['id']?>"/>
	</form>
    
  </body>
</html>
