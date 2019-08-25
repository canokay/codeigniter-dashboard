
  <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
	<!-- Nested Row within Card Body -->
	<div class="row">
	  <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
	  <div class="col-lg-7">
		<div class="p-5">
		  <div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
		  </div>
		  <form action="<?php echo base_url("/register")?>" class="user" method="post">
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" name="user_first_name" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
			  </div>
			  <div class="col-sm-6">
				<input type="text" name="user_last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
			  </div>
			</div>
			<div class="form-group">
				<input type="text" name="user_username" class="form-control form-control-user" id="exampleUsername" placeholder="Kullanıcı Adı">
			</div>
			<div class="form-group">
			  <input type="email" name="user_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
			</div>
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="password" name="user_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
			  </div>
			  <div class="col-sm-6">
				<input type="password" name="user_password_check" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
			  </div>
			</div>
            <button type="submit" class="btn btn-primary btn-user btn-block">Kayıt Ol</button>
			<hr>
			<a href="index.html" class="btn btn-google btn-user btn-block">
			  <i class="fab fa-google fa-fw"></i> Register with Google
			</a>
			<a href="index.html" class="btn btn-facebook btn-user btn-block">
			  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
			</a>
		  </form>
		  <hr>
		  <div class="text-center">
			<a class="small" href="forgot-password.html">Forgot Password?</a>
		  </div>
		  <div class="text-center">
			<a class="small" href="login.html">Already have an account? Login!</a>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>

</div>
