<script type="text/javascript">
	$(document)
			.ready(
					function() {
						$.datepicker.setDefaults($.datepicker.regional['th']);
						$(".datepicker").datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat : 'dd/mm/yy'
						});
						
						$("#readButton").click(function() {
							searchParticipants(setParticipantToTable);
						});

						function searchParticipants(callback) {
							$.blockUI();
							var data = {
								"action" : "searchParticipants",
								"participant_type" : $("input[name=participant_type]:checked").val(),
								"start_index" : $("#startIndex").val(),
								"count" : $("#count").val(),
								"start_date" : $("#startDate").val(),
								"end_date" : $("#endDate").val(),
								"status" : $("input[name=status]:checked").val(),
							};
							$.ajax({
								type : "POST",
								dataType : "json",
								url : "<?php echo ROOT ?>ajax/ajax.search.participant.php", //Relative or absolute path
								data : data,
								success : callback
							});
						}

						function setParticipantToTable(data, textStatus, xhr) {
							var dataSize = data.length;
							var tbody = $('#tableParticipant').find('tbody');
							var type;
							var sex;
							var status;
							tbody.empty();
							for (var i = 0; i < dataSize; i++) {
								
								if(data[i]["type"] == "t"){
									type = "ครู";
								}else{
									type = "นักเรียน";
								}
								
								if(data[i]["r_sex"] == "1"){
									sex = "ชาย";
								}else{
									sex = "หญิง";
								}
								
								if(data[i]["status"] == "a"){
									status = "ใช้งาน";
								}else{
									status = "ไม่ใช้งาน";
								}
								
								tbody
										.append($(
												'<tr style="cursor: pointer;" id="' + data[i]["id"] + '">')
												.append($('<td>').html(i + 1))
												.append(
														$('<td>')
																.html(type))
												.append(
														$('<td>')
																.html(sex))
												.append(
														$('<td>')
																.html(data[i]["create_date"]))
												.append(
														$('<td>')
																.html(status))
												);
							}
							setEvent();
							$.unblockUI();
						}

						function setEvent() {
							$('#tableParticipant tbody > tr').click(function() {
								var id = $(this).attr('id');

								$('#editId').val(id);
								$('#searchParticipantForm').submit();
							});
						}
          }
      );
</script>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">ข้อมูลแบบสอบถาม</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-6">แบบสอบถาม</div>
					<div class="col-md-2 col-sm-4">
						<div class="radio">
						  <label>
							<input type="radio" name="participant_type" value="t"/>
							ครู
						  </label>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="radio">
						  <label>
							<input type="radio" name="participant_type" value="s"/>
							นักเรียน
						  </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-6">สถานะ</div>
					<div class="col-md-2 col-sm-4">
						<div class="radio">
						  <label>
							<input type="radio" name="status" value="a"/>
							ใช้งาน
						  </label>
						</div>
					</div>
					<div class="col-md-2 col-sm-4">
						<div class="radio">
						  <label>
							<input type="radio" name="status" value="i"/>
							ไม่ใช้งาน
						  </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-6">ตั้งแต่วันที่</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<input class="form-control datepicker" 
							type="text"
							id="startDate"/>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6">ถึงวันที่</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<input class="form-control datepicker" 
							type="text"
							id="endDate"/>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-6">ตั้งแต่ลำดับที่</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<input class="form-control" 
							type="text"
							id="startIndex"
							digits="true"
							autofocus/>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-6">จำนวน</div>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<input class="form-control" 
							type="text"
							id="count"
							digits="true"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-2">
			<button type="button" 
					class="btn btn-default" 
					id="readButton">
				ค้นหา
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
	<div class="row">
	  <div class="col-md-12">
		<hr/>
	  </div>
	</div>
	<div class="table-responsive">
		<table id="tableParticipant" class="table table-bordered table-hover">
			<thead>
				<tr class="success">
					<th>ลำดับ</th>
					<th>ผู้ตอบแบบสอบถาม</th>
					<th>เพศ</th>
					<th>วันที่ส่งแบบสอบถาม</th>
					<th>สถานะ</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<form id="searchParticipantForm" method="get" target="_self">
		<input type="hidden" id="editId" name="id"/>
		<input type="hidden" id="screenMode" name="MODE" value="E"/>
	</form>
</div>
