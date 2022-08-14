
<div class="row">
        <div class="col-xl-12 col-md-12">
           <h3>SCHOOL FEE & OTHER LEVIES</h3>
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_paid_today(),2);?></h2>
                  
                </div>
              </div>
            </div>
           
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Term </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_paid_by_term($activeSess->session_desc_name,$activeSess->term_desc),2) ?></h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Outstanding </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_outstanding_by_term($activeSess->session_desc_name,$activeSess->term_desc),2) ?></h2>
                  
                </div>
              </div>
            </div>
          
          </div>
        </div>
    
      </div>
<!-- STUDENTS STATS -->
      <div class="col-xl-12 col-md-12">
        <h3>EXPENSES</h3>
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_today_expenses(),2) ?></h2>
                  
                </div>
              </div>
            </div>
          
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Current Term  </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_expenses_this_term($activeSess->term_desc,$activeSess->session_desc_name),2) ?></h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Current Session </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_expenses_this_session($activeSess->session_desc_name),2) ?></h2>
                  
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
           <h3>SALARIES</h3>
          <div class="row">
         <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Allowances</h3></div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_sum_of_allowances(),2);?></h2>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> TAX (TDS)</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_sum_of_total_tds(),2);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Monthly Salary</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_sum_of_total_salary_payout_monthly(),2);?></h2>
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
           <h3>EXPENDITURE & INCOME</h3>
         
          <div class="row">
          <div class="col-md-6 dashboard-users-white">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis">TOTAL EXPENSE</div>
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
                  <div class="text-white line-ellipsis">TOTAL INCOME</div>
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