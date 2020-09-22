<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main " id="main-menu-navigation" data-menu="menu-navigation">
      <?php
      $parentModul = $this->ParentModulModel->get_parent_modul();
      foreach ($parentModul as $key): ?>
      <?php if (cekParentModul($key->id_parent_modul) == TRUE): ?>
      <?php if ($key->tampil_sidebar_parent=='Y'): ?>
      <li class="nav-item <?php if($key->nama_parent_modul == $title){ echo 'active has-sub open';}?>">
        <a href="<?php echo base_url().$key->link;?>">
          <i class="<?php echo $key->icon;?>"></i><span class="menu-title" data-i18n=""><?php echo $key->nama_parent_modul;?></span>
        </a>
        <?php if ($key->child_module=='Y'):?>
          <ul class="menu-content">
        <?php $childModul = $this->ModulModel->get_modul($key->id_parent_modul);
          foreach ($childModul as $row) {
          ?>
          <?php if (cekModul($row->id_modul) == true): ?>
          <?php if ($row->tampil_sidebar == 'Y'): ?>
          <li class="<?php if($row->nama_modul == $subtitle){ echo 'active';}?>">
            <a class="menu-item" href="<?php echo base_url().$row->link_modul;?>"><?php echo $row->nama_modul;?></a>
          </li>
            <?php endif; ?>
          <?php endif; ?>
        <?php } ?>
          </ul>
        <?php endif; ?>
      </li>
        <?php endif; ?>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
