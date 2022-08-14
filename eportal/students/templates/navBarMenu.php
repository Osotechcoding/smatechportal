
<div class="header-outer">
<div class="header">
<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
<a id="toggle_btn" class="float-left" href="javascript:void(0);">
<img src="assets/img/sidebar/icon-21.png" alt="">
</a>

<ul class="nav float-left">

<li>
<a href="./" class="mobile-logo d-md-block d-lg-none d-block"><img src="<?php echo $Configuration->get_schoolLogoImage();?>" alt="" width="30" height="30"></a>
</li>
</ul>

<ul class="nav user-menu float-right">
 <li class="nav-item dropdown has-arrow">
<a href="#" class=" nav-link user-link" data-toggle="dropdown">
<span class="user-img"><?php if ($student_data->stdPassport ==NULL || $student_data->stdPassport == ""): ?>
    <img src="assets/img/author.jpg" width="35" alt="passport" style="border:2px solid grey;border-radius: 10px;" class="rounded-circle">
<?php else: ?>
    <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="35" alt="passport" style="border:2px solid darkblue;border-radius: 10px;" class="rounded-circle">
<?php endif ?>
<span class="status online"></span></span>
<span><?php echo $_SESSION['STD_USERNAME'];?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="javascript:void(0);">My Profile</a>
<a class="dropdown-item" href="javascript:void(0);">Edit Profile</a>
<a class="dropdown-item" onclick="return confirm('Are you sure you want to Logout of your Account?');" href="logout?action=logout">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right"> 
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="javascript:void(0);">My Profile</a>
<a class="dropdown-item" href="javascript:void(0);">Edit Profile</a>
<a class="dropdown-item" onclick="return confirm('Are you sure you want to Logout of your Account?');" href="logout?action=logout">Logout</a>
</div>
</div>
</div>
</div>