<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>

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