<!-- modal-dialog-scrollable -->
   <div class="modal fade" id="editSchoolBusModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-1x"></i> Update School Bus Details</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="editSchoolBusModalForm">
                  <input type="hidden" name="action" value="submit_edited_vehicle_details">
                  <input type="hidden" name="bushiddenId" id="bushiddenId">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="busName">Vehicle Desc</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="busName" id="busName">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="busNumber">Number Plate</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="busNumber" id="busNumber">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="busCapacity">Vehicle Capacity</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="busCapacity" id="busCapacity">
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="auth_code">Authentication Code</label>
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*******">
                    </div>
                  </div>
              
                 </div>
                  </div>
                 
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark btn-lg ml-1 __loadingBtn__bus_edit">Save Changes</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->