<div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    <div id="left-menu">
        <div class="sub-left-menu scroll">
            <ul class="nav nav-list">
                <li>
                    <div class="left-bg"></div>
                </li>
                <li class="time">
                    <h1 class="animated fadeInLeft">21:00</h1>
                    <p class="animated fadeInRight">Sat,October 1st 2029</p>
                </li>
                <!-- QUERY AKSES -->
                <?php
                      $role_id = $this->session->userdata('role_id');
                      $queryAkses = "SELECT `user_menu`.`id`,`menu`
                                    FROM `user_menu` JOIN `user_access_menu` 
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`role_id` = $role_id
                                    "; 
                      $akses = $this->db->query($queryAkses)->result_array();
                    ?>

                <?php foreach($akses as $m) : ?>

                <!-- QUERY AKSES -->
                <?php 
                      $menuId = $m['id'];
                      $queryMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu` 
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1
                                    ";

                      $subMenu = $this->db->query($queryMenu)->result_array(); 
                    ?>

                <?php foreach($subMenu as $sm) : ?>

                <li class="active">
                    <a href="<?= base_url($sm['url']); ?>"><span class="<?= $sm['icon']; ?>"></span>
                        <?= $sm['judul']; ?></a>
                </li>
                <?php endforeach; ?>

                <?php endforeach; ?>
                <li><a href="<?= base_url('auth/keluar'); ?>"><span class="fa fa-power-off"></span> Keluar</a></li>
            </ul>
        </div>
    </div>
    <!-- end: Left Menu -->