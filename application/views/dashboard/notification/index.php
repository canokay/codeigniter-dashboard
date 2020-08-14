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
                    <div class="dropdown-header">Bildirim :</div>
                    <a class="dropdown-item" href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2))?>">Bildirim  Listele</a>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">

            <?php if(empty($items)){ ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url($this->uri->segment(1) . "/". $this->uri->segment(2) . "/create")?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>
				<div class="table-responsive">
					<table id="datatable" class="table table-hover table-striped">
						<thead>
							<th>Başlık</th>
						</thead>
						<tbody>
							<?php  foreach ($items as $item) { ?>
							<tr>
								<td><a href="<?php echo base_url($this->uri->segment(1) . "/" . $this->uri->segment(2) . "/" . $item->id); ?>"> <?php echo $item->title; ?></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } ?>

		</div><!-- .widget -->
	</div>
</div>

