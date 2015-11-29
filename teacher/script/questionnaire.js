$(document)
		.ready(
				function() {
						
						$(".subject-selected").click(function() {
							var $this = $(this);
							
							var ref = $this.attr("ref");
							var href = "#" + ref;
							// $this will contain a reference to the checkbox  							
							if ($this.is(':checked')) {
								
								$(href).collapse('show');
								$(href).find("input").each(function() {
									$( this ).rules('add', {
										require_from_group: [1, '.degree'],
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
								openInvalidTab();
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
						
						$( "#questionForm" ).validate({
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