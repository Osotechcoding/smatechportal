 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="./">
          <h2 class="brand-text mb-0"><?php echo __OSO_APP_NAME__; ?></h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
          <li class="active"><a class="d-flex align-items-center" href="./"><i class="fa fa-desktop fa-1x"></i><span class="menu-item text-truncate" data-i18n="Dashboard"><?php echo $lang['Dashboard'] ?></span></a>
              </li>
          <li class="navigation-header text-truncate"><span data-i18n="Visitors">Visitor Management</span>
          </li>
           <li class="nav-item"><a href="visitor_book"><i class="fa fa-calendar fa-1x"></i><span class="menu-title text-truncate" data-i18n="Visitors">Visitor's Book</span></a>
          </li>
           <li><a class="d-flex align-items-center" href="visitor_logs"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Subject">Search Visitor</span></a>
              </li>
               <li class="navigation-header text-truncate"><span data-i18n="Visitors">Event Management</span>
          </li>
          <li><a class="d-flex align-items-center" href="add_event"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Event"> Events</span></a> </li>
                <li><a class="d-flex align-items-center" href="add_holidays"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Holiday"> Holidays</span></a> </li>
                <li><a class="d-flex align-items-center" href="account-settings"><i class="fa fa-edit"></i><span class="menu-item text-truncate">Edit Profile</span></a>
              </li>
              <li>
                <a class="d-flex align-items-center" onclick=" return confirm('<?php echo $lang["logout-sure?"];?>');" href="logout?action=logout"><i class="fa fa-power-off"></i>
                  <span class="menu-item text-truncate"> <?php echo $lang['Logout'] ?></span></a>
               
              </li>
        </ul>
      </div>
    </div>