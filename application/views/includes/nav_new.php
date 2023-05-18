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
        Strategi Komunikasi <br> Unggulan
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
      Realisasi Strategi <br>Komunikasi
      </p>
    </a>
  </li>
</ul>
<?php if (hasRoles('users_list')): ?>
<li class="nav-item has-treeview <?php echo ($page->menu=='rencanakinerja')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='rencanakinerja')?'active':'' ?>">

  <p>
  Master

  </p>
</a>
<?php endif ?>
<?php if (hasRoles('users_list')): ?>
  <li class="nav-item">
    <a href="<?php echo url('Users') ?>" class="nav-link <?php echo ($page->menu=='users')?'active':'' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
      <?php echo lang('users') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('activity_log_list')): ?>
  <li class="nav-item">
    <a href="<?php echo url('Activity_logs') ?>" class="nav-link <?php echo ($page->menu=='activity_logs')?'active':'' ?>">
      <i class="nav-icon fas fa-history"></i>
      <p>
      <?php echo lang('activity_logs') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('roles_list')): ?>
  <li class="nav-item">
    <a href="<?php echo url('Roles') ?>" class="nav-link <?php echo ($page->menu=='roles')?'active':'' ?>">
      <i class="nav-icon fas fa-lock"></i>
      <p>
      <?php echo lang('manage_roles') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('permissions_list')): ?>
  <li class="nav-item">
    <a href="<?php echo url('Permissions') ?>" class="nav-link <?php echo ($page->menu=='permissions')?'active':'' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
      <?php echo lang('manage_permissions') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('KategoriProgram') ?>" class="nav-link <?php echo ($page->menu=='kategoriprogram')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Kategori Program
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('KanalPublikasi') ?>" class="nav-link <?php echo ($page->menu=='rencanamedia')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Kanal Publikasi /<br> Rencana Media
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('ProdukKomunikasi') ?>" class="nav-link <?php echo ($page->menu=='produkkomunikasi')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Produk Komunikasi
      </p>
    </a>
  </li>
<?php endif ?>


<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('JenisKegiatan') ?>" class="nav-link <?php echo ($page->menu=='jeniskegiatan')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Jenis Kegiatan
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('KSD') ?>" class="nav-link <?php echo ($page->menu=='ksd')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola KSD
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('Backup') ?>" class="nav-link <?php echo ($page->menu=='backup')?'active':'' ?>">
      <i class="nav-icon fas fa-database"></i>
      <p>
      <?php echo lang('backup') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')): ?>
  <li class="nav-item">
    <a href="<?php echo url('PengaturanPeriode') ?>" class="nav-link <?php echo ($page->menu=='periode')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Pengaturan Periode
      </p>
    </a>
  </li>
<?php endif ?>

<?php if ( hasRoles('company_settings') ): ?>
<li class="nav-item has-treeview <?php echo ($page->menu=='settings')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='settings')?'active':'' ?>">
    <i class="nav-icon fas fa-cog"></i>
    <p>
    <?php echo lang('settings') ?>
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
      <a href="<?php echo url('Settings/general') ?>" class="nav-link <?php echo ($page->submenu=='general')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('general_setings') ?> </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?php echo url('Settings/company') ?>" class="nav-link <?php echo ($page->submenu=='company')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p>  <?php echo lang('company_setings') ?> </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?php echo url('Settings/email_templates') ?>" class="nav-link <?php echo ($page->submenu=='email_templates')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('manage_email_template') ?></p>
      </a>
    </li>
  </ul>
</li>
</li>
<?php endif ?>


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
