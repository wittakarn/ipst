<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>มัธยมศึกษาปีที่ 2</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<!-- 1.หนังสือเรียน เล่ม 1 -->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-8-1">
			<img src="<?php echo ROOT;?>image/s/8/1.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-8-1" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/8/1.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน เล่ม 1</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_1_1" 
							value="1" 
							required 
							ref="mS81SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_1_1" 
							value="2" 
							required 
							ref="mS81SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS81SelectedCollapse">
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
									<input type="radio" name="r_s_8_1_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_1_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_1_2" value="3" required/>
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
								<textarea name="t_s_8_1_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS814" 
										name="f_s_8_1_4" 
										class="form-control"
										target="iframe_fS814"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS814" style="color:red;"></p>
								<a id="link_fS814" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS814" 
										for="fS814" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS814"
										name="h_s_8_1_4"
										value=""/>
								<iframe id="iframe_fS814" 
									name="iframe_fS814" 
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
<!-- 2.หนังสือเรียน เล่ม 2-->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-8-2">
			<img src="<?php echo ROOT;?>image/s/8/2.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-8-2" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/8/2.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน เล่ม 2</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_2_1" 
							value="1" 
							required 
							ref="mS82SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_2_1" 
							value="2" 
							required 
							ref="mS82SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS82SelectedCollapse">
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
									<input type="radio" name="r_s_8_2_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_2_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_2_2" value="3" required/>
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
								<textarea name="t_s_8_2_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS824" 
										name="f_s_8_2_4" 
										class="form-control"
										target="iframe_fS824"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS824" style="color:red;"></p>
								<a id="link_fS824" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS824" 
										for="fS824" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS824"
										name="h_s_8_2_4"
										value=""/>
								<iframe id="iframe_fS824" 
									name="iframe_fS824" 
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

<!-- 3.หนังสือเรียน เชื้อเพลิงเพื่อการคมนาคม-->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-7-3">
			<img src="<?php echo ROOT;?>image/s/7/3.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-7-3" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/7/3.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน เชื้อเพลิงเพื่อการคมนาคม</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_3_1" 
							value="1" 
							required 
							ref="mS83SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_3_1" 
							value="2" 
							required 
							ref="mS83SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS83SelectedCollapse">
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
									<input type="radio" name="r_s_8_3_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_3_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_3_2" value="3" required/>
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
								<textarea name="t_s_8_3_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS834" 
										name="f_s_8_3_4" 
										class="form-control"
										target="iframe_fS834"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS834" style="color:red;"></p>
								<a id="link_fS834" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS834" 
										for="fS834" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS834"
										name="h_s_8_3_4"
										value=""/>
								<iframe id="iframe_fS834" 
									name="iframe_fS834" 
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
<!-- 4.หนังสือเรียน ของเล่นเชิงวิทยาศาสตร์-->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-7-4">
			<img src="<?php echo ROOT;?>image/s/7/4.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-7-4" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/7/4.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน ของเล่นเชิงวิทยาศาสตร์</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_4_1" 
							value="1" 
							required 
							ref="mS84SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_4_1" 
							value="2" 
							required 
							ref="mS84SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS84SelectedCollapse">
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
									<input type="radio" name="r_s_8_4_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_4_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_4_2" value="3" required/>
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
								<textarea name="t_s_8_4_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS844" 
										name="f_s_8_4_4" 
										class="form-control"
										target="iframe_fS844"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS844" style="color:red;"></p>
								<a id="link_fS844" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS844" 
										for="fS844" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS844"
										name="h_s_8_4_4"
										value=""/>
								<iframe id="iframe_fS844" 
									name="iframe_fS844" 
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
<!-- 5.หนังสือเรียน วิทยาศาสตร์กับความงาม-->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-7-5">
			<img src="<?php echo ROOT;?>image/s/7/5.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-7-5" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/7/5.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน วิทยาศาสตร์กับความงาม</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_5_1" 
							value="1" 
							required 
							ref="mS85SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_5_1" 
							value="2" 
							required 
							ref="mS85SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS85SelectedCollapse">
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
									<input type="radio" name="r_s_8_5_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_5_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_5_2" value="3" required/>
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
								<textarea name="t_s_8_5_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS854" 
										name="f_s_8_5_4" 
										class="form-control"
										target="iframe_fS854"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS854" style="color:red;"></p>
								<a id="link_fS854" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS854" 
										for="fS854" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS854"
										name="h_s_8_5_4"
										value=""/>
								<iframe id="iframe_fS854" 
									name="iframe_fS854" 
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
<!-- 6.หนังสือเรียน สนุกกับโครงงานวิทยาศาสตร์-->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-7-6">
			<img src="<?php echo ROOT;?>image/s/7/6.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-7-6" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/7/6.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน สนุกกับโครงงานวิทยาศาสตร์</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_6_1" 
							value="1" 
							required 
							ref="mS86SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_6_1" 
							value="2" 
							required 
							ref="mS86SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS86SelectedCollapse">
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
									<input type="radio" name="r_s_8_6_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_6_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_6_2" value="3" required/>
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
								<textarea name="t_s_8_6_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS864" 
										name="f_s_8_6_4" 
										class="form-control"
										target="iframe_fS864"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS864" style="color:red;"></p>
								<a id="link_fS864" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS864" 
										for="fS864" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS864"
										name="h_s_8_6_4"
										value=""/>
								<iframe id="iframe_fS864" 
									name="iframe_fS864" 
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
<!-- 7.หนังสือเรียน พลังงานทดแทนกับการใช้ประโยชน์ -->
<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".m-s-7-7">
			<img src="<?php echo ROOT;?>image/s/7/7.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-7-7" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT;?>image/s/7/7.jpg" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong>หนังสือเรียน พลังงานทดแทนกับการใช้ประโยชน์</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_7_1" 
							value="1" 
							required 
							ref="mS87SelectedCollapse"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="r_s_8_7_1" 
							value="2" 
							required 
							ref="mS87SelectedCollapse"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="mS87SelectedCollapse">
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
									<input type="radio" name="r_s_8_7_2" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_7_2" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="r_s_8_7_2" value="3" required/>
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
								<textarea name="t_s_8_7_3" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="fS874" 
										name="f_s_8_7_4" 
										class="form-control"
										target="iframe_fS874"/>
							</div>
							<div class="col-md-4">
								<p id="error_fS874" style="color:red;"></p>
								<a id="link_fS874" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_fS874" 
										for="fS874" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_fS814"
										name="h_s_8_7_4"
										value=""/>
								<iframe id="iframe_fS874" 
									name="iframe_fS874" 
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