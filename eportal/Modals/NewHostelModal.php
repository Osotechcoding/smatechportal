 <!-- BUS MODAL Start -->
   <div class="modal fade" id="addHostelModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-hotel fa-1x"></i> Add New Hostel</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="NewHostelForm">
                    <input type="hidden" name="action" value="create_new_hostel_now">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="hostel_name">HOSTEL NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="hostel_name" placeholder="Smatech Hostel">
                    </div>
               </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="master">HOSTEL MASTER</label>
               <input type="text" autocomplete="off" name="master" id="master" class="form-control form-control-lg" placeholder="Master Osotech">
                    </div>
                  </div>
                 <!--   <div class="col-md-6">
                     <div class="form-group">
                  <label for="number_of_rooms">No OF ROOMS</label>
               <input type="number" name="number_of_rooms" id="number_of_rooms" class="form-control form-control-lg" placeholder="e.g 5">
                    </div>
                  </div> -->
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="type">HOSTEL TYPE</label>
               <select name="type" id="type" class="form-control form-control-lg">
                   <option value="boys" selected>Boy's Hostel</option>
                   <option value="girls">Girl's Hostel</option>
                 </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">STATUS</label>
               <select name="hostel_status" id="hostel_status" class="form-control form-control-lg">
                   <option value="">--select--</option>
                   <option value="1">Active</option>
                   <option value="0">Inactive</option>
                 </select>
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="auth_code">AUTHENTICATION CODE</label>
               <input type="password" autocomplete="off" name="auth_code" id="auth_code" class="form-control" placeholder="**********">
                    </div>
                  </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__hostel">
                    Submit </button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->