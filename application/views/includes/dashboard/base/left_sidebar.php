<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url("admin")?>">
  <div class="sidebar-brand-icon rotate-n-15">
	<i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Codeigniter 3 </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url("admin")?>">
	<i class="fas fa-fw fa-tachometer-alt"></i>
	<span>Başlangıç</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Etkinlikler
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
	<i class="fas fa-fw fa-cog"></i>
	<span>Sayfa</span>
  </a>
	<?php 
		if ($category=="pages"){
			echo ' <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionSidebar">';
		}
		else{
			echo ' <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">';

		}

	?>
	<div class="bg-white py-2 collapse-inner rounded">
	  <a class="collapse-item" href="<?php echo base_url("admin/page/ekle")?>">Yeni Sayfa Oluşturun</a>
	  <a class="collapse-item" href="<?php echo base_url("admin/page")?>">Sayfaları Listeleyin</a>
	</div>
  </div>

</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url("logout")?>">
	<i class="fas fa-fw fa-chart-area"></i>
	<span>Çıkış Yap</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
