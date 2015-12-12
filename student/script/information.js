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
						loadScienceBookQuestionnair($(this).val());
						loadMathBookQuestionnair($(this).val());
						loadTechnologyBookQuestionnair($(this).val());
						loadDesignBookQuestionnair($(this).val());
					});
					
					function loadScienceBookQuestionnair(degree){
						var loadPage = contextRoot.concat("include/science-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#scienceBookSection" + degree).load(loadPage, function() {
							setBookSatisfactionEvent();
						});
					}
					
					function loadMathBookQuestionnair(degree){
						var loadPage = contextRoot.concat("include/math-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#mathBookSection" + degree).load(loadPage, function() {
							setBookSatisfactionEvent();
						});
					}
					
					function loadTechnologyBookQuestionnair(degree){
						var loadPage = contextRoot.concat("include/technology-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#technologyBookSection" + degree).load(loadPage, function() {
							setBookSatisfactionEvent();
						});
					}
					
					function loadDesignBookQuestionnair(degree){
						var loadPage = contextRoot.concat("include/design-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$("#designBookSection" + degree).load(loadPage, function() {
							setBookSatisfactionEvent();
						});
					}
				}
		);