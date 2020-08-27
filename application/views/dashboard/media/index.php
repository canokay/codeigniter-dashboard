<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<?php render_card_header_and_button($card_title);?>

        <!-- Card Body -->
        <div class="card-body">

            <?php if(empty($items)){ ?>
            
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo create_url()?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>

			<table id="datatable" class="table table-hover table-striped">
                <thead>
                    <th>#id</th>
                    <th>Ad</th>
                    <th>Url</th>
                    <th>İşlem</th>
                </thead>
				<tbody>
                    <?php  foreach ($items as $item) { ?>
                        
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><a href="<?php echo base_url("$item->url"); ?>"> <?php echo $item->name; ?></a></td>
                        <td><?php echo $item->url; ?></td>
                        <td>
                            <button  
                                data-url="<?php echo delete_url($item->id); ?>" 
                                data-title="<?php echo $item->name; ?>" 
                                class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
			</table>

            <?php } ?>

            </div><!-- .widget -->
	</div>
</div>

