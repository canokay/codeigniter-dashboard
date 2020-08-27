<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $card_title;?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Bildirim:</div>
                    <a class="dropdown-item" href="<?php echo create_url()?>">Bildirim Ekle</a>
                    <a class="dropdown-item" href="<?php echo index_url()?>">Bildirim Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">

            <form action="<?php echo edit_url($notification->id); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" >
                <div class="form-group">
                    <label>Başlık</label>
                    <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $notification->title; ?>">
                    <?php if(isset($form_error)){ ?>
                        <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                </div>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="description" id="description" rows="10" cols="80">
                        <?php echo $notification->description; ?>
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                <a href="<?php echo index_url(); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            </form>
			<?php if (isset($form_errors)) { ?>
				<div class="alert alert-danger mt-3" role="alert">
					<?php echo $form_errors?>
				</div>
			<?php } ?>

		</div><!-- .widget -->
	</div>
</div>

