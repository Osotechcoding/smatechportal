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
        <div class="carousel-caption animated fadeInLeft delay-0.5s" >
        <h1 class="font-weight-bold" style="text-shadow: 5px 0 7px #ffffff, 0 0 5px #ffffff;"><?php echo $slider->title;?></h1>
        <h6 class="banner-desc" style="text-shadow: 0 0 7px #000000, 0 0 5px #000000;"><?php echo $slider->slider_desc;?></h6>
        <a href="<?php echo ADMISSION_ROOT;?>" class="theme-orange btn mt-3 apply-now" style="text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">Apply Now</a>
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
