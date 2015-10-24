<div class="panel panel-primary">
	<div class="panel-heading">รายละเอียดลูกค้า</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<dl class="dl-horizontal">
					<dt>ชื่อ</dt>
					<dd><?php echo isset($customerSelected) ? $customerSelected['customer_name'].'<abbr title="ระดับของลูกค้า" class="text-uppercase">('.$customerSelected['grade'].')</abbr>' : ''?></dd>
					<dt>ที่อยู่</dt>
					<dd><?php echo isset($customerSelected) ? $customerSelected['address'] : ''?></dd>
					<dt>เบอร์โทรศัพท์</dt>
					<dd><?php echo isset($customerSelected) ? $customerSelected['tel'] : ''?></dd>
					<dt>Email</dt>
					<dd><?php echo isset($customerSelected) ? $customerSelected['email'] : ''?></dd>
					<dt>ติดต่อ</dt>
					<dd><?php echo isset($customerSelected) ? $customerSelected['address'] : ''?></dd>
				</dl>
			</div>
		</div>
	</div>
</div>