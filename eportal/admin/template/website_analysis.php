<!-- website analyticts -->
<!-- <div class="col-xl-6 col-md-6 col-sm-12">
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title"> Library Analytics (Books)</h4>
      <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
    </div>
    <div class="card-body pb-1">
      <div class="d-flex justify-content-around align-items-center flex-wrap">
        <div class="user-analytics mr-2">
          <i class="bx bx-book mr-25 align-middle"></i>
          <span class="align-middle text-muted"> Books</span>
          <div class="d-flex">
            <div id="radial-success-chart"></div>
            <h3 class="mt-1 ml-50">50</h3>
          </div>
        </div>
        <div class="sessions-analytics mr-2">
          <i class="bx bx-book-open align-middle mr-25"></i>
          <span class="align-middle text-muted">Borrowed</span>
          <div class="d-flex">
            <div id="radial-warning-chart"></div>
            <h3 class="mt-1 ml-50">2</h3>
          </div>
        </div>
        <div class="bounce-rate-analytics">
          <i class="bx bx-book align-middle mr-25"></i>
          <span class="align-middle text-muted"> Available</span>
          <div class="d-flex">
            <div id="radial-danger-chart"></div>
            <h3 class="mt-1 ml-50">48</h3>
          </div>
        </div>
      </div>
      <div id="analytics-bar-chart" class="my-75"></div>
    </div>
  </div> 

</div> -->
<!-- website end -->
<!-- website analyticts -->
<div class="col-xl-12 col-md-12 col-sm-12">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title">Hostel Analytics</h4>
      <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
    </div>
    <div class="card-body pb-1">
      <div class="d-flex justify-content-around align-items-center flex-wrap">
        <div class="user-analytics mr-2">
          <i class="bx bx-hotel mr-25 align-middle"></i>
          <span class="align-middle text-muted">Total Hostel</span>
          <div class="d-flex">
            <div id="radial-success-chart"></div>
            <h3 class="mt-1 ml-50">
              <?php echo number_format($Hostel->countDataByTableColumn("visap_hostel_tbl", "hostel_id")); ?></h3>
          </div>
        </div>
        <div class="sessions-analytics mr-2">
          <i class="bx bx-bed align-middle mr-25"></i>
          <span class="align-middle text-muted">Total Rooms</span>
          <div class="d-flex">
            <div id="radial-warning-chart"></div>
            <h3 class="mt-1 ml-50">
              <?php echo number_format($Hostel->countDataByTableColumn("visap_hostel_rooms_tbl", "roomId")); ?></h3>
          </div>
        </div>
        <div class="bounce-rate-analytics">
          <i class="bx bx-bed align-middle mr-25"></i>
          <span class="align-middle text-muted">Total Bedspace</span>
          <div class="d-flex">
            <div id="radial-danger-chart"></div>
            <h3 class="mt-1 ml-50">
              <?php echo number_format($Hostel->countDataByTableColumn("visap_bed_space_tbl", "bedId")); ?></h3>
          </div>
        </div>
        <div class="bounce-rate-analytics">
          <i class="bx bx-bed align-middle mr-25"></i>
          <span class="align-middle text-muted">Available Bedsapce</span>
          <div class="d-flex">
            <div id="radial-danger-chart"></div>
            <h3 class="mt-1 ml-50"><?php echo number_format($Hostel->countBedByStatus(1)); ?></h3>
          </div>
        </div>
      </div>
      <div id="analytics-bar-chart" class="my-75"></div>
    </div>
  </div>
</div>
<!-- website end -->