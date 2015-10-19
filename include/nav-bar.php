﻿<?php
$requestUri = $_SERVER['REQUEST_URI'];
$indexRegister = strpos($requestUri, 'register.php');
$indexProduct = strpos($requestUri, 'product.php');
$indexCustomer = strpos($requestUri, 'customer.php');
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
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ลงทะเบียน<span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li class="<?php echo ($indexRegister > 0) ? 'active' : '';?>"><a href="<?php echo WEB_ROOT;?>pages/register.php?MODE=S">จัดการผู้ใช้งาน</a></li>
		  </ul>
		</li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สินค้า<span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li class="<?php echo ($indexProduct > 0) ? 'active' : '';?>"><a href="<?php echo WEB_ROOT;?>pages/product.php?MODE=S">จัดการสินค้า</a></li>
		  </ul>
		</li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ลูกค้า<span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li class="<?php echo ($indexCustomer > 0) ? 'active' : '';?>"><a href="<?php echo WEB_ROOT;?>pages/customer.php?MODE=S">จัดการลูกค้า</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>