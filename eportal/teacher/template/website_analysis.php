<!-- website analyticts -->
     <div class="col-xl-4 col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title"> Portal Users (<span class="active text-success">Online</span>)</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-1">
          <div class="d-flex justify-content-around align-items-center flex-wrap">
            <div class="user-analytics mr-2">
              <i class="fa fa-graduation-cap fa-1x mr-25 align-middle"></i>
              <span class="align-middle text-danger"> Students</span>
              <div class="d-flex">
                <div id="radial-success-chart"></div>
                <h3 class="mt-1 ml-50"><?php echo $Student->count_all_online_students();?></h3>
              </div>
            </div>
           
            <div class="bounce-rate-analytics">
              <i class="fa fa-users fa-1x align-middle mr-25"></i>
              <span class="align-middle text-info"> Staff</span>
              <div class="d-flex">
                <div id="radial-danger-chart"></div>
                <h3 class="mt-1 ml-50"><?php echo $Staff->count_all_online_staff();?></h3>
              </div>
            </div>
          </div>
          <div id="analytics-bar-chart" class="my-75"></div>
        </div>
      </div>

    </div>
    <!-- website end -->
 
        <!-- website analyticts -->
     <div class="col-xl-8 col-md-8 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title"> <?php echo strtoupper($SmappDetails->school_name);?> Students </h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-1">
          <div class="d-flex justify-content-around align-items-center flex-wrap">
            <div class="user-analytics mr-2">
              <i class="fa fa-graduation-cap fa-1x mr-25 align-middle"></i>
              <span class="align-middle text-danger"> Male  </span>
              <div class="d-flex">
                <div id="radial-success-chart"></div>
                <h3 class="mt-1 ml-50"><?php echo $Student->count_students_by_gender("Male");?></h3>
              </div>
            </div>
            <div class="sessions-analytics mr-2">
              <i class="fa fa-users fa-1x align-middle mr-25"></i>
              <span class="align-middle text-warning"> Female </span>
              <div class="d-flex">
                <div id="radial-warning-chart"></div>
                <h3 class="mt-1 ml-50"><?php echo $Student->count_students_by_gender("Female");?></h3>
              </div>
            </div>
            <div class="bounce-rate-analytics">
              <i class="fa fa-users fa-1x align-middle mr-25"></i>
              <span class="align-middle text-info"> Total Students</span>
              <div class="d-flex">
                <div id="radial-danger-chart"></div>
                <h3 class="mt-1 ml-50"><?php echo $Student->count_total_visap_students();?></h3>
              </div>
            </div>
          </div>
          <div id="analytics-bar-chart" class="my-75"></div>
        </div>
      </div>

    </div>
    <!-- website end -->

    