<div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-users fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Drivers</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Bus->countDataByTableColumn("visap_driver_tbl","dId"); ?></h2>
                  <a href="./bus_driver"><button type="button" class="badge badge-pill badge-light badge-sm">View</button></a>
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-bus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Vehicles</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Bus->countDataByTableColumn("visap_bus_tbl","busId"); ?></h2>
                   <a href="./create_bus"><button type="button" class="badge badge-pill badge-light badge-sm">View</button></a>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-braille fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Routes</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Bus->countDataByTableColumn("visap_routes_tbl","id"); ?></h2>
                   <a href="./bus_route"><button type="button" class="badge badge-pill badge-light badge-sm">View</button></a>
                  
                </div>
              </div>
            </div>

            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Assign Bus</h3></div>
                  <h2 class="text-white mb-0">Student</h2>
                   <a href="./student_n_bus"><button type="button" class="badge badge-pill badge-light badge-sm">Assign</button></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>