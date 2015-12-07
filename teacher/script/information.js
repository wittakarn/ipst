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
						
				}
		);