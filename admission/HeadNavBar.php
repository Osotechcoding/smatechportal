<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="<?php echo APP_ROOT; ?>"><img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" class="brand-logo img-fluid" alt="logo" width="50"> <?php echo ($Osotech->getConfigData()->school_name); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo APP_ROOT; ?>" target="_blank">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo EPORTAL_ROOT; ?>" target="_blank"> E-PORTAL</a></li>
                        <li class="nav-item"> <a onclick="return confirm('Are you sure you anto to logout?');"
      href="logout?action=logout&applicant=new"><button class="btn btn-dark" type="button"
        style="color: #fff;">Logout</button></a> </li>
                    </ul>
                </div>
            </div>
        </nav>
             <!-- Header-->
             <header class="bg-danger py-2">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Welcome to student admission portal</h1>
                                <p class="lead fw-normal text-white mb-3">Please carefully read the instruction below on how to apply!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?php echo EPORTAL_ROOT; ?>" target="_blank">Student Portal</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="javascript:void(0);">Purchase Scratch Card</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center mt-5"><img class="img-fluid rounded-3 my-5" src="assets/scratch-Card2.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>