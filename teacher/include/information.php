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
				<strong>2. อายุ</strong>
				<span for="s_age" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-4 col-xs-10">
				<select class="form-control" name="s_age" required>
					<option value="">กรุณาระบุ</option>
					<?php
						for($i=20;$i<=65;$i++){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
					<!--option value="1">20-30</option>
					<option value="2">31-40</option>
					<option value="3">41-50</option>
					<option value="4">51-65</option-->
				</select>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-2">
				<p>ปี</p>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>3. วุฒิการศึกษาสูงสุด</strong>
				<span for="r_degree" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_degree" value="1" required/>
					ต่ำกว่าปริญญาตรี
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_degree" value="2" required/>
					ปริญญาตรี
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_degree" value="3" required/>
					ปริญญาโท
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_degree" value="4" required/>
					ปริญญาเอก
				  </label>
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>4. วิชาและระดับชั้นที่สอนในปีการศึกษา 2558(โปรดระบุทุกระดับชั้นและวิชาที่สอน)</strong>
				<span for="c_s" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
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
					วิทยาศาสตร์พื้นฐาน
				  </label>
				</div>
				<div class="collapse" id="scienceSubjectSelectedCollapse">
					<div class="well">
						<span for="c_s_1" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_1" value="1"/>
									ประถมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_2" value="1"/>
									ประถมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_3" value="1"/>
									ประถมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_4" value="1"/>
									ประถมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_5" value="1"/>
									ประถมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_6" value="1"/>
									ประถมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_7" value="1"/>
									มัธยมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_8" value="1"/>
									มัธยมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_9" value="1"/>
									มัธยมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_10" part="1" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_11" part="1" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree s-degree" type="checkbox" name="c_s_12" part="1" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="subject-selected subject-group" 
							type="checkbox" 
							id="physicSubjectSelected" 
							value="1" 
							name="c_sp"
							ref="physicSubjectSelectedCollapse"
							tabRef="scienceBook"/>
					ฟิสิกส์
				  </label>
				</div>
				<div class="collapse" id="physicSubjectSelectedCollapse">
					<div class="well">
						<span for="c_sp_10" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sp-degree" type="checkbox" name="c_sp_10" part="2" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sp-degree" type="checkbox" name="c_sp_11" part="2" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sp-degree" type="checkbox" name="c_sp_12" part="2" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="subject-selected subject-group" 
							type="checkbox" 
							id="chemistrySubjectSelected" 
							value="1" 
							name="c_sc"
							ref="chemistrySubjectSelectedCollapse"
							tabRef="scienceBook"/>
					เคมี
				  </label>
				</div>
				<div class="collapse" id="chemistrySubjectSelectedCollapse">
					<div class="well">
						<span for="c_sc_10" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sc-degree" type="checkbox" name="c_sc_10" part="3" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sc-degree" type="checkbox" name="c_sc_11" part="3" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sc-degree" type="checkbox" name="c_sc_12" part="3" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="subject-selected subject-group" 
							type="checkbox" 
							id="bioSubjectSelected" 
							value="1" 
							name="c_sb"
							ref="bioSubjectSelectedCollapse"
							tabRef="scienceBook"/>
					ชีววิทยา
				  </label>
				</div>
				<div class="collapse" id="bioSubjectSelectedCollapse">
					<div class="well">
						<span for="c_sb_10" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sb-degree" type="checkbox" name="c_sb_10" part="4" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sb-degree" type="checkbox" name="c_sb_11" part="4" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree sb-degree" type="checkbox" name="c_sb_12" part="4" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="subject-selected subject-group" 
							type="checkbox" 
							id="earthSubjectSelected" 
							value="1" 
							name="c_se"
							ref="earthSubjectSelectedCollapse"
							tabRef="scienceBook"/>
					โลก ดาราศาสตร์ และอวกาศ
				  </label>
				</div>
				<div class="collapse" id="earthSubjectSelectedCollapse">
					<div class="well">
						<span for="c_se_10" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="s-group-degree se-degree" type="checkbox" name="c_se_10" part="5" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree se-degree" type="checkbox" name="c_se_11" part="5" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="s-group-degree se-degree" type="checkbox" name="c_se_12" part="5" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
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
				<div class="collapse" id="mathematicSubjectSelectedCollapse">
					<div class="well">
						<span for="c_m_1" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_1" value="1"/>
									ประถมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_2" value="1"/>
									ประถมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_3" value="1"/>
									ประถมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_4" value="1"/>
									ประถมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_5" value="1"/>
									ประถมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_6" value="1"/>
									ประถมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_7" value="1"/>
									มัธยมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_8" value="1"/>
									มัธยมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_9" value="1"/>
									มัธยมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_10" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_11" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="m-degree" type="checkbox" name="c_m_12" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
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
				<div class="collapse" id="technologySubjectSelectedCollapse">
					<div class="well">
						<span for="c_t_1" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_1" value="1"/>
									ประถมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_2" value="1"/>
									ประถมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_3" value="1"/>
									ประถมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_4" value="1"/>
									ประถมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_5" value="1"/>
									ประถมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_6" value="1"/>
									ประถมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_7" value="1"/>
									มัธยมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_8" value="1"/>
									มัธยมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_9" value="1"/>
									มัธยมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_10" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_11" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="t-degree" type="checkbox" name="c_t_12" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
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
				<div class="collapse" id="designSubjectSelectedCollapse">
					<div class="well">
						<span for="c_d_1" class="glyphicon glyphicon-asterisk"></span>
						<div class="row">
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_1" value="1"/>
									ประถมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_2" value="1"/>
									ประถมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_3" value="1"/>
									ประถมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_4" value="1"/>
									ประถมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_5" value="1"/>
									ประถมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_6" value="1"/>
									ประถมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_7" value="1"/>
									มัธยมศึกษาปีที่ 1
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_8" value="1"/>
									มัธยมศึกษาปีที่ 2
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_9" value="1"/>
									มัธยมศึกษาปีที่ 3
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_10" value="1"/>
									มัธยมศึกษาปีที่ 4
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_11" value="1"/>
									มัธยมศึกษาปีที่ 5
								  </label>
								</div>
								<div class="checkbox">
								  <label>
									<input class="d-degree" type="checkbox" name="c_d_12" value="1"/>
									มัธยมศึกษาปีที่ 6
								  </label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>5. ประสบการณ์ในการสอนรวมทุกวิชาและทุกระดับชั้นปี(ระบุประสบการณ์)</strong>
				<span for="s_experience" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-4 col-xs-10">
				<select class="form-control" name="s_experience" required>
					<option value="">กรุณาระบุ</option>
					<?php
						for($i=0;$i<=40;$i++){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
					?>
					<!--option value="1">0-10</option>
					<option value="2">11-20</option>
					<option value="3">21-30</option>
					<option value="4">31-40</option-->
				</select>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-2">
				ปี
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<strong>6. สังกัดของโรงเรียน</strong>
				<span for="c_school_under_1" class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_1" value="1"/>
					สำนักงานพื้นที่การศึกษาประถมศึกษา(สพป.)
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_3" value="1"/>
					สำนักงานคณะกรรมการส่งเสริมการศึกษาเอกชน(สช.)
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_5" value="1"/>
					สำนักการศึกษา กรุงเทพมหานคร
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_7" value="1"/>
					เทศบาล
				  </label>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_2" value="1"/>
					สำนักงานพื้นที่การศึกษามัธยมศึกษา(สพม.)
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_4" value="1"/>
					สำนักงานคณะกรรมการการอุดมศึกษา(สกอ.)
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input class="school-under-group" type="checkbox" name="c_school_under_6" value="1"/>
					องค์การบริหารส่วนจังหวัด(อบจ.)
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1 col-sm-1">
				<div class="checkbox">
					<label>
						<input class="school-under-group group-other" 
								type="checkbox" 
								name="c_school_under_8" 
								value="1"
								ref="iSchoolUnder8"/>
						อื่นๆ
					</label>
				</div>
			</div>
			<div class="col-md-3 col-sm-5">
				<input id="iSchoolUnder8" type="text" name="i_school_under_8" class="form-control"/>
			</div>
		</div>
	</div>
	<nav>
		<ul class="pager">
			<li><a class="next-tab">ต่อไป</a></li>
		</ul>
	</nav>
</div>