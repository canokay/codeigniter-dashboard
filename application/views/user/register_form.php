
  <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
	<!-- Nested Row within Card Body -->
	<div class="row">
	  <div class="col-lg-12">
		<div class="p-5">
		  <div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Hesap Oluşturun!</h1>
		  </div>
		  <form action="<?php echo base_url("/register")?>" class="user" method="post">
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="user_first_name" class="form-control form-control-user" id="exampleFirstName" placeholder="Ad">
			  </div>
			  <div class="col-sm-6">
				<input type="text" name="user_last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Soyad">
			  </div>
			</div>
			<div class="form-group">
				<input type="text" name="user_username" class="form-control form-control-user" id="exampleUsername" placeholder="Kullanıcı Adı">
			</div>
			<div class="form-group">
			  <input type="email" name="user_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Eposta Adresi">
			</div>
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="password" name="user_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Şifre">
			  </div>
			  <div class="col-sm-6">
				<input type="password" name="user_password_check" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Şifre Tekrarı">
			  </div>
			</div>
            <button type="submit" name="submit"  class="btn btn-primary btn-user btn-block">Kayıt Ol</button>
		  </form>
		  <hr>
		  <div class="text-center">
			<a class="small" href="<?php echo base_url("forgot_password")?>">Şifremi Unuttum?</a>
		  </div>
		  <div class="text-center">
			<a class="small" href="<?php echo base_url("login")?>">Zaten hesabınız var mı? Giriş Yapın! </a>

		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>

</div>
