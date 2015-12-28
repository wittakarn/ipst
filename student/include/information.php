<div class="panel panel-primary">
	<div class="panel-heading">ข้อมูลทั่วไปของผู้ตอบแบบสอบถาม</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<strong>1. เพศ</strong>
				<span for="r_sex" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-4">
				<div class="radio">
				  <label>
					<input type="radio" name="r_sex" value="1" required/>
					ชาย
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-4">
				<div class="radio">
				  <label>
					<input type="radio" name="r_sex" value="2" required/>
					หญิง
				  </label>
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>2. ระดับชั้นที่นักเรียนศึกษาในปีการศึกษา 2558</strong>
				<span for="s_degree" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-10">
				<select id="sDegree" class="form-control" name="s_degree" required>
					<option value="">กรุณาระบุ</option>
					<?php
						for($i=1;$i<=6;$i++){
							echo '<option value="'.$i.'">ประถมศึกษาปีที่ '.$i.'</option>';
						}
						for($i=7;$i<=12;$i++){
							echo '<option value="'.$i.'">มัธยมศึกษาปีที่ '.($i - 6).'</option>';
						}
					?>
					<!--option value="1">20-30</option>
					<option value="2">31-40</option>
					<option value="3">41-50</option>
					<option value="4">51-65</option-->
				</select>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>3. โรงเรียน</strong>
				<span for="i_school_name" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<input id="schoolName" type="text" name="i_school_name" class="form-control" required/>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>4. จังหวัดที่ตั้งของโรงเรียน</strong>
				<span for="s_province" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-4 col-xs-10">
				<select id="sProvince" class="form-control" name="s_province" required>
				</select>
			</div>
		</div>
	</div>
	<nav>
		<ul class="pager">
			<li><a class="next-tab" href="#booksSatisfaction">ต่อไป</a></li>
		</ul>
	</nav>
</div>