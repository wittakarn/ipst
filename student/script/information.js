$(document)
		.ready(
				function() {
					$("#sProvince").load( contextRoot + "student/include/province-select-data.php");

					$('#sDegree').change(function (e) {
						loadBookQuestionnair($(this).val());
					});
					
					function loadBookQuestionnair(degree){
						var loadPage = contextRoot.concat("include/science-");
						loadPage = loadPage.concat(degree);
						loadPage = loadPage.concat(".php");
						
						$(".book-satisfaction-section").html("");
						
						$("#scienceBookSection1").load(loadPage, function() {
							setBookSatisfactionEvent();
						});
					}
				}
		);