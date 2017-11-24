        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url(); ?>assets/img/myAvatar.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><b><?php echo $username; ?></b></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/img/myAvatar.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $nama; ?> - <?php echo $privilege; ?>
                    <small>Member since <?php echo $daterec;?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>user" class="btn btn-default btn-flat">Ganti Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>auth/logout_act" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        