<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Default card -->
  <div class="card">

    <div class="card-header with-border">
      <h3 class="card-title">Pengaturan</h3>
    </div>
    <ul class="list-group">

      <!-- <?php if (hasPermissions('general_settings')): ?> -->
        <a class="list-group-item list-group-item-action <?php echo ($page->submenu=='general')?'active':'' ?>" href="<?php echo url('pengaturan/general') ?>"><?php echo lang('general_setings') ?></a>
      <!-- <?php endif ?> -->

      <!-- <?php if (hasPermissions('company_settings')): ?> -->
        <a class="list-group-item list-group-item-action <?php echo ($page->submenu=='module')?'active':'' ?>" href="<?php echo url('pengaturan/module') ?>">Module Settings</a>
      <!-- <?php endif ?> -->

    </ul>

  </div>
