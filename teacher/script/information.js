$(document)
		.ready(
				function() {
                        var tempDesignTab;
						var isLoad101112Science;
						var isLoad789ScienceAdditional;
						
						var isLoad101112Math;
						
						var isLoad101112Technology;
						var isLoad789TechnologyAdditional;
						
						var isLoad101112Design;
						var isLoad89Design;
						var isLoadAllDesign;
						
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
							} else {
								$(href).collapse('hide');
							}
							
							removeAllBookTab();
							populateBookTabs();
                            reBindingTabEvent();
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
						
						$(".d-degree").click(function (e) {
							var designDegrees = $(".d-degree").filter(":checked");
							var fieldName;
							var degree;
							var splitArray;
							var splitSize;
							var defs = [];
							var defsIndex = 0;
							
							isLoad101112Design = false;
							isLoad89Design = false;
							isLoadAllDesign = false;
							
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
									
									if((degree == 8 || degree == 9) && !isLoad89Design){
										if(!isLoad89Design){
											defs[defsIndex] = $.Deferred();
											loadDesignQuestionnair("89", defs[defsIndex]);
											isLoad89Design = true;
											defsIndex++;
										}
									}
								}else{
									if(degree > 9 && !isLoad101112Design){
										defs[defsIndex] = $.Deferred();
										loadDesignQuestionnair(degree, defs[defsIndex]);
										isLoad101112Design = true;
										defsIndex++;
									}
								}
								
								if(degree != 1 && degree != 4 && degree != 7 && !isLoadAllDesign){
									defs[defsIndex] = $.Deferred();
									loadDesignQuestionnair("all", defs[defsIndex]);
									isLoadAllDesign = true;
									defsIndex++;
								}
							});
							
                            reRenderDesignBookTabs();
                            
							$.when.apply($,defs).done(function() {reBindingTabEvent();setBookSatisfactionEvent();});
						});
				}
		);