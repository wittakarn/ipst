$(document)
		.ready(
				function() {
						var isLoad101112Science;
						var isLoad789ScienceAdditional;
						
						var isLoad101112Math;
						
						var isLoad101112Technology;
						var isLoad789TechnologyAdditional;
						
						var isLoad101112Design;
						
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
							
							removeAllBookTab();
							populateBookTabs();
						});
						
						$(".s-degree").click(function (e) {
							var scienceDegrees = $(".s-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							var defs = [];
							var defsIndex = 0;
							
							isLoad101112Science = false;
							isLoad789ScienceAdditional = false;
							$(".science-book-category").html("");
							
							$.each( scienceDegrees, function( i ) {
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								
								if(degree <= 9){
									defs[defsIndex] = $.Deferred();
									loadScienceBookQuestionnair(degree, defs[defsIndex]);
									defsIndex++;
									
									//load additional book.
									if(degree > 6 && degree < 10 && !isLoad789ScienceAdditional){
										defs[defsIndex] = $.Deferred();
										loadScienceBookQuestionnair("789-additional", defs[defsIndex]);
										isLoad789ScienceAdditional = true;
										defsIndex++;
									}
								}else{
									if(degree > 9 && !isLoad101112Science){
										defs[defsIndex] = $.Deferred();
										loadScienceBookQuestionnair(degree, defs[defsIndex]);
										isLoad101112Science = true;
										defsIndex++;
									}
								}
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
							var defsIndex = 0;
							
							isLoad101112Math = false;
							
							$(".math-book-category").html("");
							
							$.each( mathDegrees, function( i ) {
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								
								if(degree <= 9){
									defs[defsIndex] = $.Deferred();
									loadMathBookQuestionnair(degree, defs[defsIndex]);
									defsIndex++;
								}else{
									if(degree > 9 && !isLoad101112Math){
										defs[defsIndex] = $.Deferred();
										loadMathBookQuestionnair(degree, defs[defsIndex]);
										isLoad101112Math = true;
										defsIndex++;
									}
								}
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
							var defsIndex = 0;
							
							isLoad101112Technology = false;
							isLoad789TechnologyAdditional = false;
							
							$(".technology-book-category").html("");
							
							$.each( technologyDegrees, function( i ) {
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								
								if(degree <= 9){
									defs[defsIndex] = $.Deferred();
									loadTechnologyQuestionnair(degree, defs[defsIndex]);
									defsIndex++;
									
									//load additional book.
									if(degree > 6 && degree < 10 && !isLoad789TechnologyAdditional){
										defs[defsIndex] = $.Deferred();
										loadTechnologyQuestionnair("789-additional", defs[defsIndex]);
										isLoad789TechnologyAdditional = true;
										defsIndex++;
									}
								}else{
									if(degree > 9 && !isLoad101112Technology){
										defs[defsIndex] = $.Deferred();
										loadTechnologyQuestionnair(degree, defs[defsIndex]);
										isLoad101112Technology = true;
										defsIndex++;
									}
								}
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
							var defsIndex = 0;
							
							isLoad101112Design = false;
							
							$(".design-book-category").html("");
							
							$.each( designDegrees, function( i ) {
								fieldName = $(this).attr("name");
								splitArray = fieldName.split("_");
								splitSize = splitArray.length;
								degree = splitArray[splitSize-1];
								
								if(degree <= 9){
									defs[defsIndex] = $.Deferred();
									loadDesignQuestionnair(degree, defs[defsIndex]);
									defsIndex++;
								}else{
									if(degree > 9 && !isLoad101112Design){
										defs[defsIndex] = $.Deferred();
										loadDesignQuestionnair(degree, defs[defsIndex]);
										isLoad101112Design = true;
										defsIndex++;
									}
								}
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