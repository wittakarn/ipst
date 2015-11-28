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
								i_school_under_8: {
									require_from_group: [1, ".school-under-group"]
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
								i_school_under_8: {
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