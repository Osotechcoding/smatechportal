<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="<?php echo APP_ROOT; ?>"><img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" class="brand-logo img-fluid" alt="logo"> <?php echo ($Osotech->getConfigData()->school_name); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo APP_ROOT; ?>" target="_blank">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo EPORTAL_ROOT; ?>" target="_blank"> E-PORTAL</a></li>
                        <li class="nav-item"> <a onclick="return confirm('Are you sure you anto to logout?');"
      href="logout?action=logout&student=cstudent"><button class="btn btn-dark" type="button"
        style="color: #fff;">Logout</button></a> </li>
                    </ul>
                </div>
            </div>
        </nav>