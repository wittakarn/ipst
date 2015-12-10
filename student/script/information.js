$(document)
		.ready(
				function() {
					$.blockUI();
					$("#sProvince").load(contextRoot + "student/include/province-select-data.php", function() {
						$.unblockUI();
					});

					$('#sDegree').change(function (e) {
						$(".book-satisfaction-section").html("");
						loadScienceBookQuestionnair($(this).val());
						loadMathBookQuestionnair($(this).val());
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
				}
		);