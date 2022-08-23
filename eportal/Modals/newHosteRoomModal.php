 <!-- BUS MODAL Start -->
   <div class="modal fade" id="hostelRoomModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-hotel fa-1x"></i> Add Room & Bed Space</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="NewHostelRoomsForm">
                     <input type="hidden" name="action" value="create_hostel_room_bedspace_now">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                    <input type="hidden" name="hId" value="<?php echo $hostel_details->hostel_id;?>">
                     <div class="form-group">
                  <label for="hostel_name">HOSTEL</label>
                   <input type="text" autocomplete="off" class="form-control form-control-lg" name="hostel_name" id="hostel_name" value="<?php echo $hostel_details->hostel_desc;?> <?php echo $hostel_details->hostel_type;?> " readonly>
           <!--    <select  class="form-control form-control-lg">
                  <option value="">Choose...</option>
                  <?php //echo $Hostel->getHostelsInDropDownMenu();?>
              </select> -->
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="bus_name">ROOM DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="roomname" placeholder="Enter room description">
                    </div>
                  </div>
                 
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="bed_space">Bed space (No OF BONKS)</label>
                <input type="number" autocomplete="off" min="4" step="1" max="50" class="form-control form-control-lg" name="bed_space" placeholder="e.g 8">
                    </div>
                  </div>
                     <div class="col-md-6">
                   <div class="form-group">
                  <label for="amount_per_session">Bonk price per Term</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="amount_per_session" placeholder="&#8358;55,000.00">
                    </div>
                  </div>
                  
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">AUTHENTICATION CODE</label>
               <input type="password" autocomplete="off" name="auth_code" id="auth_code" class="form-control form-control-lg" placeholder="**********">
                    </div>
                  </div>
                 </div>
                  </div>
                 </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__rooms">
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