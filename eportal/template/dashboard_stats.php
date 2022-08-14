
<!-- STUDENTS STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">MALE</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_students_by_gender("Male");?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">FEMALE</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_students_by_gender("Female");?></h3>
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-graduation-cap fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">STUDENTS</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_total_visap_students();?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
     <!-- STUDENTS STATS -->

<!-- SCRATCH CARD STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
          <div class="row">
          <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">ADMISSION PINS</div>
                  <h3 class="mb-0 text-white"><?php echo number_format($Pin_serial->count_scratch_pins("tbl_reg_pins"))?></h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">RESULT PINS</div>
                  <h3 class="mb-0 text-white"><?php echo number_format($Pin_serial->count_scratch_pins("tbl_result_pins"))?></h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        
      </div>
    </div>
     <!-- SCRATCH CARD STATS -->


     <!-- INCOME & EXPENSE -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
         
          <div class="row">
          <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">EXPENSE</div>
                  <h3 class="mb-0 text-white">&#8358;<?php echo number_format($Administration->get_all_expenses_this_session($activeSess->session_desc_name),2) ?></h3>
                  <a href="school_expense"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
            
           <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">INCOME</div>
                  <h3 class="mb-0 text-white">&#8358;<?php echo number_format($Administration->get_all_income_this_session($activeSess->session_desc_name),2) ?></h3>
                  <a href="make_payment"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
    </div>
     <!-- INCOME & EXPENSE -->

     <!-- STAFF STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
         
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">NON-TEACHING</div>
                  <h3 class="mb-0 text-white">21</h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-primary">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">TEACHING</div>
                  <h3 class="mb-0 text-white">21</h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">STAFF</div>
                  <h3 class="mb-0 text-white">21</h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
    </div>
     <!-- STAFF STATS -->