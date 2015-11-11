<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';

if(isset($_REQUEST['MODE'])){
	$screenMode = $_REQUEST['MODE'];
}

if(isset($_REQUEST['customer_id'])){
	$conn = DataBaseConnection::createConnect();
	$customerSelected =  Customer::get($conn, $_REQUEST['customer_id']);
	$conn = null;
}
?>
<script type="text/javascript">
$(document).ready(function() {
	$("#createButton")
	.click(
		function() {
			var rows = $('#tableQuotationDetail').find('tbody').children();

			if(rows.length > 0){
				$.blockUI();
				var form = $("#saleQuoteForm");
				var action = "<?php echo ROOT."crud/create-quotation.php" ?>";
						
				form.validate().cancelSubmit = true;
				form.attr('action', action);
				form.attr('target', '_self');
				form.submit();
			}else{
				$('#emptyTableError').show();
			}
		}
	);
	
	$("#updateButton")
	.click(
		function() {
			var rows = $('#tableQuotationDetail').find('tbody').children();

			if(rows.length > 0){
				$.blockUI();
				var form = $("#saleQuoteForm");
				var action = "<?php echo ROOT."crud/update-quotation.php" ?>";
						
				form.validate().cancelSubmit = true;
				form.attr('action', action);
				form.attr('target', '_self');
				form.submit();
			}else{
				$('#emptyTableError').show();
			}
		}
	);
});
</script>
<div class="container-fluid">
<br/>
<br/>
  <form id="saleQuoteForm" method="post" >
    <div class="row">
		<div class="col-md-7">
			<?php include(DOCUMENT_ROOT."/include/quotation-detail-p.php"); ?>
		</div>
		<div class="col-md-5">
			<?php include(DOCUMENT_ROOT."/include/quotation-detail-c.php"); ?>
		</div>
  	</div>
	<div class="row">
		<div class="col-md-9">
			<?php include(DOCUMENT_ROOT."/include/quotation-detail-t.php"); ?>
		</div>
		<div class="col-md-3">
			<?php include(DOCUMENT_ROOT."/include/quotation-detail-o.php"); ?>
		</div>
  	</div>
    <div class="row">
      <div class="col-md-12">
        <hr/>
      </div>
    </div>
    <div class="row">
  		<div class="col-md-2">
			<button type="button" 
					class="btn btn-default cancel"
					id="createButton">
					บักทึก
			</button>
			<button type="button" 
					class="btn btn-default"
					id="updateButton"
					style="display: none;">
					แก้ไข
			</button>
  		</div>
  		<div class="col-md-7"></div>
  		<div class="col-md-3">
			<?php
				if($screenMode === 'E') {
						echo '<button type="button" 
										class="btn btn-default" 
										data-toggle="modal" 
										data-target="#confirmDeleteModel">
										ลบ
								</button>';
				}
			?>
			<a class="btn btn-default pull-right" href="quotation.php?MODE=C">ย้อนกลับ</a>
			<button type="button" 
  					class="btn btn-default pull-right"
  					id="reloadPage" 
  					onclick="location.reload();">
  					เริ่มใหม่
  			</button>
  		</div>
  	</div>
	<input type="hidden" id="customerId" name="customer_id" value="<?php echo isset($customerSelected) ? $customerSelected['customer_id'] : ''?>"/>
  </form>
</div>
<div class="modal fade" id="confirmDeleteModel" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">ท่านแน่ใจว่าต้องการลบข้อมูลนี้</h4>
		</div>
		<div class="modal-body">
			<button type="button" 
				class="btn btn-primary"
				id="deleteButton">
				ยืนยัน
			</button>
			<button type="button" 
				class="btn btn-primary pull-right"
				id="deleteButton"
				onclick="$('#confirmDeleteModel').modal('hide')">
				ยกเลิก
			</button>
		</div>
    </div>
  </div>
</div>
