<div id="recaptcha_widget" class="panel panel-primary">
	<div class="panel-heading">
		<strong>กรุณาระบุข้อความที่เห็นในรูปภาพ</strong>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12" id="recaptcha_image"></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="input-group">
					<input type="text" 
						class="form-control" 
						placeholder="ระบุข้อความที่เห็น"
						id="recaptcha_response_field" 
						name="recaptcha_response_field"
						required/>
					<span class="input-group-btn">
						<a href="javascript:Recaptcha.reload()" class="btn btn-default">
							โหลดภาพใหม่
							<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
						</a>
					</span>
				</div>
			</div>
		</div>
		<nav>
			<ul class="pager">
				<li>
					<button type="button" 
						class="btn btn-success"
						id="submitButton">
						ส่งแบบประเมิน
					</button>
				</li>
			</ul>
		</nav>
	</div>
</div>

<script type="text/javascript"
	src="http://www.google.com/recaptcha/api/challenge?k=6LcTdRITAAAAAAUlDVsOdvuX5CGCw7ja8qPyptiv">
</script>
<noscript>
	<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcTdRITAAAAAAUlDVsOdvuX5CGCw7ja8qPyptiv"
		height="300" width="500" frameborder="0"></iframe><br>
	<textarea name="recaptcha_challenge_field" rows="3" cols="40">
	</textarea>
	<input type="hidden" name="recaptcha_response_field"
		value="manual_challenge">
</noscript>