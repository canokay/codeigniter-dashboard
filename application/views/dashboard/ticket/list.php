    

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
                    <th>Başlık</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
				<tbody>
                    <?php  foreach ($items as $item) { ?>
                        
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><a href="<?php echo base_url("admin/ticket/$item->id"); ?>"> <?php echo $item->title; ?></a></td>
                        <td>
							<div class="m-b-lg m-r-xl inline-block">
                                <input 
                                    data-url="<?php echo base_url("admin/ticket/durum/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery
                                    data-color="#10c469"
                                    <?php echo ($item->is_active) ? "checked" : ""; ?>
                                />
							</div>
                        </td>
                        <td>
                            <button  
                                data-url="<?php echo base_url("admin/ticket/sil/$item->id"); ?>" 
                                data-title="<?php echo $item->title; ?>" 
                                class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> Sil
                            </button>
                            <a href="<?php echo base_url("admin/ticket/$item->id"); ?>" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
			</table>

            <?php } ?>
		</div><!-- .widget -->
	</div>
