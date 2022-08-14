<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<div class="header-left">
<a href="./" class="logo">
<img src="<?php echo $Configuration->get_schoolLogoImage();?>" width="60" height="60" alt="">
<span class="text-uppercase"><?php echo __OSO_APP_NAME__; ?></span>
</a>
</div>
<ul class="sidebar-ul">
<li class="menu-title">Menu</li>
<li class="active">
<a href="./"><img src="assets/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a>
</li>
<li class="submenu">
<a href="#"><img src="assets/img/sidebar/icon-3.png" alt="icon"> <span> Academics</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="subject_reg"><span> My Subjects</span></a></li>
 <li><a href="assessment"><span> Performance</span></a></li> 
<!-- <li><a href="classnotes"><span>Classnotes</span></a></li> -->
<li><a href="weeklyAssignment"><span> Assignments</span></a></li>
<li><a href="submittedAssignments"><span>Submitted Assignments</span></a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-chart-line"></i> <span> Report Sheet</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="checkMyResult"><span>Check My Result</span></a></li>
 <!-- <li><a href="javascript:void(0);"><span> 2nd Term Report</span></a></li> 
<li><a href="javascript:void(0);"><span>3rd Term Report</span></a></li> --> 
</ul>
</li>
<li class="submenu">
<a href="#"><img src="assets/img/sidebar/icon-4.png" alt="icon"> <span> Online Classroom</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="virtual_classroom"><span>Online Class</span></a></li>
</ul>
</li>

<!-- <li class="submenu">
<a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span>School Activity</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li>
<a href="holidays.html"> <span>Holidays</span></a>
</li>
</ul>
</li> -->
<li class="submenu">
<a href="#"><img src="assets/img/sidebar/icon-10.png" alt="icon"><span> Fees </span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<li><a href="payments"><span>Payments History</span></a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><img src="assets/img/sidebar/icon-2.png" alt="icon"> <span>My Profile</span> <span class="menu-arrow"></span></a>
<ul class="list-unstyled" style="display: none;">
<!-- <li><a href="myprofile"><span>View Profile</span></a></li> -->
<!-- <li><a href="javascript:void(0);"><span>Edit Profile</span></a></li>
<li><a href="javascript:void(0);"><span>Print Slip</span></a></li> -->
<li><a href="change-password"><span>Change Password</span></a></li>
</ul>
</li>
<li class="list-item"><a onclick="return confirm('Are you sure you want to Logout of your Account?');" href="./logout?action=logout" style="text-decoration:none;color: darkred;font-weight: bold;"><span class="btn btn-danger btn-sm">Logout</span></a></li>
</ul>
</div>
</div>
</div>