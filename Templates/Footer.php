<footer class="theme-blue">
    <div class="container">
        <div class="footer-top border-bottom pt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-in" data-aos-duration="1050">
                    <!-- <img src="<?php //echo $Osotech->get_schoolLogoImage();?>" width="60px" class="img-fluid"> -->
                    <a href="./" class="text-center"><span class="color-orange navbar-brand fw-bold" style="font-size: 23px;"><?php echo ($Osotech->getConfigData()->school_short_name);?></span></a>
                    <p><?php echo ($Osotech->getConfigData()->school_name);?></p>
                    <ul class="social-icon">
                        <li><a href="javascript:"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="javascript:"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="javascript:"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:"><i class="fa fa-skype"></i></a></li>
                        <li><a href="javascript:"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="javascript:"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6" data-aos="fade-in" data-aos-duration="550">
                    <h5 class="font-weight-bold mb-3">Quick Links</h5>
                    <ul>
                        <li><a href="./"><i class="fa fa-angle-double-right mr-2"></i>Home</a></li>
                        <li><a href="./about"><i class="fa fa-angle-double-right mr-2"></i>About Us</a></li>
                        <li><a href="<?php echo ADMISSION_ROOT; ?>"><i class="fa fa-angle-double-right mr-2"></i>Online Registration</a></li>
                        <li><a href="<?php echo RESULT_ROOT; ?>"><i class="fa fa-angle-double-right mr-2"></i>Online Result</a></li>
                        <li><a href="./career"><i class="fa fa-angle-double-right mr-2"></i>Career</a></li>
                        <li><a href="<?php echo EPORTAL_ROOT;?>" target="_blank"><i class="fa fa-angle-double-right mr-2"></i>e-Portal</a></li>
                        <li><a href="<?php echo OSO_DOCUMENTATION_ROOT;?>" target="_blank"><i class="fa fa-angle-double-right mr-2"></i>Documentation</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-md-5 mb-4" data-aos="fade-in" data-aos-duration="1050">
                    <h5 class="font-weight-bold mb-3">Recent News</h5>
                    <div class="row">
                      <?php
            $all_blogs_posted = $Osotech->show_all_recent_active_blogs_post();
            if ($all_blogs_posted) {
            foreach ($all_blogs_posted as $value) {?>
                        <div class="col-md-4 col-sm-2 col-2 mb-2 pr-0">
                            <img src="<?php echo EPORTAL_ROOT;?>news-images/<?php echo $value->blog_image;?>" class="img-fluid" alt="News-Image">
                        </div>
                        <?php
            }
            }?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pl-lg-5  mb-md-5" data-aos="fade-in" data-aos-duration="1050">
                    <h5 class="font-weight-bold mb-3">Contact Us</h5>
                    <ul class="address-icon">
                        <li class="mb-3"><i class="fa fa-map-marker mr-3 color-orange"></i><?php echo ($Osotech->getConfigData()->school_address);?>,
                          <?php echo ($Osotech->getConfigData()->school_city);?>, <?php echo ($Osotech->getConfigData()->school_state);?>, <?php echo ($Osotech->getConfigData()->country);?>.</li>
                        <li class="mb-3"><i class="fa fa-phone mr-3 color-orange"></i><?php echo ($Osotech->getConfigData()->school_phone);?>, <?php echo ($Osotech->getConfigData()->school_fax);?></li>
                        <li class="mb-3"><i class="fa fa-envelope color-orange mr-3"></i><?php echo ($Osotech->getConfigData()->school_email);?></li>
                        <li class="mb-3"><i class="fa fa-briefcase color-orange mr-3"></i> Mon - Thur : 7:30 - 4:00 pm</li>
                        <li class="mb-3"><i class="fa fa-briefcase color-orange mr-3"></i>Fri : 7:30 - 1:00 pm </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-footer py-3 d-flex justify-content-between">
            <p class="mb-0">All Rights Reserved by <?php echo ($Osotech->getConfigData()->school_name);?>.</p>
            <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="javascript:void(0)">Terms</a></li>
                <li class="list-inline-item"><a href="javascript:">Policy</a></li>
                <li class="list-inline-item"><a href="javascript:"><span class="color-orange">Developer:</span> <?php echo __OSO_DEV_COMPANY__; ?></a></li>
            </ul>
        </div>
    </div>
</footer>
