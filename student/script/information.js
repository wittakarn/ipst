$(document)
		.ready(
				function() {
					var informationForm = $("#informationForm");
					var cValidator = informationForm.validate();
					
					$("#sProvince").load( contextRoot + "student/include/province-select-data.php");
					
					function isInvalidateForm() {
						informationForm.validate({
							ignore : ""
						});
						return !informationForm.valid();
					}
					
					function focusInvalidComponent() {
						cValidator.focusInvalid();
					}
					
					$('#startQuestionnaire').click(function (e) {
						if (isInvalidateForm()) {
							focusInvalidComponent();
						}else{
							$.blockUI();
							informationForm.submit();
							$.unblockUI();
						}
					});
					
				}
		);