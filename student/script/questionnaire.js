$(document)
		.ready(
				function() {
						var questionForm = $("#questionForm");
						var cValidator = questionForm.validate();

						$('.section-tab').click(function (e) {
							var li = $(this).parent();
							var currentIndex = li.index();
							var ul = li.parent();
							$(ul).find(".section-tab").each(function() {
								var a = $(this);
								li = $(this).parent();
								if(li.index() > currentIndex){
									li.addClass("disabled");
									a.removeAttr("data-toggle");
									a.attr("href", "#");
								}
							});
						});
						
						$('.next-tab').click(function (e) {
							if (isInvalidateForm()) {
								focusInvalidComponent();
							}else{
								
								var href = $(this).attr("href");
								e.preventDefault()
								var tab = $('.nav-pills a[ref="' + href + '"]');
								tab.parent().removeClass( "disabled" )
								tab.attr("data-toggle", "pill");
								tab.attr("href", href);
								tab.tab('show');
							}
						});
						
						function isInvalidateForm() {
							questionForm.validate({
								ignore : ""
							});
							return !questionForm.valid();
						}
						
						function focusInvalidComponent() {
							cValidator.focusInvalid();
						}
						
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
						
						$('#submitButton').click(function (e) {
							if (isInvalidateForm()) {
								focusInvalidComponent();
							}else{
								$.blockUI();
								
								questionForm.attr("action", contextRoot + "crud/create-questionnaire.php");
								questionForm.attr("target", "_self");
								
								questionForm.submit();
								
								$.unblockUI();
							}
						});
				}
		);