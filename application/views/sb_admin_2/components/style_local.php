  <!-- Custom fonts for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/sb_admin_2/")?>css/sb-admin-2.css" rel="stylesheet">  

  <!-- IziToastField Css -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css'>
	<?php if(isset($CKEditorField)){ ?>
			<!-- CKEditor JS -->
			<script src='https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js'></script>
	<?php 	} ?>

	<?php if(isset($DropzoneField)) { ?>
			<!-- Dropzone Css -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css'>
	<?php 	}?>
	
	<?php if(isset($PickDateField)){ ?>
			<!-- PickDate Css -->
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css'> 
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css'> 
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.time.css'> 
	<?php	} ?>