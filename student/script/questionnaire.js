$(document)
		.ready(
				function() {
					
						$('.section-tab').click(function (e) {
							var li = $(this).parent();
							var currentIndex = li.index();
							var ul = li.parent();
							
							$(ul).find(".section-tab").each(function() {
								var a = $(this);
								li = $(this).parent();
								if(li.index() > currentIndex){
									li.addClass("disabled");
									a.removeAttr("data-toggle");
									a.attr("href", "#");
								}
							});
						});
						
						$('.next-tab').click(function (e) {
							if (isInvalidateForm()) {
								openInvalidTab();
							}else{
								var href = $(this).attr("href");
								e.preventDefault()
								var tab = $('.nav-pills a[ref="' + href + '"]');
								tab.parent().removeClass( "disabled" )
								tab.attr("data-toggle", "pill");
								tab.attr("href", href);
								tab.tab('show');
							}
						});
						
						function isInvalidateForm() {
							/*
							$("#questionForm").validate({
								ignore : ""
							});
							*/
							return !$("#questionForm").valid();
						}
						
						function openInvalidTab() {
							var tabs = $(".form-control.error:enabled").parents(".tab-pane");
							if (tabs != null && tabs.length >= 1) {
								var invalidTabId = tabs[tabs.length - 1].id;
								$('.nav-pills a[href="#' + invalidTabId + '"]').tab('show');
							}
						}
				}
		);