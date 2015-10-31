<script type="text/javascript">
$(document).ready(function() {
	
});
</script>
<style>
	tfoot tr, tfoot td{
		border: none !important;
		margin: 0 !important;
		padding: 0 !important;
	}
	tfoot p{
		margin: 0 !important;
		padding: 0 !important;
	}
</style>
<div class="alert alert-danger fade in" id="emptyTableError" style="display:none;">
	<p>ไม่พบรายการสินค้าในตาราง กรุณาเพิ่มสินค้า<p>
</div>
<div class="table-responsive">
	<table id="tableQuotationDetail" class="table table-bordered table-hover">
		<thead>
			<tr class="success">
				<th class="col-md-1">#</th>
				<th class="col-md-4">ชื่อสินค้า</th>
				<th class="col-md-1">จำนวน</th>
				<th class="col-md-1">หน่วย</th>
				<th class="col-md-1">ราคา/หน่วย</th>
				<th class="col-md-1">ราคารวม</th>
				<th class="col-md-1">ขึ้น</th>
				<th class="col-md-1">ลง</th>
				<th class="col-md-1">ลบ</th>
			</tr>
		</thead>
		<tfoot>
			<tr class="bg-info">
				<td colspan="4"></td>
				<td class="col-md-2"><p>ยอดรวม</p></td>
				<td class="col-md-2">
					<p class="text-right" id="pTotalPrice"></p>
					<input type="hidden" name="total_price" id="totalPrice"/>
				</td>
				<td colspan="3"></td>
			</tr>
			<tr class="bg-info">
				<td colspan="4"></td>
				<td class="col-md-2"><p>ภาษี</p></td>
				<td class="col-md-2">
					<p class="text-right" id="pVatPrice"></p>
					<input type="hidden" name="vat_price" id="vatPrice"/>
				</td>
				<td colspan="3"></td>
			</tr>
			<tr class="bg-info">
				<td colspan="4"></td>
				<td class="col-md-2"><p>ยอดสุทธิ</p></td>
				<td class="col-md-2">
					<p class="text-right" id="pNetPrice"></p>
					<input type="hidden" name="net_price" id="netPrice"/>
				</td>
				<td colspan="3"></td>
			</tr>
		</tfoot>
		<tbody></tbody>
	</table>
</div>