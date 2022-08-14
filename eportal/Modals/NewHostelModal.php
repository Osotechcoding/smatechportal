 <!-- BUS MODAL Start -->
   <div class="modal fade" id="addHostelModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-hotel fa-2x"></i> Add New Hostel</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">HOSTEL NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="hostel_name" placeholder="VISAP HOSTEL">
                    </div>
               </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">HOSTEL MASTER</label>
               <select name="hostel_master" id="hostel_master" class="select2 form-control">
                   <option value="">--select--</option>
                   <option value="1">Master Adeola O</option>
                 </select>
                    </div>
                  </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">HOSTEL TYPE</label>
               <select name="hostel_type" id="hostel_type" class="select2 form-control">
                   <option value="">--select type--</option>
                   <option value="boys">Boys Hostel</option>
                   <option value="girl">Girls Hostel</option>
                   <option value="staff">Staff Quarters</option>
                 </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">STATUS</label>
               <select name="hostel_admin" id="hostel_admin" class="select2 form-control">
                   <option value="">--select--</option>
                   <option value="1">Active</option>
                   <option value="2">Inactive</option>
                 </select>
                    </div>
                  </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="d-none d-sm-block">Submit</span>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->