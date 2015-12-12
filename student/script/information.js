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
						var scienceDef = $.Deferred();
						var mathDef = $.Deferred();
						var technologyDef = $.Deferred();
						var designDef = $.Deferred();
						
						loadScienceBookQuestionnair($(this).val(), scienceDef);
						loadMathBookQuestionnair($(this).val(), mathDef);
						loadTechnologyBookQuestionnair($(this).val(), technologyDef);
						loadDesignBookQuestionnair($(this).val(), designDef);
						$.when(
							scienceDef, mathDef, technologyDef, designDef
						)
						.done(function() {setBookSatisfactionEvent();});
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