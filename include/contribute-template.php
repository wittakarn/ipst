<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-5">
		<div class="radio">
		  <label>
			<input type="radio" 
					name="r_contribute_book_selected" 
					value="<?php echo $radioValue; ?>"
					required/>
		  </label>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-7">
		<div class="row">
			<?php echo $bookName;?>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-8">
				<a href="#" class="thumbnail" data-toggle="modal" data-target=".<?php echo $modelClass;?>">
					<img src="<?php echo ROOT.$imagePath;?>" class="img-responsive"/>
				</a>
			</div>
		</div>
	</div>
	<div class="modal fade <?php echo $modelClass;?>" tabindex="-1" role="dialog">
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
					<img src="<?php echo ROOT.$imagePath;?>" class="img-responsive center-block"/>
				</div>
			</div>
		</div>
	</div>
</div>