<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header($card_title);?>

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
						</thead>
						<tbody>
							<?php  foreach ($items as $item) { ?>
							<tr>
								<td><a href="<?php echo show_url($item->id); ?>"> <?php echo $item->title; ?></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } ?>

		</div><!-- .widget -->
	</div>
</div>

