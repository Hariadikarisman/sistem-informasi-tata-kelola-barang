<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div><i class="fas fa-search"></i></div>
    <div class="sidebar-brand-text mx-3" >Lostandfound </div>
  </a>
  
  <hr class="sidebar-divider">

<!-- query menu-->
<?= 
  $role_id = user()['role_id']; 
    $queryMenu = "SELECT `menu_user`.`id`, `menu` 
                  FROM `menu_user` 
                  JOIN `user_access_menu` 
                  ON `menu_user`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  "; 

    $menu = $this->db->query($queryMenu)->result_array();   
?>

<!-- looping menu -->
<div data-parent="#accordionSidebar">
<?php foreach ($menu as $m) : ?>
  <div class="sidebar-heading">
    <?= $m['menu']; ?>
  </div>
</div>

<!-- submenu sesuai menu -->
<div  data-parent="#accordionSidebar">
<?php 
    $menuId = $m['id'];
    $querySubMenu = "SELECT *
    FROM `submenu_user` 
    JOIN `menu_user` 
    ON `submenu_user`.`menu_id` = `menu_user`.`id`
    WHERE `submenu_user`.`menu_id` = $menuId
    AND `submenu_user`.`is_active` = 1
    ";

    $subMenu = $this->db->query($querySubMenu)->result_array();
?>
</div>

<div  data-parent="#accordionSidebar">
<?php foreach($subMenu as $sm) : ?>
  <?php if ($judul == $sm['judul']) : ?>
    <li class="nav-item active">
      <?php else : ?>
        <li class="nav-item">
          <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']?>"></i>
              <span><?= $sm['judul']; ?></span>
            </a>
        </li>
    </li>
<?php endforeach; ?>
    <hr class="sidebar-divider mt-3">
<?php endforeach; ?>
</div>

<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>

<!-- End of Sidebar -->
