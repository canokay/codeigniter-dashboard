<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $card_title;?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Bildirim:</div>
                    <a class="dropdown-item" href="<?php echo create_url()?>">Bildirim Ekle</a>
                    <a class="dropdown-item" href="<?php echo index_url()?>">Bildirim Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">

            <?php if(empty($items)){ ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo create_url()?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>
				<div class="table-responsive">
					<table id="datatable" class="table table-hover table-striped">
						<thead>
							<th>Başlık</th>
							<th>Oluşturma Tarihi</th>
							<th>İşlem</th>
						</thead>
						<tbody>
							<?php  foreach ($items as $item) { ?>
							<tr>
								<td><a href="<?php echo show_url($item->id); ?>"> <?php echo $item->title; ?></a></td>
								<td><?php echo $item->created_at; ?> </td>
								<td>
									<button  
										data-url="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/delete/" . $item->id); ?>" 
										data-title="<?php echo $item->title; ?>" 
										class="btn btn-sm btn-danger btn-outline remove-btn">
										<i class="fa fa-trash"></i> Sil
									</button>
									<a href="<?php echo show_url($item->id); ?>" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } ?>

		</div><!-- .widget -->
	</div>
</div>

