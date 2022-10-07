<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="sidenav-links pt-4">
    <a href="./">Home</a>
    <button class="dropdown-btn">About Us
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>about';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Who We Are</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>administrative';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Administrative</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>achievement';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Achievement</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>teachers';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Teachers</a>
    </div>

    <button class="dropdown-btn">Academics
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="dropdown-item" onClick="return window.location.href='<?php echo RESULT_ROOT; ?>';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Online Result</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>prefects';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Prefects</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT; ?>alumni';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Alumni</a>
      <a class="dropdown-item" onClick="return window.location.href='<?php echo ADMISSION_ROOT; ?>';"
        href="javascript:void(0);"><i class="fa fa-caret-right mr-3"></i>Online Registration</a>
    </div>

    <a onClick="return window.location.href='<?php echo APP_ROOT; ?>facilities';"
      href="javascript:void(0);">Facilities</a>
    <a onClick="return window.location.href='<?php echo APP_ROOT; ?>gallery';" href="javascript:void(0);">Gallery</a>
    <a onClick="return window.location.href='<?php echo APP_ROOT; ?>blog';" href="javascript:void(0);">Blog</a>
    <a onClick="return window.location.href='<?php echo APP_ROOT; ?>career';" href="javascript:void(0);">Career</a>
    <a onClick="return window.location.href='<?php echo APP_ROOT; ?>contact';" href="javascript:void(0);">Contact</a>
  </div>
</div>