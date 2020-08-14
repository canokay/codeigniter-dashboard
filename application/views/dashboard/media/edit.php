<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $card_title;?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ortam:</div>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) ."/create")?>">Ortam Ekle</a>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2))?>">Ortam Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">

				<form action="<?php echo base_url($this->uri->segment(1) . "/" . "media-upload")?>" class="dropzone" id="dropForm">
					<div class="dz-message" data-dz-message>
						<span>Yüklemek için dosyaları sürükleyip bırakın </span> <br>
						<span>ya da</span><br>
						<span class="btn btn-primary">Dosya seçin</span>
					</div>
				</form>

		</div><!-- .widget -->
	</div>
</div>