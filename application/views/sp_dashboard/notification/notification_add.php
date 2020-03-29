<div class="col-md-12">
				<div class="widget">
					<div class="widget-body">
						<form action="<?php echo base_url("sp-admin/notification/ekle")?>" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" >
							<div class="form-group">
								<div class="row">
									<hr>
									<div class="col-sm-12">
										<input type="text" class="form-control" id="notificationTitle" name="title" placeholder="Bildirim Adı">
										<?php if(isset($form_error)){ ?>
										<small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="notificationDescription">Bildirim Açıklaması</label>
							    <textarea name="description" id="description" rows="10" cols="80">
            					</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
