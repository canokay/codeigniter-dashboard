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
  <link href="<?php echo base_url("assets/dashboard/")?>css/sb-admin-2.css" rel="stylesheet">  

  <!-- IziToastField Css -->
  <link rel='stylesheet' href="<?php echo base_url("assets/dashboard/")?>vendor/izitoast/css/iziToast.min.css">
	<?php
		if(isset($CKEditorField))
		{	
			echo "<!-- CKEditor JS -->";
			echo "	<script src='base_url('assets/dashboard/')?>vendor/ckeditor/ckeditor.js'></script>";
		}
	?>

	<?php
		if(isset($DropzoneField))
		{
			echo "<!-- Dropzone Css -->";
			echo "<link rel='stylesheet' href='base_url('assets/dashboard/')?>vendor/dropzone/css/dropzone.min.css'>";
		}
	?>

	<?php
		if (isset($view_header_include)) {
			echo "<!-- Page Style -->";
			$this->load->view("includes/$project/$category/$view/$view_header_include");
		}
	?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Left Sidebar -->
			<?php $this->load->view("includes/$project/base/left_sidebar")   ?>
    <!-- End of Left Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
				<?php $this->load->view("includes/$project/base/topbar")   ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  <div class="row">
				<div class="col col-md-8 text-left">
					<?php
						if (isset($sub_title)) {
							echo "<h1 class='h3 mb-4 text-gray-800'>$sub_title</h1>";
							}
							else{
								echo "<h1 class='h3 mb-4 text-gray-800'>Dashboard</h1>";
							}
						?>
				</div>
				<div class="col col-md-4 text-right" >
					<?php
						if (isset($page_title_add_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/ekle") .'"'.' class="btn btn-xs btn-primary btn-outline  " style="text-align: right" > Ekle</a>';
						}
						else if (isset($page_title_list_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/") .'"'.' class="btn btn-xs btn-danger btn-outline  " style="text-align: right" > Listele</a>';
						}
						else if (isset($page_title_delete_button)) {
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/sil") .'"'.' class="btn btn-xs btn-danger btn-outline  " style="text-align: right" > Sil</a>';
						}
						else if(isset($page_title_button)){
							echo '<a href="'. base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $page_title_button) .'"'.' class="btn btn-xs btn-danger btn-outline  " style="text-align: right" > Git</a>';
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

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- SweetAlert2 JS -->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/sweetalert2/js/sweetalert.min.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/dashboard/")?>js/sb-admin-2.min.js"></script>

  <!-- IziToast JS -->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/izitoast/js/iziToast.min.js"></script>

  <!-- DataTables JS -->
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url("assets/dashboard/")?>vendor/izitoast/js/iziToast.min.js"></script>
  
  <script>
	
	$(document).ready(function(){
	
		$(".remove-btn").click(function(e){
	
	
			Swal.fire({
			title: $(this).data("title") + ' - Silinecek?',
			text: "Bu işlem geri alınamaz!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Evet!',
			cancelButtonText: 'Hayır!',
			}).then((result) => {
			if (result.value) {
	
				window.location.href = $(this).data("url");
	
			}
			})
		})
	
	})
	
	
	</script>

	<?php
			if(isset($CKEditorField))
			{	
				echo "<script>";
				foreach ($CKEditorField as $i) {
					echo "CKEDITOR.replace( '$i' );";
				}	
				echo "</script>";
			}		
		?>

		<?php
			if(isset($DropzoneField))
			{
				echo "<!-- Dropzone Js -->";
				echo "<script src='<?php echo base_url('assets/dashboard/')?>vendor/dropzone/js/dropzone.min.js'></script>";
			}
		?>



		
		<?php 
			$ToastField = $this->session->userdata("ToastField");
			if($ToastField){ ?>
				<script>
					iziToast.<?php echo $ToastField['status']; ?> ({
						title: "<?php echo $ToastField['title']; ?>" ,
						message: "<?php echo $ToastField['message']; ?>" ,
						position : "topCenter"
					});
				</script>
		<?php }?>


		<?php if(isset($DataTablesField)){?>
				<script>
					$(document).ready(function() {
						$('#datatable').DataTable({
                        "order": [[0, "desc"]],
                        "language":{"sDecimal":",","sEmptyTable":"Tabloda herhangi bir veri mevcut değil","sInfo":"_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor","sInfoEmpty":"Kayıt yok","sInfoFiltered":"(_MAX_ kayıt içerisinden bulunan)","sInfoPostFix":"","sInfoThousands":".","sLengthMenu":"Sayfada _MENU_ kayıt göster","sLoadingRecords":"Yükleniyor...","sProcessing":"İşleniyor...","sSearch":"Ara:","sZeroRecords":"Eşleşen kayıt bulunamadı","oPaginate":{"sFirst":"İlk","sLast":"Son","sNext":"Sonraki","sPrevious":"Önceki"},"oAria":{"sSortAscending":": artan sütun sıralamasını aktifleştir","sSortDescending":": azalan sütun sıralamasını aktifleştir"},"select":{"rows":{"0":"","1":"1 kayıt seçildi","_":"%d kayıt seçildi"}}}
						});
					} );
				</script>
		<?php }?>
						






	<?php
			if (isset($view_footer_include)) {
				echo "<!-- Page JS -->";
				$this->load->view("includes/$project/$category/$view/$view_footer_include");
			}
		?>




</body>

</html>