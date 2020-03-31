<div class="col-md-12">
				<div class="widget">
					<div class="widget-body">
						<form action="<?php echo base_url("admin/ticket/ekle")?>" method="post">
							<div class="form-group">
								<label for="pageName">Mesaj Adı</label>
								<input type="text" class="form-control" id="eventName" name="title" placeholder="Mesaj Adı">
								<?php if(isset($form_error)){ ?>
                            	<small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        		<?php } ?>
							</div>
							<div class="form-group">
								<label for="pageDescription">Mesaj İçeriği</label>
								
							    <textarea name="message" id="message" rows="10" cols="80">
            					</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
