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
						
						removeAllBookTab();
						populateBookTabs(degree);
						
						var defs = genereteDeferredBook(degree);
						
						$.when.apply($,defs).done(function() {reBindingTabEvent();setBookSatisfactionEvent();});
					});
				}
		);