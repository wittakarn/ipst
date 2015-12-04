$(document)
		.ready(
				function() {
						//alert(contextRoot);
						var cValidator = $( "#questionForm" ).validate({
							groups: {
								"subject-group": "c_s c_m c_t c_d",
								"s-degree": "c_s_1 c_s_2  c_s_3  c_s_4  c_s_5  c_s_6  c_s_7  c_s_8  c_s_9  c_s_10  c_s_11  c_s_12",
								"m-degree": "c_m_1 c_m_2  c_m_3  c_m_4  c_m_5  c_m_6  c_m_7  c_m_8  c_m_9  c_m_10  c_m_11  c_m_12",
								"t-degree": "c_t_1 c_t_2  c_t_3  c_t_4  c_t_5  c_t_6  c_t_7  c_t_8  c_t_9  c_t_10  c_t_11  c_t_12",
								"d-degree": "c_d_1 c_d_2  c_d_3  c_d_4  c_d_5  c_d_6  c_d_7  c_d_8  c_d_9  c_d_10  c_d_11  c_d_12",
								"school-under-group": "c_school_under_1 c_school_under_2 c_school_under_3 c_school_under_4 c_school_under_5 c_school_under_6 c_school_under_7 c_school_under_8",
								"book-satisfy-group": "c_book_satisfy_1 c_book_satisfy_2 c_book_satisfy_3 c_book_satisfy_4 c_book_satisfy_5"
							},
							rules: {
								c_s: {
									require_from_group: [1, ".subject-group"]
								},
								c_m: {
									require_from_group: [1, ".subject-group"]
								},
								c_t: {
									require_from_group: [1, ".subject-group"]
								},
								c_d: {
									require_from_group: [1, ".subject-group"]
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
								c_s: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_m: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_t: {
									require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
								},
								c_d: {
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
						
						$(".subject-selected").click(function() {
							var $this = $(this);
							
							var ref = $this.attr("ref");
							var href = "#" + ref;
							// $this will contain a reference to the checkbox  							
							if ($this.is(':checked')) {
								
								$(href).collapse('show');
								$(href).find("input").each(function() {
									$( this ).rules('add', {
										require_from_group: [1, '.' + $( this ).attr('class')],
										messages: {
											require_from_group: "ข้อมูลต้องเลือกอย่างน้อย {0} ตัวเลือก"
										}
									});
								});
							} else {
								$(href).collapse('hide');
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
								
								var populateBookQuestionnaire = $(this).attr("populateBookQuestionnaire") == "true";
								
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
							$("#questionForm").validate({
								ignore : ""
							});
							return !$("#questionForm").valid();
						}
						
						function focusInvalidComponent() {
							/*
							var tabs = $(".form-control.error:enabled").parents(".tab-pane");
							if (tabs != null && tabs.length >= 1) {
								var invalidTabId = tabs[tabs.length - 1].id;
								$('.nav-pills a[href="#' + invalidTabId + '"]').tab('show');
							}
							*/
							cValidator.focusInvalid();
						}
						
						function loadBookQuestionnair(){
							$("#scienceDegree1").load(contextRoot + "include/science-degree-1.php");
						}
				}
		);