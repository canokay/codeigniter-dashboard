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
  <link href="<?php echo base_url("assets/sb_admin_2/")?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url("assets/sb_admin_2/")?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/sb_admin_2/")?>css/sb-admin-2.css" rel="stylesheet">

	<?php
		if (isset($style_include)) {
			echo "<!-- Page Style -->";
			$this->load->view("$project/$category/$view/style");?>
		}
	?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Left Sidebar -->
			<?php $this->load->view("$project/components/left_sidebar")   ?>
    <!-- End of Left Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
				<?php $this->load->view("$project/components/topbar")   ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
					<?php
						if (isset($card_title)) {
						echo "<h1 class='h3 mb-4 text-gray-800'>$card_title</h1>";
						}
						else{
							echo "<h1 class='h3 mb-4 text-gray-800'>Dashboard</h1>";
						}
					?>
          <!-- End Page Heading -->

					<?php $this->load->view("$project/$category/$view")   ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url("assets/sb_admin_2/")?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url("assets/sb_admin_2/")?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url("assets/sb_admin_2/")?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/sb_admin_2/")?>js/sb-admin-2.min.js"></script>
	<?php
			if (isset($script_include)) {
				echo "<!-- Page JS -->";
				$this->load->view("$project/$category/$view/script");
			}
		?>

</body>

</html>
