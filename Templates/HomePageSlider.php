<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <?php
        $all_sliders = $Osotech->getAllSliders();
        if ($all_sliders) {
          $cnt=0;
            foreach ($all_sliders as $slider) {
              $cnt++;?>
              <?php if ($cnt <= 1): ?>
                  <li data-target="#demo" data-slide-to="<?php echo $cnt;?>" class="active"></li>
                <?php else: ?>
              <li data-target="#demo" data-slide-to="<?php echo $cnt;?>"></li>
              <?php endif; ?>
        <!-- <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li> -->
        <?php
      }
  }
   ?>
    </ul>
    <div class="carousel-inner">
      <?php
        $all_sliders = $Osotech->getAllSliders();
        if ($all_sliders) {
            $cnt=0;
            foreach ($all_sliders as $slider) {
                $cnt++;?>
              <div id="myslidep<?php echo $cnt;?>" class="carousel-item <?php if ($cnt <= 1) {
              echo 'active';
              }else{
                echo '';
              }; ?>">
                  <img src="./eportal/gallery/Sliders/<?php echo $slider->image;?>" alt="education" class="img-fluid">
                  <div class="carousel-caption animated fadeInLeft delay-0.5s" >
                      <h1 class="font-weight-bold" style="text-shadow: 4px 4px solid black !important;"><?php echo $slider->title;?></h1>
                      <h6 class="banner-desc" style=" text-shadow: 4px 4px solid black !important;"><?php echo $slider->slider_desc;?></h6>
                      <a href="javascript:" class="theme-orange btn mt-3 apply-now">Apply Now</a>
                  </div>
              </div>
              <?php
            }
        }
         ?>

    </div>
</div>
