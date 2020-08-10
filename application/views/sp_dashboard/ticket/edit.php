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
                    <div class="dropdown-header">Ticket:</div>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) ."/create")?>">Ticket Ekle</a>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2))?>">Ticket Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <?php if(isset($message)): ?> 
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-b-lg">
                        <?php echo "<b>$message->title</b> - ticket'ı"; ?>
                    </h4>
                    <hr>
                </div><!-- END column -->
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="form-group">
                                <label>Konu: </label>
                                <?php echo $message->title; ?>
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <?php echo $message->message; ?>
                            </div>
                                    <div class="form-group">
                                        <label>Gönderim Tarihi</label>
                                        <?php echo $message->created_at; ?>
                                    </div>
                            <hr>
                            
                            <?php if(isset($message_chat)){ ?> 
                                <?php  foreach ($message_chat as $chat) { ?>
                                    <div class="form-group">
                                        <label>Gönderen Kişi: </label>
                                        <?php echo $chat->user_id; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mesaj</label>
                                        <?php echo $chat->message; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Gönderim Tarihi</label>
                                        <?php echo $chat->created_at; ?>
                                    </div>
                                    <hr>
                                <?php } ?>
                            <?php } ?>


                            <form action="<?php echo base_url( $this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $message->id); ?>" method="post">
                                <div class="form-group">
                                    <label for="pageDescription">Mesaj Gönder</label>
                                    <textarea name="message" id="message" rows="10" cols="80">
                                    </textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-md">Gönder</button>
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
            <?php else: ?>
            Kayıt bulunamadı :(
            <?php endif; ?>

        </div><!-- .widget -->
	</div>
</div>
