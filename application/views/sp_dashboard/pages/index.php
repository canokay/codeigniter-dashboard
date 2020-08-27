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
                    <th>Url</th>
                    <th>Başlık</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
				<tbody>
                    <?php  foreach ($items as $item) { ?>
                        
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><a href="<?php echo show_url($item->id); ?>"> <?php echo $item->url; ?></a></td>
                        <td><?php echo $item->title; ?></td>
                        <td>
							<div class="m-b-lg m-r-xl inline-block">
                                <input 
                                    data-url="<?php echo status_url($item->id); ?>"
                                    class="is_active"
                                    type="checkbox" 
                                    data-switchery
                                    data-color="#10c469"
                                    <?php echo ($item->is_active) ? "checked" : ""; ?>
                                />
							</div>
                        </td>
                        <td>
                            <button  
                                data-url="<?php echo delete_url($item->id); ?>" 
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

            <?php } ?>

        </div><!-- .widget -->
	</div>
</div>
