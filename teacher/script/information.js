$(document)
		.ready(
				function() {
						$.blockUI();
						initialSection();
						$.unblockUI();
						
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
							var defs = [];
							
							$(".science-book-category").html("");
							
							$.each( scienceDegrees, function( i ) {
								defs[i] = $.Deferred();
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								loadScienceBookQuestionnair(degree, defs[i]);
							});
							
							$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
						});
						
						function loadScienceBookQuestionnair(degree, def){
							var loadPage = contextRoot.concat("include/science-");
							loadPage = loadPage.concat(degree);
							loadPage = loadPage.concat(".php");
							$("#scienceBookSection" + degree).load(loadPage, function() {def.resolve()});
						}
						
						$(".m-degree").click(function (e) {
							var mathDegrees = $(".m-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							var defs = [];
							
							$(".math-book-category").html("");
							
							$.each( mathDegrees, function( i ) {
								defs[i] = $.Deferred();
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								loadMathBookQuestionnair(degree, defs[i]);
							});
							
							$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
						});
						
						function loadMathBookQuestionnair(degree, def){
							var loadPage = contextRoot.concat("include/math-");
							loadPage = loadPage.concat(degree);
							loadPage = loadPage.concat(".php");
							$("#mathBookSection" + degree).load(loadPage, function() {def.resolve()});
						}
						
						$(".t-degree").click(function (e) {
							var technologyDegrees = $(".t-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							var defs = [];
							
							$(".technology-book-category").html("");
							
							$.each( technologyDegrees, function( i ) {
								defs[i] = $.Deferred();
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								loadTechnologyQuestionnair(degree, defs[i]);
							});
							
							$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
						});
						
						function loadTechnologyQuestionnair(degree, def){
							var loadPage = contextRoot.concat("include/technology-");
							loadPage = loadPage.concat(degree);
							loadPage = loadPage.concat(".php");
							$("#technologyBookSection" + degree).load(loadPage, function() {def.resolve()});
						}
						
						$(".d-degree").click(function (e) {
							var designDegrees = $(".d-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							var defs = [];
							
							$(".design-book-category").html("");
							
							$.each( designDegrees, function( i ) {
								defs[i] = $.Deferred();
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								loadDesignQuestionnair(degree, defs[i]);
							});
							
							$.when.apply($,defs).done(function() {setBookSatisfactionEvent();});
						});
						
						function loadDesignQuestionnair(degree, def){
							var loadPage = contextRoot.concat("include/design-");
							loadPage = loadPage.concat(degree);
							loadPage = loadPage.concat(".php");
							$("#designBookSection" + degree).load(loadPage, function() {def.resolve()});
						}
				}
		);