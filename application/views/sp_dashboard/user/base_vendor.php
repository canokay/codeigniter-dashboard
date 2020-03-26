<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  
	<?php
		if (isset($title)) {
		echo "<title> $title - Dashboard</title>";
		}
		else{
		echo "<title> - Dashboard</title>";
		}
	?>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url("assets/dashboard/")?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/dashboard/")?>css/sb-admin-2.min.css" rel="stylesheet">

	<?php
		if (isset($view_header_include)) {
			echo "<!-- Page Style -->";
			$this->load->view("includes/$project/$category/$view/$view_header_include");
		}
	?>

</head>

<body class="bg-gradient-primary">

<?php $this->load->view("$project/$category/$view")   ?>


  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/dashboard/")?>js/sb-admin-2.min.js"></script>

	<?php
			if (isset($view_footer_include)) {
				echo "<!-- Page JS -->";
				$this->load->view("includes/$project/$category/$view/$view_footer_include");
			}
		?>

</body>

</html>
