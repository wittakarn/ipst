<script type="text/javascript">
	$(document)
			.ready(
					function() {
						
						$("#readButton").click(function() {
							searchUsers(setUsersToTable);
						});

						function searchUsers(callback) {
							$.blockUI();
							var data = {
								"action" : "searchUsers",
								"user_id" : $("#userId").val()
							};
							$.ajax({
								type : "POST",
								dataType : "json",
								url : "<?php echo ROOT ?>ajax/ajax.search.user.php", //Relative or absolute path
								data : data,
								success : callback
							});
						}

						function setUsersToTable(data, textStatus, xhr) {
							var dataSize = data.length;
							var tbody = $('#tableUser').find('tbody');
							tbody.empty();
							for (var i = 0; i < dataSize; i++) {
								
								$roleTitle = "ผู้ดูแลระบบ";
								
								if(data[i]["role"] === 'N'){
									$roleTitle = "ผู้ใช้ทั่วไป";
								}
								
								tbody
										.append($(
												'<tr style="cursor: pointer;" userId="' + data[i]["user_id"] + '">')
												.append($('<td>').html(i + 1))
												.append(
														$('<td>')
																.html(
																		data[i]["user_id"]))
												.append(
														$('<td>')
																.html(
																		$roleTitle))
												.append(
														$('<td align="right">')
																.html(
																		data[i]["password_inc_count"]))
												.append(
														$('<td>')
																.html(
																		data[i]["lasted_login_datetime"]))
												);
							}
							setEvent();
							$.unblockUI();
						}

						function setEvent() {
							$('#tableUser tbody > tr').click(function() {
								var userId = $(this).attr('userId');

								$('#editUserId').val(userId);
								$('#searchUserForm').submit();
							});
						}
          }
      );
</script>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">ค้นหา ผู้ใช้งาน</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">รหัสผู้ใช้</div>
					<div class="col-md-10">
						<input class="form-control" 
							type="text"
							id="userId"
							autofocus/>
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
				ค้นหา</button>
		</div>
		<div class="col-md-7"></div>
		<div class="col-md-3">
			<a class="btn btn-default pull-right" href="register.php?MODE=A">เพิ่มใหม่</a>
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
		<table id="tableUser" class="table table-bordered table-hover">
			<thead>
				<tr class="success">
					<th>#</th>
					<th>รหัสผู้ใช้</th>
					<th>สิทธิ</th>
					<th>จำนวนที่กรอกรหัสผิด</th>
					<th>วันเวลาที่เข้าใช้ระบบครั้งล่าสุด</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<form id="searchUserForm" method="get" target="_self">
		<input type="hidden" id="editUserId" name="user_id"/>
		<input type="hidden" id="screenMode" name="MODE" value="E"/>
	</form>
</div>
