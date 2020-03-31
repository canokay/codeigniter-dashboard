    

	<div class="col-md-12">
		<div class="widget p-lg">


            <?php if(empty($items)){ ?>
            
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php $uri = $this->uri->segment(2); echo base_url("admin/$uri/ekle"); ?>">tıklayınız</a></p>
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
                                data-url="<?php echo base_url("admin/media/sil/$item->id"); ?>" 
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
