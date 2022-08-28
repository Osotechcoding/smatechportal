<section class="events text-center">
    <div class="container-fluid">
        <div class="sec-title text-center" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">What Client Say about us !</span>
            <h2>Here is some client comments to us.</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <div class="center">

          <?php //pullmout all the Testimonials by people
          $all_Testimonials = $Osotech->getAllTestimonials();
                     if ($all_Testimonials) {
                         foreach ($all_Testimonials as $testi) {?>
                           <div class="card m-2">
                               <div class="client-block p-3"  data-aos="zoom-in" data-aos-duration="1000">
                                   <div class="media p-3 align-items-center">
                                       <img src="eportal/testimonials/<?php echo $testi->image;?>"  class="mr-3 rounded-circle">
                                       <div class="media-body text-left">
                                           <h6 class="color-orange font-weight-bold mb-0"><?php echo ucwords($testi->fullname);?></h6>
                                           <p class="mb-0"><?php echo $testi->job;?></p>
                                       </div>
                                   </div>
                                   <p class="pl-3 pr-3 text-left"> <b class="text-danger">Says: &raquo;</b> <?php echo $testi->message; ?></p>
                               </div>
                           </div>
                         <?php }

                       } ?>


            <!-- <div class="card  m-2">
                <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media p-3 align-items-center">
                        <img src="assets/images/2.png" alt="John Doe" class="mr-3 rounded-circle">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-0">John Doe</h6>
                            <p class="mb-0">Lorem ipsum...</p>
                        </div>
                    </div>
                    <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>

            <div class="card  m-2 ">
                <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media p-3 align-items-center">
                        <img src="assets/images/3.png" alt="Jenny Doe" class="mr-3 rounded-circle">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-0">Jenny Doe</h6>
                            <p class="mb-0">Lorem ipsum...</p>
                        </div>
                    </div>
                    <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>

            <div class="card m-2">
                <div class="client-block p-3"  data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media p-3 align-items-center">
                        <img src="assets/images/1.png" alt="Rony Devis" class="mr-3 rounded-circle">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-0">Rubby Devis</h6>
                            <p class="mb-0">Lorem ipsum...</p>
                        </div>
                    </div>
                    <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>

            <div class="card  m-2">
                <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media p-3 align-items-center">
                        <img src="assets/images/2.png" alt="John Doe" class="mr-3 rounded-circle">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-0">John Doe</h6>
                            <p class="mb-0">Lorem ipsum...</p>
                        </div>
                    </div>
                    <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>

            <div class="card  m-2 ">
                <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="media p-3 align-items-center">
                        <img src="assets/images/3.png" alt="Jenny Doe" class="mr-3 rounded-circle">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-0">Jenny Doe</h6>
                            <p class="mb-0">Lorem ipsum...</p>
                        </div>
                    </div>
                    <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div> -->
        </div>
    </div>
</section>
