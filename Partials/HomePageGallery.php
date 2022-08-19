<section class="event-gallery bg-light">
    <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="550">
        <span class="title">Photo Speaks</span>
        <h2>Life At <?php echo ($Osotech->getConfigData()->school_name);?></h2>
        <div class="divider">
            <span class="fa fa-mortar-board"></span>
        </div>
    </div>
    <div class="autoplay" data-aos="fade-up" data-aos-duration="550">
      <?php $schoolGallery = $Osotech->getGalleryImages();
      if ($schoolGallery) {
        foreach ($schoolGallery as $myslide) {?>
          <div class="gallery-item">
              <img src="eportal/gallery/<?php echo $myslide->image; ?>" class="img-fluid" alt="Event">
              <div class="content d-flex justify-content-between">
                  <h5><?php echo strtoupper($myslide->title);?></h5>
                  <i class="fa fa-chevron-circle-right fa-2x"></i>
              </div>
          </div>
          <?php
        }
      }
      ?>
        <!-- <div>
            <div class="gallery-item">
                <img src="assets/images/event_2.jpg" class="img-fluid" alt="Event">
                <div class="content d-flex justify-content-between">
                    <h5>content</h5>
                    <i class="fa fa-chevron-circle-right fa-2x"></i>
                </div>
            </div>
        </div> -->

    </div>
</section>
