<script type="text/javascript">
$(document).ready(function() {
	loadOldQuotation();
	
	function loadOldQuotation(){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.list.old.quotations.php'; ?>",
			dataType: "json",
			data: {
			"customer_id"  : $( "#customerId" ).val()
			},
			success: setOldQuotationsToTable
		});
	}
	
	function setOldQuotationsToTable(data, textStatus, xhr) {
		var dataSize = data.length;
		var tbody = $('#tableOldQuotationDetail').find('tbody');
		tbody.empty();
		for (var i = 0; i < dataSize; i++) {
			tbody
					.append($(
							'<tr style="cursor: pointer;" quot_no="' + data[i]["quot_no"] + '">')
							.append(
									$('<td>')
											.html(
													data[i]["quot_no"]))
							.append(
									$('<td>')
											.html(
													formatThaiDate(data[i]["date"])))
							.append(
									$('<td align="right">')
											.html(
													data[i]["net_price"]))
							.append(
									$('<td align="center">')
											.html('<span class="glyphicon glyphicon-file" aria-hidden="true" style="cursor: zoom-in;" />'))
							);
		}
		setOldQuotationsRowEvent();
		$.unblockUI();
	}
	
	function setOldQuotationsRowEvent() {
		$('#tableOldQuotationDetail tbody > tr').click(function() {
			var customerId = $(this).attr('quot_no');
			// do something
		});
	}
	
	function formatThaiDate(strDate){
		var thaiDate = "";
		
		if(strDate != null && strDate != ""){
			var arrDmy = strDate.split("-");
			if(arrDmy.length == 3){
				var engYear = Number(arrDmy[0]);
				var thaiYear = engYear;
				if(thaiYear < 2400){
					thaiYear = thaiYear + 543;
				}
				thaiDate = arrDmy[2].concat("/").concat(arrDmy[1]).concat("/").concat(thaiYear);
			}
		}
		
		return thaiDate;
	}
});
</script>
<div class="table-responsive">
	<table id="tableOldQuotationDetail" class="table table-bordered table-hover">
		<thead>
			<tr class="success">
				<th>เลขที่</th>
				<th>วันที่</th>
				<th>ราคา</th>
				<th>PDF</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>