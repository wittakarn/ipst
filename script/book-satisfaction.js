function setBookSatisfactionEvent(){
	
	$(".book-usage-selected").click(function() {
		var $this = $(this);
		
		var ref = $this.attr("ref");
		var href = "#" + ref;
		// $this will contain a reference to the checkbox
		if ($this.filter(':checked').val() == '1') {
			
			$(href).collapse('show');
		} else {
			$(href).collapse('hide');
		}
	});
	
	$("input:file").change(function(){
		var filePath = $(this).val();
		if(filePath != null && filePath.length !== 0){
			$.blockUI();
			uploadFile($(this));
		}
	});
	
	
	$(".remove-file").click(
		function() {
			var link = $('#link_' + $(this).attr("for"));
			var hidden = $('#hidden_' + $(this).attr("for"));
			
			link.attr("href", "");
			link.attr("style", "display:none;");
			hidden.val("");
			$(this).attr("style", "display:none;");
		}
	);
		
	function uploadFile(file){
		var form = $("#questionForm");
		var action = contextRoot + "uploader/file-uploader.php";
		action = action.concat("?id=");
		action = action.concat(file.attr('id'));
		action = action.concat("&name=");
		action = action.concat(file.attr('name'));

		form.validate().cancelSubmit = true;
		form.attr('action', action);
		form.attr('target', file.attr('target'));
		form.submit();
	}
}