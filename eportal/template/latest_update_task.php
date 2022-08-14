
<div class="col-xl-6 col-md-6 col-12 dashboard-latest-update">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center pb-50">
          <h4 class="card-title">Latest Update</h4>
          <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              2020
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonSec">
              <a class="dropdown-item" href="javascript:;">2020</a>
              <a class="dropdown-item" href="javascript:;">2019</a>
              <a class="dropdown-item" href="javascript:;">2018</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0 pb-1">
          <ul class="list-group list-group-flush">
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-primary m-0">
                    <div class="avatar-content">
                      <i class="bx bxs-user-plus text-primary font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Students</span>
                  <small class="text-muted d-block">Day & Boarding</small>
                </div>
              </div>
              <span>10k</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-danger m-0">
                    <div class="avatar-content">
                      <i class="bx bx-credit-card text-info font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Scratch Card Sales</span>
                  <small class="text-muted d-block">Admission & Result</small>
                </div>
              </div>
              <span>26M</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-danger m-0">
                    <div class="avatar-content">
                      <i class="bx bx-dollar text-danger font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Income</span>
                  <small class="text-muted d-block">All Payment Received</small>
                </div>
              </div>
              <span>15M</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-success m-0">
                    <div class="avatar-content">
                      <i class="bx bx-dollar text-success font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Expenses</span>
                  <small class="text-muted d-block">Running Cost</small>
                </div>
              </div>
              <span>2B</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-primary m-0">
                    <div class="avatar-content">
                      <i class="bx bx-user text-primary font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title"> Staff</span>
                  <small class="text-muted d-block">Teaching & Non Teaching</small>
                </div>
              </div>
              <span>2k</span>
            </li>
            <li
              class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
              <div class="list-left d-flex">
                <div class="list-icon mr-1">
                  <div class="avatar bg-rgba-danger m-0">
                    <div class="avatar-content">
                      <i class="bx bx-edit-alt text-danger font-size-base"></i>
                    </div>
                  </div>
                </div>
                <div class="list-content">
                  <span class="list-title">Total Parents</span>
                </div>
              </div>
              <span>46k</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
     <!-- Task Card Starts -->
    

    <!-- website analyticts -->
     <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title"> Portal Users Analytics (<span class="active text-success">Online</span>)</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-body pb-1">
          <div class="d-flex justify-content-around align-items-center flex-wrap">
            <div class="user-analytics mr-2">
              <i class="fa fa-graduation-cap fa-1x mr-25 align-middle"></i>
              <span class="align-middle text-danger"> Students</span>
              <div class="d-flex">
                <div id="radial-success-chart"></div>
                <h3 class="mt-1 ml-50">50</h3>
              </div>
            </div>
            <div class="sessions-analytics mr-2">
              <i class="fa fa-users fa-1x align-middle mr-25"></i>
              <span class="align-middle text-warning">Parents</span>
              <div class="d-flex">
                <div id="radial-warning-chart"></div>
                <h3 class="mt-1 ml-50">2</h3>
              </div>
            </div>
            <div class="bounce-rate-analytics">
              <i class="fa fa-users fa-1x align-middle mr-25"></i>
              <span class="align-middle text-info"> Staff</span>
              <div class="d-flex">
                <div id="radial-danger-chart"></div>
                <h3 class="mt-1 ml-50">48</h3>
              </div>
            </div>
          </div>
          <div id="analytics-bar-chart" class="my-75"></div>
        </div>
      </div>

    </div>
    <!-- website end -->
  </div>