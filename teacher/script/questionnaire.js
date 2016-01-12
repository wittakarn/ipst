$(document)
		.ready(
				function() {
						var questionForm = $( "#questionForm" );
						var cValidator = questionForm.validate({
							groups: {
								"subject-group": "c_s c_m c_t c_d",
								"s-degree": "c_s_1 c_s_2 c_s_3 c_s_4 c_s_5 c_s_6 c_s_7 c_s_8 c_s_9 c_s_10 c_s_11 c_s_12",
								"m-degree": "c_m_1 c_m_2 c_m_3 c_m_4 c_m_5 c_m_6 c_m_7 c_m_8 c_m_9 c_m_10 c_m_11 c_m_12",
								"t-degree": "c_t_1 c_t_2 c_t_3 c_t_4 c_t_5 c_t_6 c_t_7 c_t_8 c_t_9 c_t_10 c_t_11 c_t_12",
								"d-degree": "c_d_1 c_d_2 c_d_3 c_d_4 c_d_5 c_d_6 c_d_7 c_d_8 c_d_9 c_d_10 c_d_11 c_d_12",
								"school-under-group": "c_school_under_1 c_school_under_2 c_school_under_3 c_school_under_4 c_school_under_5 c_school_under_6 c_school_under_7 c_school_under_8",
								"book-satisfy-group": "c_satisfy_group_1 c_satisfy_group_2 c_satisfy_group_3 c_satisfy_group_4 c_satisfy_group_5"
							},
							rules: {
								c_s: {
									require_from_group: [1, ".subject-group"]
								},
								c_s_1: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_2: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_3: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_4: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_5: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_6: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_7: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_8: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_9: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_10: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_11: {
									require_from_group: [1, ".s-degree"]
								},
								c_s_12: {
									require_from_group: [1, ".s-degree"]
								},
								c_m: {
									require_from_group: [1, ".subject-group"]
								},
								c_m_1: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_2: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_3: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_4: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_5: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_6: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_7: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_8: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_9: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_10: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_11: {
									require_from_group: [1, ".m-degree"]
								},
								c_m_12: {
									require_from_group: [1, ".m-degree"]
								},
								c_t: {
									require_from_group: [1, ".subject-group"]
								},
								c_t_1: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_2: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_3: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_4: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_5: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_6: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_7: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_8: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_9: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_10: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_11: {
									require_from_group: [1, ".t-degree"]
								},
								c_t_12: {
									require_from_group: [1, ".t-degree"]
								},
								c_d: {
									require_from_group: [1, ".subject-group"]
								},
								c_d: {
									require_from_group: [1, ".subject-group"]
								},
								c_d_1: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_2: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_3: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_4: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_5: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_6: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_7: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_8: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_9: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_10: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_11: {
									require_from_group: [1, ".d-degree"]
								},
								c_d_12: {
									require_from_group: [1, ".d-degree"]
								},
								c_school_under_1: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_2: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_3: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_4: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_5: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_6: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_7: {
									require_from_group: [1, ".school-under-group"]
								},
								c_school_under_8: {
									require_from_group: [1, ".school-under-group"]
								},
								c_satisfy_group_1: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_satisfy_group_2: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_satisfy_group_3: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_satisfy_group_4: {
									require_from_group: [1, ".book-satisfy-group"]
								},
								c_satisfy_group_5: {
									require_from_group: [1, ".book-satisfy-group"]
								}
							},
							messages: {
								c_s: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_6: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_7: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_8: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_9: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_10: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_11: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_s_12: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_6: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_7: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_8: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_9: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_10: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_11: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m_12: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_6: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_7: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_8: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_9: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_10: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_11: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t_12: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_6: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_7: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_8: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_9: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_10: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_11: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d_12: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_6: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_7: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_school_under_8: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_satisfy_group_1: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_satisfy_group_2: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_satisfy_group_3: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_satisfy_group_4: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_satisfy_group_5: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								}
							},
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
							disableBookSatisfyGroup();
						});
						
						function isInvalidateForm() {
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
								
								questionForm.attr("action", contextRoot + "crud/create-questionnaire.php");
								questionForm.attr("target", "_self");
								
								questionForm.submit();
								
								$.unblockUI();
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
							$.blockUI();
							
							questionForm.attr("action", contextRoot + "crud/update-questionnaire-status.php?status=i");
							questionForm.attr("target", "_self");
							
							questionForm.submit();
							
							$.unblockUI();
						});
                        
                        $('#enableButton').click(function (e) {
							$.blockUI();
							
							questionForm.attr("action", contextRoot + "crud/update-questionnaire-status.php?status=a");
							questionForm.attr("target", "_self");
							
							questionForm.submit();
							
							$.unblockUI();
						});
				}
		);