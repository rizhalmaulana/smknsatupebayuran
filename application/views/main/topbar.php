      <!-- start: Header -->
      <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
          <div class="navbar-header" style="width:100%;">
            <div class="opener-left-menu is-open">
              <span class="top"></span>
              <span class="middle"></span>
              <span class="bottom"></span>
            </div>

            <a href="#" class="navbar-brand">
              <b>MASTER SMKN 1 PEBAYURAN</b>
            </a>

            <ul class="nav navbar-nav navbar-right user-nav">
              <li class="user-name"><span><?= $user['email']; ?></span></li>
              <li class="dropdown avatar-dropdown">
                <img src="<?= base_url('assets/'); ?>primary/img/all-user.png" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                <ul class="dropdown-menu user-dropdown">
                  <li><a href="#"><span class="fa fa-user"></span> Data Diri</a></li>
                  <li><a href="<?= base_url('auth/keluar'); ?>"><span class="fa fa-power-off"></span> Keluar</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="more">
                    <ul>
                      <li><a href="#">SMKN 1 PEBAYURAN</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <!-- <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li> -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- end: Header -->