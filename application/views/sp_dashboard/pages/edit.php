<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>

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
                            <form action="<?php echo update_url($item->id); ?>" method="post">
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
                                <a href="<?php echo index_url(); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
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