<div class="panel panel-primary">
	<div class="panel-heading">รายละเอียดลูกค้า</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<p class="text-right"><strong>ชื่อ</strong></p>
			</div>
			<div class="col-md-9 col-sm-7">
				<?php echo isset($customerSelected) ? $customerSelected['customer_name'].'<abbr title="ระดับของลูกค้า" class="text-uppercase">('.$customerSelected['grade'].')</abbr>' : ''?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<p class="text-right"><strong>ที่อยู่</strong></p>
			</div>
			<div class="col-md-9 col-sm-7">
				<?php echo isset($customerSelected) ? $customerSelected['address'] : ''?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<p class="text-right"><strong>โทรศัพท์</strong></p>
			</div>
			<div class="col-md-9 col-sm-7">
				<?php echo isset($customerSelected) ? $customerSelected['tel'] : ''?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<p class="text-right"><strong>Email</strong></p>
			</div>
			<div class="col-md-9 col-sm-7">
				<?php echo isset($customerSelected) ? $customerSelected['email'] : ''?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-5">
				<p class="text-right"><strong>ติดต่อ</strong></p>
			</div>
			<div class="col-md-9 col-sm-7">
				<?php 
					echo isset($customerSelected) ? $customerSelected['contact'].' ' : '';
					
					$haveFileBlob1 = isset($fileBlob1) && is_array($fileBlob1);
					$haveFileBlob2 = isset($fileBlob2) && is_array($fileBlob2);
					
					if($haveFileBlob1 || $haveFileBlob2){
						$remarkDropdown = '<button class="btn btn-default btn-xs dropdown-toggle" 
													type="button" id="remarkLink" 
													data-toggle="dropdown" 
													aria-haspopup="true" 
													aria-expanded="true">
											เพิ่มเติม<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" aria-labelledby="remarkLink">';
						if($haveFileBlob1){
							$hrefUrl = $viewerUrl.'1';
							$remarkDropdown = $remarkDropdown.'<li>
																	<a href="'.$hrefUrl.'" target="_blank">
																		ที่อยู่จัดส่ง
																	</a>
																</li>';
						}
					
						if($haveFileBlob2){
							$hrefUrl = $viewerUrl.'2';
							$remarkDropdown = $remarkDropdown.'<li>
																	<a href="'.$hrefUrl.'" target="_blank">
																		รายละเอียดอื่นๆ
																	</a>
																</li>';
						}
						
						$remarkDropdown = $remarkDropdown.'</ul>';
						
						echo $remarkDropdown;
					}
				?>
			</div>
		</div>
	</div>
</div>