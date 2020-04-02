<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $sub_title;?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Sayfa:</div>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/ekle")?>">Sayfa Ekle</a>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2))?>">Sayfa Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">

			<form action="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/ekle")?>" method="post">
				<div class="form-group">
					<label for="pageName">Sayfa Adı</label>
					<input type="text" class="form-control" id="eventName" name="title" placeholder="Sayfa Adı">
					<?php if(isset($form_error)){ ?>
					<small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="pageDescription">Sayfa İçeriği</label>
					
					<textarea name="description" id="description" rows="10" cols="80">
					</textarea>
				</div>
				<div class="form-group">
					<?php
						echo json_encode($form_error);
					?>
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
