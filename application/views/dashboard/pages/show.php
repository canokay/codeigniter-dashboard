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
                    <div class="widget">
                        <div class="widget-body">
                            <p>
                                <b> Kalıcı bağlantı: </b> 
                                    <a href="<?php echo base_url($item->url)?>" target="_blank">
                                        <?php echo base_url($item->url)?>
                                    </a>
                            </p>

                            <?php echo $item->description; ?>
                        
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div>
        </div><!-- .widget -->

        <div class="card-footer text-center">
            <a href="<?php echo delete_url($item->id); ?>"
                class="btn btn-danger col-md-5">
                <i class="fa fa-trash"></i>
                    Sil
            </a>
            <a href="<?php echo edit_url($item->id)); ?>" 
                class="btn btn-warning col-md-5">
                <i class="fas fa-pen-square"></i>
                    Düzenle
            </a>
        </div><!-- card-footer -->
	</div>
</div>