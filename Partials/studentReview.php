<section class="contact-us mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 contact-us-block">
                    <div class="border-line"></div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 py-5">
                            <h3 class="text-center font-weight-bold">Student Review</h3>
                            <div class="single-item">
                                 <?php //pullmout all the Testimonials by people
                            $all_Testimonials = $Osotech->getAllTestimonials();
                            if ($all_Testimonials) {
                            foreach ($all_Testimonials as $testi) {?>
                             <div class="text-center py-4">
                                    <img src="eportal/testimonials/<?php echo $testi->image;?>" class="img-fluid m-auto d-block rounded-circle" alt="Student" width="100">
                                    <h5 class="mt-3 font-weight-bold"><?php echo ucwords($testi->fullname);?></h5>
                                    <h6><?php echo $testi->message; ?></h6>
                                </div>
                             <?php }

                       } ?>

                    <button class="slick-prev slick-arrow" aria-label="Previous" type="button">
                            Previous</button>
                    <button class="slick-next slick-arrow" aria-label="Next" type="button">Next
                    </button>
                            </div>
                        </div>
                        <div class="col-md-6 hidden-md">
                            <div class="joinus-content theme-orange mx-5" data-aos="zoom-in" data-aos-duration="550">
                                <p class="text-uppercase font-weight-bold mb-0">Join Us</p>
                                <h2 class="font-weight-bold mb-3">Contact the Admin</h2>
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName"
                                               placeholder="Enter Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Purpose</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Enquiry</option>
                                            <option>Admission</option>
                                            <option>External Examination</option>
                                            <option>Career</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn read-more text-white border-white">Send <span class="fa fa-arrow-right"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us -->
    <!-- start join us -->
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="joinus-content theme-orange mx-5 hidden-lg" data-aos="zoom-in" data-aos-duration="550">
                        <p class="text-uppercase font-weight-bold mb-0">Join Us</p>
                                <h2 class="font-weight-bold mb-3">Contact the Admin</h2>
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName"
                                               placeholder="Enter Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Purpose</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Enquiry</option>
                                            <option>Admission</option>
                                            <option>External Examination</option>
                                            <option>Career</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn read-more text-white border-white">Send <span class="fa fa-arrow-right"></span></button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>