<div class="panel panel-primary">
	<div class="panel-heading">ข้อมูลเพื่อรับสื่อเสริมการเรียนรู้ของ สสวท.(มีจำนวนจำกัด)</div>
	<div class="panel-body">
		<h4><u>คำชี้แจง</u></h4>
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						กรณีท่านไม่ต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. โปรดเลือก <strong>"ไม่ต้องการรับหนังสือ"</strong>
					</li>
					<li>
						กรณีท่านต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. โปรดเลือก <strong>"ต้องการรับหนังสือ"</strong> และกรอกชื่อ, นามสกุล, ที่อยู่และสื่อเสริมการเรียนรู้ของ สสวท. ที่ต้องการ
					</li>
				</ul>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>ท่านต้องการรับสื่อเสริมการเรียนรู้ของ สสวท. หรือไม่</strong>
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
					ต้องการรับหนังสือ
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
					ไม่ต้องการรับหนังสือ
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
						<div class="row">
							<div class="col-md-12">
								<strong>ชื่อ-สกุล</strong>
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
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-8">
								<input type="text" name="i_receiver_postcode" class="form-control receive-information" digits="true"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav>
		<ul class="pager">
			<li><a class="next-tab" href="#bookSelection">ต่อไป</a></li>
		</ul>
	</nav>
</div>