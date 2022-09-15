<section class="online-course">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sec-title">
                        <span class="title"> Principal DESK</span>
                        <h2>Welcome to <?php echo ($Osotech->getConfigData()->school_name);?></h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board fa-2x"></span>
                        </div>
                    </div>
                    <p class="p-17"><?php echo nl2br($Osotech->getConfigData()->principal_welcome);?></p>
                    
                    <button type="button" class="btn theme-orange theme-btn my-2 join-us">Enroll Your Ward(s) Now</button>
                </div>
                <div class="col-lg-6">
                    <div class="course-block  d-flex justify-content-between bg-light pa-2 mx-5 my-3" data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/promotion.png" class="img-fluid m-auto" alt="Key Of Success">
                        <div class="course-text pl-5">
                            <h4>Key Of Success</h4>
                            <p><?php echo nl2br($Osotech->getConfigData()->key_of_success);?></p>
                        </div>
                    </div>
                    <div class="course-block  d-flex justify-content-between theme-blue pa-2 mx-5 my-3"
                         data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/online-class.png" class="img-fluid m-auto" alt="Our Philosophy">
                        <div class="course-text pl-5">
                            <h4>Our Philosophy</h4>
                            <p><?php echo nl2br($Osotech->getConfigData()->our_philosophy);?></p>
                        </div>
                    </div>
                    <div class="course-block  d-flex justify-content-between theme-orange pa-2 mx-5 mt-3"
                         data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/feminism.png" class="img-fluid m-auto" alt="Our Principle">
                        <div class="course-text pl-5">
                            <h4>Our Principle</h4>
                            <p><?php echo nl2br($Osotech->getConfigData()->our_principle);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>