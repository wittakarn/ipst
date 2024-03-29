$(document)
		.ready(
				function() {
						var questionForm = $("#questionForm");
						var cValidator = questionForm.validate({
																	errorPlacement: function(error, element) {
																		// Append error within linked label
																		$( element )
																			.closest( "form" )
																				.find( "span[for='" + element.attr( "name" ) + "']" )
																					.append( error );
																	},
																	errorElement: "span"
																});
																
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
							$.blockUI();
							
							setTimeout(function() { 
								showNextTab();
								$.unblockUI(); 
							}, 1);
						});
						
						function showNextTab(){
							if (isInvalidateForm()) {
								focusInvalidComponent();
							}else{
								$("html, body").animate({ scrollTop: 0 }, "slow");
								var activeLi = $("li[role='presentation']").filter( ".active" );
								var tab = activeLi.next();
								var aElement = tab.children();
								var href = aElement.attr("ref");
								tab.removeClass( "disabled" );
								aElement.attr("data-toggle", "pill");
								aElement.attr("href", href);
								aElement.tab('show');
							}
						}
						
						function isInvalidateForm() {
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
                                $(href).find("input:radio").prop("checked", false);
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
						
						$('#updateButton').click(function (e) {
							if (isInvalidateForm()) {
								focusInvalidComponent();
							}else{
								$.blockUI();
								
								questionForm.attr("action", contextRoot + "crud/update-questionnaire.php");
								questionForm.attr("target", "_self");
								
								questionForm.submit();
								
								$.unblockUI();
							}
						});
						
						$('#disableButton').click(function (e) {
                            questionForm.validate().cancelSubmit = true;
                        
							$.blockUI();
							
							questionForm.attr("action", contextRoot + "crud/update-questionnaire-status.php?status=i");
							questionForm.attr("target", "_self");
							
							questionForm.submit();
							
							$.unblockUI();
						});
                        
                        $('#enableButton').click(function (e) {
                            questionForm.validate().cancelSubmit = true;
                                
							$.blockUI();
							
							questionForm.attr("action", contextRoot + "crud/update-questionnaire-status.php?status=a");
							questionForm.attr("target", "_self");
							
							questionForm.submit();
							
							$.unblockUI();
						});
				}
		);