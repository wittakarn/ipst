<div class="panel panel-primary">
	<div class="panel-heading">รายละเอียดลูกค้า</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<p class="text-right"><strong>ชื่อ</strong></p>
			</div>
			<div class="col-md-9">
				<p><?php echo isset($customerSelected) ? $customerSelected['customer_name'].'<abbr title="ระดับของลูกค้า" class="text-uppercase">('.$customerSelected['grade'].')</abbr>' : ''?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<p class="text-right"><strong>ที่อยู่</strong></p>
			</div>
			<div class="col-md-9">
				<p>
					<?php echo isset($customerSelected) ? $customerSelected['address'] : ''?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<p class="text-right"><strong>โทรศัพท์</strong></p>
			</div>
			<div class="col-md-9">
				<p>
					<?php echo isset($customerSelected) ? $customerSelected['tel'] : ''?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<p class="text-right"><strong>Email</strong></p>
			</div>
			<div class="col-md-9">
				<p>
					<?php echo isset($customerSelected) ? $customerSelected['email'] : ''?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<p class="text-right"><strong>ติดต่อ</strong></p>
			</div>
			<div class="col-md-9">
				<p>
					<?php echo isset($customerSelected) ? $customerSelected['address'] : ''?>
				</p>
			</div>
		</div>
	</div>
</div>