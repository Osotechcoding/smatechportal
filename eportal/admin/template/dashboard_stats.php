
<!-- STUDENTS STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
          <h3>Student Info</h3>
          <div class="row">
          <div class="col-md-3 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Day Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->countStudentByType("Day");?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-hotel fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Boarding Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->countStudentByType("Boarding");?></h3>
                </div>
              </div>
            </div>
           <div class="col-md-3 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-hotel fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Male Boarding</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->countStudentTypeByGender("Boarding","Male");?></h3>
                </div>
              </div>
            </div>

            <div class="col-md-3 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-hotel fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Female Boarding</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->countStudentTypeByGender("Boarding","Female");?></h3>
                </div>
              </div>
            </div>

            <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-graduation-cap fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Male Students </div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_students_by_gender("Male");?></h3>
                </div>
              </div>
            </div>

            <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-graduation-cap fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Female Students</div>
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
                  <div class="text-white line-ellipsis">Total Active Students</div>
                  <h3 class="mb-0 text-white"><?php echo $Student->count_total_visap_students();?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
     <!-- STUDENTS STATS -->

     <!-- STAFF STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
          <h3>Staff Info</h3>
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Male Teachers</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_staff_by_gender("Male");?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-child fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Female Teachers</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_staff_by_gender("Female");?></h3>
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-user-plus fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Total Teacher</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_all_staff();?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
     <!-- STAFF STATS -->

<!-- SCRATCH CARD STATS -->
      <div class="col-xl-12 col-sm-12 col-md-12 col-12 dashboard-users">
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-md-12">
           <h3>Scratch Card Info</h3>
          <div class="row">
          <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-credit-card-alt fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Admission Scratch Card</div>
                  <h3 class="mb-0 text-white"><?php echo number_format($Pin_serial->count_scratch_pins("tbl_reg_pins"))?></h3>
                  <a href="regPin"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-credit-card-alt fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Result Checker Scratch Card</div>
                  <h3 class="mb-0 text-white"><?php echo number_format($Pin_serial->count_scratch_pins("tbl_result_pins"))?></h3>
                  <a href="resPin"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
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
         <h3>Income & Expenditure</h3>
          <div class="row">
          <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">EXPENSES</div>
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
                  <div class="text-white line-ellipsis">REVENUE</div>
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
         <h3>Employee Info</h3>
          <div class="row">
          <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-users fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Non-Teaching Staff</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_staff_by_type("Non-Teaching") ?></h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>
           <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-users fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">Teaching Staff</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_staff_by_type("Teaching") ?></h3>
                  <a href="javascript:void(0);"><button type="button" class="btn btn-dark btn-sm round ">View</button></a>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-white">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                   <i class="fa fa-users fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">All Staff</div>
                  <h3 class="mb-0 text-white"><?php echo $Staff->count_all_staff();?></h3>
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