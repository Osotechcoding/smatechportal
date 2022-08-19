<header class="main-header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="./">
                <img src="<?php echo $Osotech->get_schoolLogoImage();?>" width="60px" class="img-fluid" alt="SmatechHome">
            </a><span class="navbar-brand text-black fw-bold" style="color:black"><?php echo (__OSO_APP_NAME__);?></span>
            <span class="navbar-toggler">
                <i class="ti-align-left" onclick="openNav()"></i>
            </span>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" onClick="return window.location.href='<?php echo APP_ROOT;?>';" href="javascript:void(0)">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>about';" href="javascript:void(0);">Who We Are</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>administrative';" href="javascript:void(0);">Administrative</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>achievement';" href="javascript:void(0);">Achievement</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>teachers';" href="javascript:void(0);">Teachers</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Academics
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo RESULT_ROOT;?>';" href="javascript:void(0);">Online Result</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>prefects';" href="javascript:void(0);">Prefects</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo APP_ROOT;?>alumni';" href="javascript:void(0);">Alumni</a>
                            <a class="dropdown-item" onClick="return window.location.href='<?php echo ADMISSION_ROOT;?>';" href="javascript:void(0);">Online Registration</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  onClick="return window.location.href='<?php echo APP_ROOT;?>facilities';" href="javascript:void(0);">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  onClick="return window.location.href='<?php echo APP_ROOT;?>gallery';" href="javascript:void(0);">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  onClick="return window.location.href='<?php echo APP_ROOT;?>blog';" href="javascript:void(0);">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  onClick="return window.location.href='<?php echo APP_ROOT;?>career';" href="javascript:void(0);">Career</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  onClick="return window.location.href='<?php echo APP_ROOT;?>contact';" href="javascript:void(0);">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
