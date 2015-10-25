<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';

if(isset($_REQUEST['MODE'])){
	$screenMode = $_REQUEST['MODE'];
}

?>
<script type="text/javascript">
$(document).keypress(function(event){

	var keycode = (event.keyCode ? event.keyCode : event.which);
	var customerIdSelected = $( "#customerId" ).val();
	
	if(keycode == '13' && customerIdSelected != null || customerIdSelected != ""){
		$("#confiemCompanyButton").click();
	}
	
});

$(document).ready(function() {
	
	$("#confiemCompanyButton").click(
		function() {
			if (!isInvalidateForm()) {                   
				var form = $("#customerForm");
				form.submit();
			}
		}
	);
	
	$( "#customerName" ).autocomplete({
		source: customersSuggestion,
		minLength: 2,                            
		select: customersSelected,
		change: customersSelected
	});
	
	function customersSuggestion(request, response){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.customers.suggestion.php'; ?>",
			dataType: "json",
			data: {
			"customer_name"  : $( "#customerName" ).val()
			},
			success: function( data ) {
				customersResponseSuggestion(response, data);
			}
		});
	}
	
	function customersSelected(event, ui){
		var customerId = "";
		var customerName = "";
		var address = "";
		var tel = "";
		var email = "";
		var contact = "";
		var grade = "";

		var respObj = ui.item;
		if(respObj != null){
			customerId = respObj.customerId;
			customerName = respObj.customerName;
			address = respObj.address;
			tel = respObj.tel;
			email = respObj.email;
			contact = respObj.contact;
			grade = respObj.grade;
		}

		$( "#customerId" ).val(customerId);
		$( "#customerNameSummary" ).html(customerName.concat('<abbr title="ระดับของลูกค้า" class="text-uppercase">(').concat(grade).concat(')</abbr>'));
		$( "#addressSummary" ).html(address);
		$( "#telSummary" ).html(tel);
		$( "#emailSummary" ).html(email);
		$( "#contactSummary" ).html(contact);          
	}
	
	function customersResponseSuggestion(response, data){
		var responseArr = $.map( data, function( item ) {
			return {
				value: item.customer_name,
				customerId: item.customer_id,
				customerName: item.customer_name,
				address: item.address,
				tel: item.tel,
				email: item.email,
				contact: item.contact,
				grade: item.grade
			}
		});
		return response(responseArr);
	}
	
	function isInvalidateForm() {
		$("#customerForm").validate({
			ignore : ""
		});
		return !$("#customerForm").valid();
	}
});
</script>
<div class="container">
  <form id="customerForm" 
		method="post" 
		target="_self"
		action="quotation.php?MODE=S">
    <div class="row">
  		<div class="panel panel-primary">
  			<div class="panel-heading">เลือกลูกค้า</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-2">ชื่อลูกค้า</div>
  					<div class="col-md-6">
  						<input class="form-control" 
  							type="text"
  							id="customerName" 
  							name="customer_name"
							required
							autofocus/>
  					</div>
  				</div>
				<div class="row">
					<div class="col-md-12">
						<br/>
						<div class="well well-sm">
							<div class="row">
								<div class="col-md-12">
									<u>รายละเอียดลูกค้า</u>
									<input type="hidden" name="customer_id" id="customerId" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<dl class="dl-horizontal">
										<dt>ชื่อ</dt>
										<dd id="customerNameSummary"></dd>
										<dt>ที่อยู่</dt>
										<dd id="addressSummary"></dd>
										<dt>เบอร์โทรศัพท์</dt>
										<dd id="telSummary"></dd>
										<dt>Email</dt>
										<dd id="emailSummary"></dd>
										<dt>ติดต่อ</dt>
										<dd id="contactSummary"></dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
  			</div>
  		</div>
  	</div>
    <div class="row">
      <div class="col-md-12">
        <hr/>
      </div>
    </div>
    <div class="row ">
  		<div class="col-md-2">
  			<button type="button" 
					class="btn btn-default"
					id="confiemCompanyButton">
					ตกลง
			</button>
  		</div>
  		<div class="col-md-8"></div>
  		<div class="col-md-2">
			<button type="button" 
  					class="btn btn-default pull-right"
  					id="reloadPage" 
  					onclick="location.reload();">
  					เริ่มใหม่
  			</button>
  		</div>
  	</div>
  </form>
</div>