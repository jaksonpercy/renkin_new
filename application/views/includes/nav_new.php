<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
.nav-link p{
  color:#fff;
  font-family: 'Plus Jakarta Sans';
}

.sidebar-dark-primary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active {
  border-color: #a0e8fa;
}
</style>

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">


<li class="nav-item">
    <a href="<?php echo url('Dashboard') ?>" class="nav-link <?php echo ($page->menu=='dashboard')?'active':'' ?>">
      <p>
        <?php echo lang('dashboard') ?>
      </p>
    </a>
  </li>

  <?php if (hasRoles('users_list') == 1 ||hasRoles('users_list') == 3 ): ?>

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
  <?php if (hasRolesUser()): ?>
      <?php if (hasReviewPeriod()): ?>
    <li class="nav-item">
      <a href="<?php echo url('ReviewStrakom') ?>" class="nav-link <?php echo ($page->submenu=='reviewstrakom')?'active':'' ?>">
        <i class="nav-icon"></i>
        <p>
      Review Strategi Komunikasi <br> Unggulan
        </p>
      </a>
    </li>
  <?php endif ?>
  <?php endif ?>
  <li class="nav-item">
    <a href="<?php echo url('Realisasi') ?>" class="nav-link <?php echo ($page->submenu=='realisasi')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
      Realisasi Strategi <br>Komunikasi
      </p>
    </a>
  </li>
</ul>
</li>
<?php endif ?>

<?php if (hasRoles('users_list') == 4 ): ?>

<li class="nav-item has-treeview <?php echo ($page->menu=='rencanakinerja')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='rencanakinerja')?'active':'' ?>">

  <p>
  Review Rencana Kinerja
    <i class="right fas fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
  <a href="<?php echo url('ReviewStrakomUnggulan') ?>" class="nav-link <?php echo ($page->submenu=='strakom')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
      Strategi Komunikasi <br> Unggulan
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo url('ReviewEditorialPlan') ?>" class="nav-link <?php echo ($page->submenu=='editorialplan')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
    Editorial Plan
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo url('ReviewMitigasi') ?>" class="nav-link <?php echo ($page->submenu=='mitigasi')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
    Uraian Materi Mitigasi <br> Krisis
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo url('ReviewRealisasi') ?>" class="nav-link <?php echo ($page->submenu=='realisasi')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
      Realisasi Strategi Komunikasi
    </p>
  </a>
</li>
<?php if (hasRolesUser()): ?>
    <?php if (hasReviewPeriod()): ?>
  <li class="nav-item">
    <a href="<?php echo url('ReviewStrakom') ?>" class="nav-link <?php echo ($page->submenu=='reviewstrakom')?'active':'' ?>">
      <i class="nav-icon"></i>
      <p>
    Review Strategi Komunikasi <br> Unggulan
      </p>
    </a>
  </li>
    <?php endif ?>
<?php endif ?>
<!-- <li class="nav-item">
  <a href="<?php echo url('Realisasi') ?>" class="nav-link <?php echo ($page->submenu=='realisasi')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
    Realisasi Strategi <br>Komunikasi
    </p>
  </a>
</li> -->
</ul>
</li>
<?php endif ?>

<?php if (hasRoles('users_list') == 2): ?>
  <li class="nav-item">
      <a href="<?php echo url('Penilaian') ?>" class="nav-link <?php echo ($page->menu=='penilaian')?'active':'' ?>">
        <p>
          Penilaian
        </p>
      </a>
    </li>
<?php endif ?>

<?php if (hasRoles('users_list') == 4 ): ?>
  <li class="nav-item">
      <a href="<?php echo url('Penilaian') ?>" class="nav-link <?php echo ($page->menu=='penilaian')?'active':'' ?>">
        <p>
          Rekomendasi Penilaian
        </p>
      </a>
    </li>
<?php endif ?>

<?php if (hasRoles('users_list') == 1 ): ?>
  <li class="nav-item">
      <a href="https://poap.jakarta.go.id/crisis/" target = "_blank" class="nav-link <?php echo ($page->menu=='')?'active':'' ?>">
        <p>
        Dashboard Krisis
        </p>
      </a>
    </li>
<?php endif ?>

