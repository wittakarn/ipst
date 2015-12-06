$(document)
		.ready(
				function() {
						var questionForm = $( "#questionForm" );
						var cValidator = questionForm.validate({
							groups: {
								"book-satisfy-group": "c_book_satisfy_1 c_book_satisfy_2 c_book_satisfy_3 c_book_satisfy_4 c_book_satisfy_5"
							},
							rules: {
								c_book_satisfy_1: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_book_satisfy_2: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_book_satisfy_3: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_book_satisfy_4: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_book_satisfy_5: {
									require_from_group: [1, ".book-satisfy-group"]
								}
							},
							messages: {
								c_book_satisfy_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_book_satisfy_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_book_satisfy_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_book_satisfy_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_book_satisfy_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								}
							}
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
						
						$(".group-other").change(function() {
							var ref = $(this).attr("ref");
							var href = "#" + ref;					
							if ($(this).is(':checked')) {
								$(href).attr("required", true);
							} else {
								$(href).removeAttr( "required" );
								$(href).val("");
								$(href+"-error").remove();
							}
						});
						
						$(".book-satisfy-group").change(function(){
							if($("input.book-satisfy-group").filter(":checked").length == 3)
								$("input.book-satisfy-group:not(:checked)").attr("disabled", "disabled");
							else
								$("input.book-satisfy-group").removeAttr("disabled");
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
						
						$('#submitButton').click(function (e) {
							if (isInvalidateForm()) {
								focusInvalidComponent();
							}else{
								$.blockUI();
								
								questionForm.attr("action", contextRoot + "teacher/submit-questionnaire.php");
								questionForm.attr("target", "_self");
								
								questionForm.submit();
								
								$.unblockUI();
							}
						});
				}
		);