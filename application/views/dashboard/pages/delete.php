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
                                <b><?php echo $item->title; ?> </b> - kayıdı silinecek. Onaylıyor musunuz?
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div><!-- END column -->
                </div>
        </div><!-- .widget -->

        <div class="card-footer text-center">
        <form action="<?php echo delete_url($item->id); ?>" method="post">
            <button type="submit"  class="btn btn-danger col-md-5">
                <i class="fa fa-trash"></i>
                    Sil
            </button>
            <a href="<?php echo index_url();?>"  
                class="btn btn-dark col-md-5">
                    İptal
            </a>

        </form>
        </div><!-- card-footer -->
	</div>
</div>