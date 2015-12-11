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
						
						$(".s-degree").click(function (e) {
							var scienceDegrees = $(".s-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							
							$(".book-satisfaction-section").html("");
							
							$.each( scienceDegrees, function( i ) {
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								loadScienceBookQuestionnair(degree);
							});
						});
						
						function loadScienceBookQuestionnair(degree){
							var loadPage = contextRoot.concat("include/science-");
							loadPage = loadPage.concat(degree);
							loadPage = loadPage.concat(".php");
							$("#scienceBookSection" + degree).load(loadPage, function() {
								setBookSatisfactionEvent();
							});
						}
				}
		);