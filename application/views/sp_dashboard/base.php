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

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/sp_dashboard/")?>css/sb-admin-2.css" rel="stylesheet">  

  <!-- IziToastField Css -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css'>
	<?php
		if(isset($CKEditorField))
		{	
			echo "<!-- CKEditor JS -->";
			echo "	<script src='https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js'></script>";
		}
	?>

	<?php
		if(isset($DropzoneField))
		{
			echo "<!-- Dropzone Css -->";
			echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css'>";
		}
	?>

	<?php if(isset($PickDateField)){ ?>
			<!-- PickDate Css -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css'> 
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css'> 
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.time.css'> 
	<?php	} ?>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/sp_dashboard/")?>js/sb-admin-2.min.js"></script>

  <!-- IziToast JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  
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
				echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>";
			}
		?>


		<?php if(isset($PickDateField)) {?>
				<!-- PickDate Css --> 
				<script src='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.js'></script>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.date.js'></script>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.time.js'></script> 
				<script src='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/translations/tr_TR.js'></script>
				<script>
					$(document).ready(function () {
						$('.pickadate').pickadate({
							format: 'd/mm/yyyy',
						});
						
						$('.pickatime').pickatime({
							format: 'HH:i',
						});
					});
				</script>
		<?php 	}?>


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