<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $card_title;?></h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">

			<form action="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3))?>" method="post">
				<div class="form-group">
					<label for="pageName">Kullanıcı Adı</label>
					<input type="text" class="form-control" id="eventUsername" placeholder="Kullanıcı adı" value="<?php echo $user->username ?>" disabled>
				</div>
				<div class="form-group">
					<label for="pageName">İsim</label>
					<input type="text" class="form-control" id="eventFirstName" name="first_name" placeholder="İsim" value="<?php echo $user->first_name ?>">

				</div>
				<div class="form-group">
					<label for="pageName">Soyisim</label>
					<input type="text" class="form-control" id="eventLastName" name="last_name" placeholder="Soyisim" value="<?php echo $user->last_name ?>">

				</div>
				<div class="form-group">
					<label for="pageName">Eposta</label>
					<input type="email" class="form-control" id="eventEmail" name="email" placeholder="Eposta" value="<?php echo $user->email ?>"> 
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