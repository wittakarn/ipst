$(document)
		.ready(
				function() {
					
					$(".book-usage-selected").click(function() {
						var $this = $(this);
						
						var ref = $this.attr("ref");
						var href = "#" + ref;
						// $this will contain a reference to the checkbox
						if ($this.filter(':checked').val() == '1') {
							
							$(href).collapse('show');
						} else {
							$(href).collapse('hide');
						}
					});
					
				}
		);