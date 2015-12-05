<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-1-1">
			<img src="<?php echo ROOT;?>image/s/1/1.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-3">
				หนังสือเรียน
			</div>
			<div class="col-md-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_s_1_1_1" value="1" required/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_s_1_1_1" value="2" required/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				ท่านรู้สึกอย่างไร (กรณีได้ใช้)
			</div>
			<div class="col-md-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_s_1_1_2" value="1" required/>
					พึงพอใจ
				  </label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_s_1_1_2" value="2" required/>
					เฉยๆ
				  </label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="radio">
				  <label>
					<input type="radio" name="r_s_1_1_2" value="2" required/>
					ไม่พึงพอใจ
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				ความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง
			</div>
			<div class="col-md-8">
				<textarea name="t_s_1_1_3" class="form-control" rows="2"></textarea>
			</div>
			<div class="col-md-8">
				<input type="file" name="f_s_1_1_4" class="form-control"/>
			</div>
		</div>
	</div>
	<div class="modal fade m-s-1-1" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/1/1.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
</div>
<hr/>