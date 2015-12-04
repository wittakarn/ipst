$(document)
		.ready(
				function() {
					
					$(".receive-contribute-selected").click(function() {
						var $this = $(this);
						
						var ref = $this.attr("ref");
						var href = "#" + ref;
						// $this will contain a reference to the checkbox  							
						if ($this.is(':checked')) {
							
							$(href).collapse('show');
							$(href).find(".receive-information").each(function() {
								$( this ).attr("required", true);
							});
						} else {
							$(href).collapse('hide');
						}
					});
					
					$('.next-tab').click(function (e) {
						if (isInvalidateForm()) {
							openInvalidTab();
						}else{
							var populateBookQuestionnaire = $(this).attr("populateBookQuestionnaire") == "true";
							alert(populateBookQuestionnaire);
							if(populateBookQuestionnaire){
								loadBookQuestionnair();
							}
						
							var href = $(this).attr("href");
							e.preventDefault()
							var tab = $('.nav-pills a[ref="' + href + '"]');
							tab.parent().removeClass( "disabled" )
							tab.attr("data-toggle", "pill");
							tab.attr("href", href);
							tab.tab('show');
						}
					});
					
					function loadBookQuestionnair(){
						$("#scienceDegree1").load(contextRoot + "include/science-degree-1.php");
					}
					
					function isInvalidateForm() {
						$("#questionForm").validate({
							ignore : ""
						});
						return !$("#questionForm").valid();
					}
					
					function openInvalidTab() {
						var tabs = $(".form-control.error:enabled").parents(".tab-pane");
						if (tabs != null && tabs.length >= 1) {
							var invalidTabId = tabs[tabs.length - 1].id;
							$('.nav-pills a[href="#' + invalidTabId + '"]').tab('show');
						}
					}
				}
		);