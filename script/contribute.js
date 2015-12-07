$(document)
		.ready(
				function() {
					
					$(".receive-contribute-selected").click(function() {
						var $this = $(this);
						
						var ref = $this.attr("ref");
						var href = "#" + ref;
						// $this will contain a reference to the checkbox
						if ($this.filter(':checked').val() == '1') {
							
							$(href).collapse('show');
							$(href).find(".receive-information").each(function() {
								$( this ).attr("required", true);
							});
						} else {
							$(href).collapse('hide');
							$(".receive-information").val("");
						}
					});
					
				}
		);