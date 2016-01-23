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
						
						var defCount = 0;
						
						defs[defCount] = $.Deferred();
						loadScienceBookQuestionnair(degree, defs[defCount]);
						defCount++;
						
						defs[defCount] = $.Deferred();
						loadMathBookQuestionnair(degree, defs[defCount]);
						defCount++;
						defs[defCount] = $.Deferred();
						loadTechnologyBookQuestionnair(degree, defs[defCount]);
						defCount++;
						
						defs[defCount] = $.Deferred();
						loadDesignBookQuestionnair(degree, defs[defCount]);
						defCount++;
						
						if(degree > 6 && degree < 10){
							defs[defCount] = $.Deferred();
							loadScienceBookQuestionnair("789-additional", defs[defCount]);
							defCount++;
							
							defs[defCount] = $.Deferred();
							loadTechnologyBookQuestionnair("789-additional", defs[defCount]);
							defCount++
							
							if(degree > 7 && degree < 10){
								defs[defCount] = $.Deferred();
								loadDesignBookQuestionnair("89", defs[defCount]);
								defCount++;
							}
						}
						
						if(degree > 9){
							defs[defCount] = $.Deferred();
							loadScienceBookExtraQuestionnair(degree, defs[defCount]);
							defCount++;
						}
						
						if(degree != 1 || degree != 4 || degree != 7){
							defs[defCount] = $.Deferred();
							loadDesignBookQuestionnair("all", defs[defCount]);
						}
						
						$.when.apply($,defs).done(function() {reBindingTabEvent();setBookSatisfactionEvent();});
					});
				}
		);