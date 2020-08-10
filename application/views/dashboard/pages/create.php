<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($sub_title);?>

        <!-- Card Body -->
        <div class="card-body">
			<form action="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2))?>" method="post">
				<div class="form-group">
					<label for="pageName">Sayfa Adı</label>
					<input type="text" class="form-control" id="eventName" name="title" placeholder="Sayfa Adı">
				</div>
				<div class="form-group">
					<label for="pageDescription">Sayfa İçeriği</label>
					
					<textarea name="description" id="description" rows="10" cols="80">
					</textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
			</form>
			<?php if (isset($form_errors)) { ?>
				<div class="alert alert-danger mt-3" role="alert">
					<?php echo $form_errors?>
				</div>
			<?php } ?>
		</div><!-- .Card Body -->
	</div>
</div>
