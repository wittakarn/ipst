<script type="text/javascript">
	$(document)
			.ready(
					function() {
						populateContributeBook(setContributeBookToDropdown);

						function populateContributeBook(callback) {
							var data = {};
							$.ajax({
									type : "POST",
									dataType : "json",
									url : "<?php echo ROOT.'ajax/ajax.search.contributeList.php' ?>", //Relative or absolute path
									data : data,
									success : callback
								});
						}

						function setContributeBookToDropdown(data, textStatus, xhr) {
							$("#contributeSelected").html("");
							for (var i = 0; i < data.length; i++) {
								$("#contributeSelected").append(
										'<option value="' + data[i].id + '">'
												+ data[i].name
												+ '</option>');
							}
						}
						
						$('#exportButton').click(function() {
							var insId = $(this).attr('insId');
							
							var cvsUrl = '<?php echo ROOT; ?>report/contribute-information.php';
							$('#contributeForm').attr('action', cvsUrl);
							$('#contributeForm').attr('target', '_blank');
							$('#contributeForm').submit();
						});
          }
      );
</script>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">ข้อมูลหนังสือ</div>
			<div class="panel-body">
				<form id="contributeForm" method="post">
					<div class="row">
						<div class="col-md-2 col-sm-2">แบบสอบถาม</div>
						<div class="col-md-2 col-sm-3">
							<div class="radio">
							  <label>
								<input type="radio" name="participant_type" value="" autofocus checked/>
								ทั้งหมด
							  </label>
							</div>
						</div>
						<div class="col-md-2 col-sm-3">
							<div class="radio">
							  <label>
								<input type="radio" name="participant_type" value="t"/>
								ครู
							  </label>
							</div>
						</div>
						<div class="col-md-2 col-sm-3">
							<div class="radio">
							  <label>
								<input type="radio" name="participant_type" value="s"/>
								นักเรียน
							  </label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2">รายการหนังสือ</div>
						<div class="col-md-8 col-sm-8">
							<select id="contributeSelected" class="form-control" name="contribute_selected" required>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-6">ตั้งแต่ลำดับที่</div>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<input class="form-control" 
								type="text"
								id="startIndex"
								name="start_index"
								digits="true"/>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-6">ถึงลำดับที่</div>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<input class="form-control" 
								type="text"
								id="count"
								name="count"
								digits="true"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-2">
			<button type="button" 
					class="btn btn-default" 
					id="exportButton">
					ออกรายการ
			</button>
		</div>
		<div class="col-md-7"></div>
		<div class="col-md-3">
			<button type="button" 
					class="btn btn-default pull-right"
					id="reloadPage" 
					onclick="location.reload();">
					เริ่มใหม่
			</button>
		</div>
	</div>
</div>
