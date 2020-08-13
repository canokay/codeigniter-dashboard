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

    <?php $this->load->view("sb_admin_2/components/style")   ?>
  

	<?php if (isset($style_include)) { ?>
			<!-- Page Style -->
			<?php $this->load->view("$project/$category/$view/style");?>
    <?php }?>
    
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
			<div class="row">
				<div class="col col-md-8 text-left">
					<?php
						if (isset($title)) {
							echo "<h1 class='h3 mb-4 text-gray-800'>$title</h1>";
							}
							else{
								echo "<h1 class='h3 mb-4 text-gray-800'>Dashboard</h1>";
							}
						?>
				</div>
				<div class="col col-md-4 text-right" >
					<?php
						if (isset($page_title_add_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/create") . '"'.' class="btn btn-xs btn-primary btn-outline  " style="text-align: right" > Ekle</a>';
						}
						else if (isset($page_title_list_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2)) .'"'.' class="btn btn-xs btn-danger btn-outline  " style="text-align: right" > Listele</a>';
						}
						else if (isset($page_title_delete_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $this->uri->segment(3) . "/delete") .'"'.' class="btn btn-xs btn-danger btn-outline  " style="text-align: right" > Sil</a>';
						}

					?>
				</div>
			</div>

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
  
  <?php $this->load->view("sb_admin_2/components/script")   ?>

						

	<?php
        if (isset($script_include)) {
            echo "<!-- Page JS -->";
            $this->load->view("$project/$category/$view/script");
        }
	?>

</body>

</html>