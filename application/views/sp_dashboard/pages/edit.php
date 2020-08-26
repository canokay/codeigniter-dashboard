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
                    <div class="dropdown-header">Sayfa:</div>
                    <a class="dropdown-item" href="<?php echo create_url()?>">Sayfa Ekle</a>
                    <a class="dropdown-item" href="<?php echo index_url()?>">Sayfa Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-b-lg">
                        <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
                    </h4>
                </div><!-- END column -->
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-body">
                            <form action="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $item->id); ?>" method="post">
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                                    <?php if(isset($form_error)){ ?>
                                        <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea name="description" id="description" rows="10" cols="80">
                                    <?php echo $item->description; ?>
                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                                <a href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2)); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                            </form>
                            <?php if (isset($form_errors)) { ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <?php echo $form_errors?>
                                </div>
                            <?php } ?>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div>
        </div><!-- .widget -->
	</div>
</div>