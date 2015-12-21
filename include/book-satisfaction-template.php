<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<a href="#" class="thumbnail" data-toggle="modal" data-target=".<?php echo $modelClass;?>">
			<img src="<?php echo ROOT.$imagePath;?>" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade <?php echo $modelClass;?>" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT.$imagePath;?>" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<div class="col-md-12">
				<strong><?php echo $bookName;?></strong>
				<span class="glyphicon glyphicon-asterisk"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="<?php echo $nameOfComponent[0]; ?>" 
							value="1" 
							required 
							ref="<?php echo $collapseSectionId; ?>"/>
					ได้ใช้
				  </label>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-5">
				<div class="radio">
				  <label>
					<input class="book-usage-selected" 
							type="radio" 
							name="<?php echo $nameOfComponent[0]; ?>" 
							value="2" 
							required 
							ref="<?php echo $collapseSectionId; ?>"/>
					ไม่ได้ใช้
				  </label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="collapse" id="<?php echo $collapseSectionId; ?>">
					<div class="well">
						<div class="row">
							<div class="col-md-12">
								<strong>ท่านรู้สึกอย่างไร (กรณีได้ใช้)</strong>
								<span class="glyphicon glyphicon-asterisk"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="<?php echo $nameOfComponent[1]; ?>" value="1" required/>
									พึงพอใจ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="<?php echo $nameOfComponent[1]; ?>" value="2" required/>
									เฉยๆ
								  </label>
								</div>
							</div>
							<div class="col-md-3 col-sm-4">
								<div class="radio">
								  <label>
									<input type="radio" name="<?php echo $nameOfComponent[1]; ?>" value="3" required/>
									ไม่พึงพอใจ
								  </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<strong>ความคิดเห็นและข้อเสนอแนะเพื่อการปรับปรุง (สามารถแนบไฟล์รูปภาพหรือไฟล์อื่นๆ ขนาดไม่เกิน 1 Mb) </strong>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<textarea name="<?php echo $nameOfComponent[2]; ?>" class="form-control" rows="2"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<input type="file" 
										id="<?php echo $fileUploadId; ?>" 
										name="<?php echo $nameOfComponent[3]; ?>" จะใส
										class="form-control"
										target="iframe_<?php echo $fileUploadId; ?>"/>
							</div>
							<div class="col-md-4">
								<p id="error_<?php echo $fileUploadId; ?>" style="color:red;"></p>
								<a id="link_<?php echo $fileUploadId; ?>" 
									href="#" 
									target="_blank"
									style="display:none;">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
								</a>
								<a class="remove-file" 
										id="remove_<?php echo $fileUploadId; ?>" 
										for="<?php echo $fileUploadId; ?>" 
										style="display:none;">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</a>
								<input type="hidden" 
										id="hidden_<?php echo $fileUploadId; ?>"
										name="<?php echo $nameOfComponent[4]; ?>"
										value=""/>
								<iframe id="iframe_<?php echo $fileUploadId; ?>" 
									name="iframe_<?php echo $fileUploadId; ?>"
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