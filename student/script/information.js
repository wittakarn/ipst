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
						}
						
						$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
					});
					
					function loadScienceBookQuestionnair(degree, def){
						var loadPage = contextRoot.concat("include/science-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#scienceBookSection" + degree).load(loadPage, function() {def.resolve()});
					}
					
					function loadMathBookQuestionnair(degree, def){
						var loadPage = contextRoot.concat("include/math-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#mathBookSection" + degree).load(loadPage, function() {def.resolve()});
					}
					
					function loadTechnologyBookQuestionnair(degree, def){
						var loadPage = contextRoot.concat("include/technology-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#technologyBookSection" + degree).load(loadPage, function() {def.resolve()});
					}
					
					function loadDesignBookQuestionnair(degree, def){
						var loadPage = contextRoot.concat("include/design-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#designBookSection" + degree).load(loadPage, function() {def.resolve()});
					}
				}
		);