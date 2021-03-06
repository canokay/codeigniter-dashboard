  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url("assets/sb_admin_2/")?>js/sb-admin-2.min.js"></script>

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

		<?php if(isset($DropzoneField)) { ?>
				<!-- Dropzone Js -->
				<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>
		<?php 	} ?>


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
							"language":{"sDecimal":",","sEmptyTable":"Tabloda herhangi bir veri mevcut değil","sInfo":"_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor","sInfoEmpty":"Kayıt yok","sInfoFiltered":"(_MAX_ kayıt içerisinden bulunan)","sInfoPostFix":"","sInfoThousands":".","sLengthMenu":"Sayfada _MENU_ kayıt göster","sLoadingRecords":"Yükleniyor...","sProcessing":"İşleniyor...","sSearch":"Ara:","sZeroRecords":"Eşleşen kayıt bulunamadı","oPaginate":{"sFirst":"İlk","sLast":"Son","sNext":"Sonraki","sPrevious":"Önceki"},"oAria":{"sSortAscending":": artan sütun sıralamasını aktifleştir","sSortDescending":": azalan sütun sıralamasını aktifleştir"},"select":{"rows":{"0":"","1":"1 kayıt seçildi","_":"%d kayıt seçildi"}}},
						});
					} );
				</script>
		<?php }?>