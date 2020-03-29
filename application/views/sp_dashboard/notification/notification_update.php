<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url(" admin/notification/$notification->id"); ?>" method="post">
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
            <a href="<?php echo base_url("admin/notification "); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
        </form>
    </div>
    <!-- END column -->
</div>
