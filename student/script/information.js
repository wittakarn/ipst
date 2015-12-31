$(document)
		.ready(
				function() {
					$.blockUI();
					$("#sProvince").load(contextRoot + "student/include/province-select-data.php", function() {
						initialSection();
						$.unblockUI();
					});

					$('#sDegree').change(function (e) {
						
						$(".book-satisfaction-section").html("");
						
						var degree = $(this).val();
						var defs = [];
						
						removeAllBookTab();
						populateBookTabs(degree);
						
						defs[0] = $.Deferred();
						defs[1] = $.Deferred();
						defs[2] = $.Deferred();
						defs[3] = $.Deferred();
						
						loadScienceBookQuestionnair(degree, defs[0]);
						loadMathBookQuestionnair(degree, defs[1]);
						loadTechnologyBookQuestionnair(degree, defs[2]);
						loadDesignBookQuestionnair(degree, defs[3]);
						
						if(degree > 6 && degree < 10){
							defs[4] = $.Deferred();
							loadScienceBookQuestionnair("789-additional", defs[4]);
							
							defs[5] = $.Deferred();
							loadTechnologyBookQuestionnair("789-additional", defs[5]);
							
							if(degree > 7 && degree < 10){
								defs[6] = $.Deferred();
								loadDesignBookQuestionnair("89", defs[6]);
							}
						}
						
						if(degree != 1 || degree != 4 || degree != 7){
							defs[7] = $.Deferred();
							loadDesignBookQuestionnair("all", defs[7]);
						}
						
						$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
					});
				}
		);