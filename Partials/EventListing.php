<section class="event-listing">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="about-img mb-5">
          <div class="img_1 aos-init aos-animate d-block m-auto" data-aos="zoom-in" data-aos-duration="550">
            <div class="border-line"></div>
            <img src="assets/images/playground.jpg" class="img-fluid" alt="About">
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="sec-title" data-aos="fade-up" data-aos-duration="550">
          <span class="title">Events</span>
          <h2>Upcoming Events</h2>
          <div class="divider">
            <span class="fa fa-mortar-board"></span>
          </div>
          <?php $allEvents = $Osotech->get_all_active_events();
                    if ($allEvents) {
                        $ccnt = 0;
                        foreach ($allEvents as $event) {
                            $ccnt++; ?>
          <div class="event-block d-flex my-3" data-aos="fade-up" data-aos-duration="550">
            <h2 class="font-weight-bold color-orange mr-3"><?php echo $ccnt; ?>.</h2>
            <div class="event-info">
              <h5 class="color-blue">
                <a href="javascript:">
                  <?php echo ucwords($event->event_title); ?>
                </a>
              </h5>
              <p class="color-orange"><?php echo ucwords($event->event_detail); ?></p>
              <ul class="pl-0">
                <li class="pr-3">
                  <i class="ti-calendar pr-2"></i>
                  <span><?php echo date("D jS M, Y", strtotime($event->edate)) ?></span>
                </li>
                <li class="pr-3">
                  <i class="ti-alarm-clock pr-2"></i>
                  <span><?php echo date("h:i:s a", strtotime($event->etime)) ?></span>
                </li>
                <li class="pr-3">
                  <i class="ti-location-arrow pr-2"></i>
                  <span><?php echo $event->evenue; ?></span>
                </li>
              </ul>
            </div>
          </div>
          <?php
                        }
                    } else {
                        echo '<div class="alert alert-danger text-center"> <p style="font-size:20px; margin:10px 5px"> Sorry :) No upcoming event at the moment!</p></div>';
                    } ?>


        </div>
      </div>
</section>