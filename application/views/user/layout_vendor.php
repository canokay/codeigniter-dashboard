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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/sb_admin_2/")?>css/sb-admin-2.css" rel="stylesheet">

	<?php
		if (isset($style_include)) {
			echo "<!-- Page Style -->";
			$this->load->view("includes/$project/$view/$style_include");
		}
	?>

</head>

<body class="bg-gradient-primary">

<?php $this->load->view("$project/$view")   ?>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/sb_admin_2/")?>js/sb-admin-2.min.js"></script>
	<?php
			if (isset($script_include)) {
				echo "<!-- Page JS -->";
				$this->load->view("includes/$project/$view/$script_include");
			}
		?>

</body>

</html>