<?php if (hasRoles('users_list') == 1 ): ?>

  <li class="nav-item has-treeview <?php echo ($page->menu=='historystrakom')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='historystrakom')?'active':'' ?>">

  <p>
  History Strakom 
    <i class="right fas fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
  <a href="<?php echo url('HistoryStrakomNow') ?>" class="nav-link <?php echo ($page->submenu=='historystrakomnow')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
      Sistem Saat Ini
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo url('HistoryStrakom') ?>" class="nav-link <?php echo ($page->submenu=='historystrakompast')?'active':'' ?>">
    <i class="nav-icon"></i>
    <p>
     Sistem Lama
    </p>
  </a>
</li>
</ul>
</li>
<?php else : ?> 
  <li class="nav-item">
      <a href="<?php echo url('HistoryStrakom') ?>" class="nav-link <?php echo ($page->menu=='historystrakom')?'active':'' ?>">
        <p>
          History Strategi Komunikasi <br> Unggulan
        </p>
      </a>
    </li>
<?php endif ?> 
<?php if (hasRoles('users_list') == 3): ?>
<li class="nav-item has-treeview <?php echo ($page->menu=='rencanakinerja')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='rencanakinerja')?'active':'' ?>">

  <p>
  Master

  </p>
</a>
<?php endif ?>
<?php if (hasRoles('users_list') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Users') ?>" class="nav-link <?php echo ($page->menu=='users')?'active':'' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
      <?php echo lang('users') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('activity_log_list') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Activity_logs') ?>" class="nav-link <?php echo ($page->menu=='activity_logs')?'active':'' ?>">
      <i class="nav-icon fas fa-history"></i>
      <p>
      <?php echo lang('activity_logs') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<!-- <?php if (hasRoles('roles_list') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Roles') ?>" class="nav-link <?php echo ($page->menu=='roles')?'active':'' ?>">
      <i class="nav-icon fas fa-lock"></i>
      <p>
      <?php echo lang('manage_roles') ?>
      </p>
    </a>
  </li>
<?php endif ?> -->

<?php if (hasRoles('roles_list') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('MappingSkpd') ?>" class="nav-link <?php echo ($page->menu=='mappingskpd')?'active':'' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
      Mapping OPD
      </p>
    </a>
  </li>
<?php endif ?>

<!-- <?php if (hasRoles('permissions_list') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Permissions') ?>" class="nav-link <?php echo ($page->menu=='permissions')?'active':'' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
      <?php echo lang('manage_permissions') ?>
      </p>
    </a>
  </li>
<?php endif ?> -->

<?php if (hasRoles('backup_db') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('KategoriProgram') ?>" class="nav-link <?php echo ($page->menu=='kategoriprogram')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Kategori Program
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('KanalPublikasi') ?>" class="nav-link <?php echo ($page->menu=='rencanamedia')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Kanal Publikasi /<br> Rencana Media
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('ProdukKomunikasi') ?>" class="nav-link <?php echo ($page->menu=='produkkomunikasi')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Produk Komunikasi
      </p>
    </a>
  </li>
<?php endif ?>


<!-- <?php if (hasRoles('backup_db') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('JenisKegiatan') ?>" class="nav-link <?php echo ($page->menu=='jeniskegiatan')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Jenis Kegiatan
      </p>
    </a>
  </li>
<?php endif ?> -->

<!-- <?php if (hasRoles('backup_db')== 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('KSD') ?>" class="nav-link <?php echo ($page->menu=='ksd')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola KSD
      </p>
    </a>
  </li>
<?php endif ?> -->

<?php if (hasRoles('backup_db')== 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Pemberitahuan') ?>" class="nav-link <?php echo ($page->menu=='pemberitahuan')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Kelola Pemberitahuan
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db') == 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('Backup') ?>" class="nav-link <?php echo ($page->menu=='backup')?'active':'' ?>">
      <i class="nav-icon fas fa-database"></i>
      <p>
      <?php echo lang('backup') ?>
      </p>
    </a>
  </li>
<?php endif ?>

<?php if (hasRoles('backup_db')== 3): ?>
  <li class="nav-item">
    <a href="<?php echo url('PengaturanPeriode') ?>" class="nav-link <?php echo ($page->menu=='periode')?'active':'' ?>">
      <i class="nav-icon fas fa-cog"></i>
      <p>
    Pengaturan Periode
      </p>
    </a>
  </li>
<?php endif ?>

<?php if ( hasRoles('company_settings') == 3): ?>
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
      <a href="<?php echo url('Settings/dokumentasi') ?>" class="nav-link <?php echo ($page->submenu=='dokumentasi')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> Link Dokumentasi & <br>Panduan </p>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a href="<?php echo url('Settings/email_templates') ?>" class="nav-link <?php echo ($page->submenu=='email_templates')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('manage_email_template') ?></p>
      </a>
    </li> -->
  </ul>
</li>
</li>
<?php endif ?>
<?php if (hasRoles('users_list') == 1): ?>
<li class="nav-item has-treeview <?php echo ($page->menu=='settings')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='settings')?'active':'' ?>">

    <p>
    Tutorial Video
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
      <a href="https://youtu.be/HGp2W8rbMA0?si=Qk973CjtgPW9ZR3J" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Strategi Komunikasi <br> Unggulan </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="https://youtu.be/DoW_gpuhGDc?si=pMgCdZ6_crXErbgd" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Editorial Plan</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="https://youtu.be/er_2wOJr1w0?si=m5OzS08wF0kOv6ju" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Uraian Mitigasi <br> Krisis</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="https://youtu.be/tnaYTRELVE4?si=Wwblm8BczQInDPCP" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Realisasi</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="https://youtu.be/deZeaDzXLws?si=GVb25XmJ3JqL-Xa8" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Finalisasi Strategi <br> Komunikasi Unggulan</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?php echo setting('url_panduan_pd') ?>" class="nav-link" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Tutorial Lengkap</p>
      </a>
    </li>


    <!-- <li class="nav-item">
      <a href="<?php echo url('Settings/email_templates') ?>" class="nav-link <?php echo ($page->submenu=='email_templates')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('manage_email_template') ?></p>
      </a>
    </li> -->
  </ul>
</li>
<li class="nav-item">
  <a href="<?php echo setting('url_panduan_pd') ?>" class="nav-link">

    <p>
    Tutorial Buku
    </p>
  </a>
</li>
<?php endif ?>

<?php if (hasRoles('users_list') > 1): ?>
<li class="nav-item has-treeview <?php echo ($page->menu=='settings')?'menu-open':'' ?>">
  <a href="#" class="nav-link  <?php echo ($page->menu=='settings')?'active':'' ?>">

    <p>
    Tutorial
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <?php if (hasRoles('users_list') == 1): ?>
  <li class="nav-item">
      <a href="<?php echo setting('url_video_pd') ?>" class="nav-link <?php echo ($page->submenu=='general')?'active':'' ?>" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p> Video </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?php echo setting('url_panduan_pd') ?>" class="nav-link <?php echo ($page->submenu=='dokumentasi')?'active':'' ?>" target="_blank">
        <i class="far fa-circle nav-icon"></i> <p>Buku Panduan </p>
      </a>
    </li>

  <?php elseif (hasRoles('users_list') == 2): ?>
    <li class="nav-item">
        <a href="<?php echo setting('url_video_asisten') ?>" class="nav-link <?php echo ($page->submenu=='general')?'active':'' ?>" target="_blank">
          <i class="far fa-circle nav-icon"></i> <p> Video </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo setting('url_panduan_asisten') ?>" class="nav-link <?php echo ($page->submenu=='dokumentasi')?'active':'' ?>" target="_blank">
          <i class="far fa-circle nav-icon"></i> <p>Buku Panduan </p>
        </a>
      </li>
  <?php else : ?>
    <li class="nav-item">
        <a href="<?php echo setting('url_video_super') ?>" class="nav-link <?php echo ($page->submenu=='general')?'active':'' ?>" target="_blank">
          <i class="far fa-circle nav-icon"></i> <p> Video </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?php echo setting('url_panduan_super') ?>" class="nav-link <?php echo ($page->submenu=='dokumentasi')?'active':'' ?>" target="_blank">
          <i class="far fa-circle nav-icon"></i> <p>Buku Panduan </p>
        </a>
      </li>
  <?php endif ?>

    <!-- <li class="nav-item">
      <a href="<?php echo url('Settings/email_templates') ?>" class="nav-link <?php echo ($page->submenu=='email_templates')?'active':'' ?>">
        <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('manage_email_template') ?></p>
      </a>
    </li> -->
  </ul>
</li>
<?php endif ?>
</li>
  <!-- <li class="nav-item">
      <a href="<?php echo setting('url_paparan_renkin') ?>" class="nav-link <?php echo ($page->menu=='dashboard')?'active':'' ?>" target="_blank">
        <p>
        Paparan Renkin
        </p>
      </a>
    </li> -->

  <li class="nav-item">
<a href="<?php echo url('/Logout') ?>" class="nav-link" >
  <p> Keluar  </p>&nbsp;</a>
  </li>







</ul>
