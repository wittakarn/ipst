<div class="panel panel-primary">
	<div class="panel-heading">ข้อมูลเพื่อรับสื่อเสริมการเรียนรู้ของ สสวท.(มีจำนวนจำกัด)</div>
	<div class="panel-body">
		<h4><u>คำชี้แจง</u></h4>
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						กรณีท่านไม่ต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. โปรดเลือก <strong>"ไม่ต้องการ"</strong>
					</li>
					<li>
						กรณีท่านต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. โปรดเลือก <strong>"ต้องการ"</strong> และกรอกชื่อ, นามสกุล, ที่อยู่และสื่อเสริมการเรียนรู้ของ สสวท. ที่ต้องการ
					</li>
				</ul>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>ท่านต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. หรือไม่ </strong>
				<span for="r_receive_contribute_book" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-4 col-sm-5">
				<div class="radio">
				  <label>
					<input class="receive-contribute-selected" 
							type="radio" 
							name="r_receive_contribute_book" 
							value="1"
							ref="receiveBookSelectedCollapse"					
							required/>
					ต้องการ
				  </label>
				</div>
			</div>
			<div class="col-md-4 col-sm-5">
				<div class="radio">
				  <label>
					<input class="receive-contribute-selected" 
							type="radio" 
							name="r_receive_contribute_book" 
							value="2" 
							ref="receiveBookSelectedCollapse"
							required/>
					ไม่ต้องการ
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="collapse" id="receiveBookSelectedCollapse">
					<div class="well">
						<div class="row">
							<div class="col-md-12">
								<strong>โปรดระบุชื่อที่อยู่ในการจัดส่ง</strong>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<strong>ชื่อ-สกุล</strong>
								<span for="i_receiver_fullname" class="glyphicon glyphicon-asterisk"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<input type="text" name="i_receiver_fullname" class="form-control receive-information"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<strong>ที่อยู่</strong>
								<span for="t_receiver_address" class="glyphicon glyphicon-asterisk"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<textarea name="t_receiver_address" class="form-control receive-information" rows="3"></textarea>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<strong>รหัสไปรษณีย์</strong>
								<span  for="i_receiver_postcode" class="glyphicon glyphicon-asterisk"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-8">
								<input type="text" name="i_receiver_postcode" class="form-control receive-information" digits="true"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<strong>สื่อเสริมการเรียนรู้ของ สสวท. ที่ต้องการ</strong>
								<span for="r_contribute_book_category_selected" class="glyphicon glyphicon-asterisk"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="1"
											class="radio-contribute-book"
											ptype="<?php echo (isset($_REQUEST['type'])) ? $_GET('type') : '' ?>"
											required>
									ประถมศึกษา วิชาวิทยาศาสตร์
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="2"
											class="radio-contribute-book"
											ptype="<?php echo (isset($_REQUEST['type'])) ? $_GET('type') : '' ?>"
											required>
									ประถมศึกษา วิชาคณิตศาสตร์
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="3"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนต้น วิชาคณิตศาสตร์
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="4"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนปลาย วิชาฟิสิกส์
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="5"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนปลาย วิชาเคมี
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="6"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนปลาย วิชาชีววิทยา
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="7"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนปลาย วิชาโลก ดาราศาสตร์ และอวกาศ
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" 
											name="r_contribute_book_category_selected" 
											value="8"
											class="radio-contribute-book"
											required>
									มัธยมศึกษาตอนปลาย วิชาคณิตศาสตร์
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="collapse" id="contributeBookSelectedCollapse">
					<div class="well">
						<div class="row">
							<div id="contributeBookSelectedSection" class="col-md-12 col-sm-12 col-xs-12">		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav>
		<ul class="pager">
			<li>
				<?php
					if($isEditMode){
						echo '<button type="button" 
									class="btn btn-primary"
									id="updateButton">
									ปรับปรุงแบบประเมิน
								</button>';
					}else{
						echo '<button type="button" 
									class="btn btn-success"
									id="submitButton">
									ส่งแบบประเมิน
								</button>';
					}
				?>
			</li>
		</ul>
	</nav>
</div>