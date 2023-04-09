<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">


<li class="nav-item">
    <a href="<?php echo url('Dashboard') ?>" class="nav-link <?php echo ($page->menu=='dashboard')?'active':'' ?>">
      <p>
        <?php echo lang('dashboard') ?>
      </p>
    </a>
  </li>


  <li class="nav-item has-treeview <?php echo ($page->menu=='rencanakinerja')?'menu-open':'' ?>">
    <a href="#" class="nav-link  <?php echo ($page->menu=='rencanakinerja')?'active':'' ?>">

    <p>
    Rencana Kinerja
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
    <a href="<?php echo url('StrakomUnggulan') ?>" class="nav-link <?php echo ($page->submenu=='strakom')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
        Strategi Komunikasi <br>Unggulan
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('EditorialPlan') ?>" class="nav-link <?php echo ($page->submenu=='editorialplan')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
      Editorial Plan
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('Mitigasi') ?>" class="nav-link <?php echo ($page->submenu=='mitigasi')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
      Uraian Materi Mitigasi <br> Krisis
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('Realisasi') ?>" class="nav-link <?php echo ($page->submenu=='realisasi')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
      Realisasi
      </p>
    </a>
  </li>
</ul>
<li class="nav-item">
  <a href="<?php echo url('Pengaturan/general') ?>" class="nav-link <?php echo ($page->submenu=='general')?'active':'' ?>">

    <p>
    Pengaturan
    </p>
  </a>
</li>

  <li class="nav-header">
<a href="<?php echo url() ?>">
    <strong>  Buku Panduan  </strong> &nbsp;
  </a>
  </li>
  <li class="nav-header">
<a href="<?php echo url('/Logout') ?>">
    <strong>  Keluar  </strong> &nbsp;</a>
  </li>







</ul>
