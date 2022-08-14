<div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link clock"><i class="fas fa-clock fa-1x dark"></i><span id="displayTime" class="text-danger" style="font-size: 21px;font-weight: 500;"></span></a>
                  <div class="bookmark-input search-input">
                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Visap..." tabindex="0" data-search="template-search">
                    <ul class="search-list"></ul>
                  </div>
                </li>
              </ul>
            </div>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon <?php echo ($_SESSION['lang']==='en')? 'flag-icon-us':'flag-icon-ng';?>"></i><span class="selected-language"><?php echo $_SESSION['language']; ?></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="?lang=yor" data-language="yor"><i class="flag-icon flag-icon-ng mr-50"></i> Yoruba</a><a class="dropdown-item" href="?lang=hausa" data-language="hausa"><i class="flag-icon flag-icon-ng mr-50"></i> Hausa</a><a class="dropdown-item" href="?lang=igbo" data-language="igbo"><i class="flag-icon flag-icon-ng mr-50"></i> Igbo</a><a class="dropdown-item" href="?lang=en" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i> English</a></div>
              </li>
              <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li> -->
              <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
                <div class="search-input">
                  <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                  <input class="input" type="text" placeholder="Explore Visap..." tabindex="-1" data-search="template-search">
                  <div class="search-input-close"><i class="bx bx-x"></i></div>
                  <ul class="search-list"></ul>
                </div>
              </li>
             
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                  <div class="user-nav d-sm-flex d-none"><span class="user-name"><?php echo strtoupper($_SESSION['STAFF_USERNAME']); ?></span><span class="user-status text-success"><?php echo $lang['Online'] ?></span></div><span><img class="round" src="../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span></a>
                <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="account-settings"><i class="bx bx-user mr-50"></i>  <?php echo $lang['Edit Profile'] ?></a>
                  <div class="dropdown-divider mb-0"></div><a class="dropdown-item text-danger" onclick=" return confirm('<?php echo $lang["logout-sure?"];?>');" href="logout?action=logout"><i class="bx bx-power-off mr-50"></i> <?php echo $lang['Logout'] ?></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>