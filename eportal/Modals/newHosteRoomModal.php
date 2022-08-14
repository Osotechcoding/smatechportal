 <!-- BUS MODAL Start -->
   <div class="modal fade" id="hostelRoomModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-hotel fa-2x"></i> Add Room & Bed Space</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">HOSTEL DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="VISAP HOSTEL" readonly>
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">HOSTEL TYPE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="price" placeholder="Male Hostel" readonly>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">ROOM NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_name" placeholder="Room One">
                    </div>
                  </div>
                 
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="bus_capacity">BED SPACE (No OF BONKS)</label>
                <input type="number" autocomplete="off" min="4" step="1" class="form-control form-control-lg" name="bus_capacity" placeholder="45">
                    </div>
                  </div>
                     <div class="col-md-6">
                   <div class="form-group">
                  <label for="bus_capacity">PRICE PER SPACE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bus_capacity" placeholder="&#8358;55,000.00">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">ROUTE STATUS </label>
               <select name="route_status" id="route_status" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="act">Active</option>
                 <option value="not_act">Not Active</option>
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