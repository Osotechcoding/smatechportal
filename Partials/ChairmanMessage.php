<section class="about-us" data-aos="fade-up" data-aos-duration="950">
  <div class="container">
    <div class="about-box pb-3">
      <!-- <i class="fa fa-mortar-board"></i> -->
      <img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" width="100" class="img-fluid"
        style="border-radius: 50%;">
    </div>
    <h5 data-aos="fade-up" data-aos-duration="1050">Chairman Message</h5>
    <h3 class="font-weight-bold pb-3 px-5 mb-0" data-aos="fade-up" data-aos-duration="1050">Education develop a passion
      for learning.If you do, you will never cease to grow.</h3>
    <p class="pt-3 bottom-line" style="font-size: 18px;"><?php echo nl2br($Osotech->getConfigData()->school_history); ?>
    </p>


    <h5 class="pt-3"><?php echo ($Osotech->getConfigData()->school_director); ?></h5>
    <p>Founrder & Chairman</p>
    <div class="button-box">
      <a href="./about" class="left-btn">More About Us</a>
      <a href="./contact" class="right-btn">Contact Us</a>
    </div>
  </div>
</section>