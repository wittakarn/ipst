<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 2</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<!-- 1.หนังสือเรียน -->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-2-1">
			<img src="<?php echo ROOT;?>image/s/2/1.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-2-1" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" 
							class="close" 
							data-dismiss="modal" 
							aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true">
						</span>
					</button>
					<img src="<?php echo ROOT;?>image/s/2/1.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_2_1_1" 
							value="1" 
							required 
							ref="mS21SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_2_1_1" 
							value="2" 
							required 
							ref="mS21SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS21SelectedCollapse">
					<div class="well">
						<div class="row">
							<div class="col-md-12">
								<strong>ท่านรู้สึกอย่างไร (กรณีได้ใช้)</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_1_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_1_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_1_2" value="3" required/>
									ไม่พึงพอใจ
								  </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<strong>ความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<textarea name="t_s_2_1_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS214" 
										name="f_s_2_1_4" 
										class="form-control"
										target="iframe_fS214"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS214" style="color:red;"></p>
								<a id="link_fS214" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS214" 
										for="fS214" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS214"
										name="h_s_2_1_4"
										value=""/>
								<iframe id="iframe_fS214" 
									name="iframe_fS214" 
									src="#" 
									style="width:0;height:0;border:0px solid #fff;">
								</iframe>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr/>
<!-- 2.แบบบันทึกกิจกรรม -->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-2-2">
			<img src="<?php echo ROOT;?>image/s/2/2.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-2-2" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" 
							class="close" 
							data-dismiss="modal" 
							aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true">
						</span>
					</button>
					<img src="<?php echo ROOT;?>image/s/2/2.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>แบบบันทึกกิจกรรม</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_2_2_1" 
							value="1" 
							required 
							ref="mS22SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_2_2_1" 
							value="2" 
							required 
							ref="mS22SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS22SelectedCollapse">
					<div class="well">
						<div class="row">
							<div class="col-md-12">
								<strong>ท่านรู้สึกอย่างไร (กรณีได้ใช้)</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_2_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_2_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_2_2_2" value="3" required/>
									ไม่พึงพอใจ
								  </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<strong>ความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง</strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<textarea name="t_s_2_2_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS224" 
										name="f_s_2_2_4" 
										class="form-control"
										target="iframe_fS224"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS224" style="color:red;"></p>
								<a id="link_fS224" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS224" 
										for="fS224" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS224"
										name="h_s_2_2_4"
										value=""/>
								<iframe id="iframe_fS224" 
									name="iframe_fS224" 
									src="#" 
									style="width:0;height:0;border:0px solid #fff;">
								</iframe>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr/>