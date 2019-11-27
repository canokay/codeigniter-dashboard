    

	<div class="col-md-12">
		<div class="widget p-lg">


            <?php if(empty($items)){ ?>
            
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php $uri = $this->uri->segment(2); echo base_url("admin/$uri/ekle"); ?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>

			<table class="table table-hover table-striped">
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
                        <td><a href="<?php echo base_url("admin/page/$item->id"); ?>"> <?php echo $item->url; ?></a></td>
                        <td><?php echo $item->title; ?></td>
                        <td>
							<div class="m-b-lg m-r-xl inline-block">
                                <input 
                                    data-url="<?php echo base_url("admin/page/durum/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery
                                    data-color="#10c469"
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                />
							</div>
                        </td>
                        <td>
                            <a  href="<?php echo base_url("admin/page/sil/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</a>
                            <a href="<?php echo base_url("admin/page/$item->id"); ?>" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
			</table>

            <?php } ?>
		</div><!-- .widget -->
	</div>
