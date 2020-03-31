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


                <form action="<?php echo base_url("admin/ticket/$message->id"); ?>" method="post">
                    <div class="form-group">
                        <label for="pageDescription">Mesaj Gönder</label>
                        <textarea name="message" id="message" rows="10" cols="80">
                        </textarea>
					</div>
					
                    <button type="submit" class="btn btn-primary btn-md">Gönder</button>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<?php else: ?>
Kayıt bulunamadı :(
<?php endif; ?>
