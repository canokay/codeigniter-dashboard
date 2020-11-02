<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>

        <!-- Card Body -->
        <div class="card-body">

			<form action="<?php echo store_url()?>" method="post">
				<div class="form-group">
					<label for="pageName">Mesaj Adı</label>
					<input type="text" class="form-control" id="eventName" name="title" placeholder="Mesaj Adı">
					<?php if(isset($form_error)){ ?>
					<small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="pageDescription">Mesaj İçeriği</label>
					
					<textarea name="message" id="message" rows="10" cols="80">
					</textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
			</form>
			<?php if (isset($form_errors)) { ?>
				<div class="alert alert-danger mt-3" role="alert">
					<?php echo $form_errors?>
				</div>
			<?php } ?>

		</div><!-- .widget -->
	</div>
</div>
