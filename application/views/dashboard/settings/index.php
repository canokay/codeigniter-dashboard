<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $sub_title;?></h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">
				<div class="table-responsive">
					<table id="datatable" class="table table-hover table-striped">
						<thead>
							<th>Kullanıcı Adı</th>
							<th>Ad</th>
							<th>Soyad</th>
							<th>Eposta Adresi</th>
						</thead>
						<tbody>
							<?php  foreach ($items as $item) { ?>
							<tr>
								<td><?php echo $item->username; ?> </td>
								<td><?php echo $item->first_name; ?> </td>
								<td><?php echo $item->last_name; ?> </td>
								<td><?php echo $item->email; ?> </td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
		</div><!-- .widget -->
	</div>
</div>

