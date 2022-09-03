<!-- Slider main container -->
<div class="swiper-container">
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
     <?php
        $all_sliders = $Osotech->getAllSliders();
        if ($all_sliders) {
            $cnt=0;
            foreach ($all_sliders as $slider) {
                $cnt++;?>

    <div class="swiper-slide"><img src="./eportal/gallery/Sliders/<?php echo $slider->image;?>" alt="education" class="img-fluid">
        <div class="carousel-caption animated fadeInLeft delay-0.5s">
        <h1 class="font-weight-bold"><?php echo $slider->title;?></h1>
        <h6 class="banner-desc"><?php echo $slider->slider_desc;?></h6>
        <a href="<?php echo ADMISSION_ROOT;?>" class="theme-orange btn mt-3 apply-now">Apply Now</a>
    </div>
    </div>
    <?php
            }
        }
         ?>
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>
</div>
