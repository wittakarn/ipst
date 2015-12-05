<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>
<div class="row">
	<div class="col-md-2">
		<a href="#" ref=popover class="thumbnail" data-toggle="modal" data-target=".m-s-1-1">
			<img src="<?php echo ROOT;?>image/s/1/1.jpg" class="img-responsive"/>
		</a>
	</div>
	<div class="modal fade m-s-1-1" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" 
							class="close" 
							data-dismiss="modal" 
							aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true">
						</span>
					</button>
					<img src="<?php echo ROOT;?>image/s/1/1.jpg" class="img-responsive"/>
				</div>
			</div>
		</div>
	</div>
</div>