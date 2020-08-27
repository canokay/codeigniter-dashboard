<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Şifre Değiştir</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">

			<form action="<?php echo update_url("password")?>" method="post">
				<div class="form-group">
					<label for="eventOldPassword">Eski Şifre</label>
					<input type="password" class="form-control" id="eventOldPassword" name="old_password">
				</div>
				<div class="form-group">
					<label for="eventNewPassword">Yeni Şifre</label>
					<input type="password" class="form-control" id="eventNewPassword" name="new_password">
				</div>
				<div class="form-group">
					<label for="eventConfirmNewPassword">Yeni Şifre Onaylama</label>
					<input type="password" class="form-control" id="eventConfirmNewPassword" name="confirm_new_password"> 
				</div>
				<button type="submit" class="btn btn-primary btn-md">Kaydet</button>
			</form>
			<?php if (isset($form_errors)) { ?>
				<div class="alert alert-danger mt-3" role="alert">
					<?php echo $form_errors?>
				</div>
			<?php } ?>
		</div><!-- .widget -->
	</div>
</div>