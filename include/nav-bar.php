<?php
$requestUri = $_SERVER['REQUEST_URI'];
$indexRegister = strpos($requestUri, 'register.php');
$indexManageQuestionnaire = strpos($requestUri, 'manage-questionnaire.php');
$indexCustomer = strpos($requestUri, 'customer.php');
$indexQuotation = strpos($requestUri, 'quotation.php');
?>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php echo WEB_ROOT;?>index.php">ระบบจัดการข้อมูลแบบสอบถาม</a>
	</div>
	
	<div id="navbar" class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<?php
			$menuLink = "";
			$registerLink = "";
			$productLink = "";
			$customerLink = "";
			$quotationLink = "";
			if($userId != null){
				$hoverLink = ($indexRegister > 0) ? 'active' : '';
				$hrefRegisterLink = WEB_ROOT.'pages/register.php?MODE=S';
				
				$registerLink = '<li class="dropdown '.$hoverLink.'">
								  <a href="#" class="dropdown-toggle" 
								  data-toggle="dropdown" role="button" 
								  aria-haspopup="true" aria-expanded="false">ลงทะเบียน
								  <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu">
									<li class="'.$hoverLink.'"><a href="'.$hrefRegisterLink.'">จัดการผู้ใช้งาน</a></li>
								  </ul>
								</li>';
								
				$hoverQuestionnaireLink = ($indexManageQuestionnaire > 0) ? 'active' : '';
				$hoverManageQuestionnaireLink = ($indexManageQuestionnaire > 0) ? 'active' : '';
				$hrefManageQuestionnaireLink = WEB_ROOT.'pages/manage-questionnaire.php?MODE=S';
				
				$questionnaireLink = '<li class="dropdown '.$hoverQuestionnaireLink.'">
								  <a href="#" class="dropdown-toggle" 
								  data-toggle="dropdown" role="button" 
								  aria-haspopup="true" aria-expanded="false">แบบสอบถาม
								  <span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="'.$hoverManageQuestionnaireLink.'"><a href="'.$hrefManageQuestionnaireLink.'">จัดการข้อมูลแบบสอบถาม</a></li>
								  </ul>
								</li>';
			}
			
			if($role === 'A'){
				$menuLink = $menuLink.$registerLink;
			}
			$menuLink = $menuLink.$questionnaireLink;
			
			echo $menuLink;
		?>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li>
			<?php
				if($userId != null) {
					echo '<li id="fat-menu" class="dropdown">
							  <a id="user-option" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
								<span class="glyphicon glyphicon-user"></span> '.$userId.'
								<span class="caret"></span>
							  </a>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="user-option">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="'.ROOT.'security/logout.php">
									<span class="glyphicon glyphicon-off"></span>ออกจากระบบ</a>
								</li>
							  </ul>
							</li>';
				}else{
					echo '<a href="'.WEB_ROOT.'pages/sign-in.php'.'">
							<span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ
						</a>';
				}
			?>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>