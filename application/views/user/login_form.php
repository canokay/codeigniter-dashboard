<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

	<div class="card o-hidden border-0 shadow-lg my-5">
	  <div class="card-body p-0">
		<!-- Nested Row within Card Body -->
		<div class="row">
		  <div class="col-lg-12">
			<div class="p-5">
			  <div class="text-center">
				<h1 class="h4 text-gray-900 mb-4">Login</h1>
			  </div>
    		<form class="user" action="<?php echo base_url("/login")?>" method="post">
				<div class="form-group">
				<input type="text" name="input_username" class="form-control form-control-user" id="inputEmail" aria-describedby="emailHelp" placeholder="Eposta">
				</div>
				<div class="form-group">
				<input type="password" name="input_password" class="form-control form-control-user" id="inputPassword" placeholder="Şifre">
				</div>
            	<button type="submit" name="submit"  class="btn btn-primary btn-user btn-block">Giriş Yap</button>
			  </form>
    		<?php echo @$form_error;?>
			  <hr>
			  <div class="text-center">
				<a class="small" href="<?php echo base_url("forgot_password")?>">Şifremi Unuttum?</a>
			  </div>
			  <div class="text-center">
				<a class="small" href="<?php echo base_url("register")?>">Hesap Oluşturun!</a>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

  </div>

</div>

</div>
