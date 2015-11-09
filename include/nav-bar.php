<?php
$requestUri = $_SERVER['REQUEST_URI'];
$indexRegister = strpos($requestUri, 'register.php');
$indexProduct = strpos($requestUri, 'product.php');
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
	  <a class="navbar-brand" href="<?php echo WEB_ROOT;?>index.php">SEQUOT System</a>
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
								
				$hoverProductLink = ($indexProduct > 0) ? 'active' : '';
				$hrefProductLink = WEB_ROOT.'pages/product.php?MODE=S';
				
				$productLink = '<li class="dropdown '.$hoverProductLink.'">
								  <a href="#" class="dropdown-toggle" 
								  data-toggle="dropdown" role="button" 
								  aria-haspopup="true" aria-expanded="false">สินค้า
								  <span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="'.$hoverProductLink.'"><a href="'.$hrefProductLink.'">จัดการสินค้า</a></li>
								  </ul>
								</li>';
								
				$hoverCustomerLink = ($indexCustomer > 0) ? 'active' : '';
				$hrefCustomerLink = WEB_ROOT.'pages/customer.php?MODE=S';
				
				$customerLink = '<li class="dropdown '.$hoverCustomerLink.'">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ลูกค้า<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="'.$hoverCustomerLink.'"><a href="'.$hrefCustomerLink.'">จัดการลูกค้า</a></li>
								  </ul>
								</li>';
								
				$hoverQuotationLink = ($indexQuotation > 0) ? 'active' : '';
				$hrefQuotationLink = WEB_ROOT.'pages/quotation.php?MODE=C';
				
				$quotationLink = '<li class="dropdown '.$hoverQuotationLink.'">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ขายสินค้า<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="'.$hoverQuotationLink.'"><a href="'.$hrefQuotationLink.'">ใบเสนอราคา</a></li>
								  </ul>
								</li>';
			}
			
			if($role === 'A'){
				$menuLink = $menuLink.$registerLink;
			}
			$menuLink = $menuLink.$productLink.$customerLink.$quotationLink;
			
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