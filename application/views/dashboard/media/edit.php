<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>

        <!-- Card Body -->
        <div class="card-body">

				<form action="<?php echo store_url("media-upload")?>" class="dropzone" id="dropForm">
					<div class="dz-message" data-dz-message>
						<span>Yüklemek için dosyaları sürükleyip bırakın </span> <br>
						<span>ya da</span><br>
						<span class="btn btn-primary">Dosya seçin</span>
					</div>
				</form>

		</div><!-- .widget -->
	</div>
</div>