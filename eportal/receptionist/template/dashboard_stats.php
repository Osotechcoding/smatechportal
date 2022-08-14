 <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_today_visitors();?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Week</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Visitor->get_this_week_visitors();?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> This Term</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_current_term_visitors(); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Session</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_current_session_visitors(); ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>