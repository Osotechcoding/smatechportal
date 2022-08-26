 <!-- BUS MODAL Start -->
   <div class="modal fade" id="asignBedSpaceNodal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-hotel fa-1x"></i> Assign Bed Space to Student</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="hostelAssignForm">
                     <input type="hidden" name="action" value="assign_bedspace_to_occupant">
                     <input type="hidden" name="hidden_id" id="hide_bonk_id">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="show_bonk_info">BONK SPACE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="bed_space" id="show_bonk_info" readonly>
                    </div>
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="total_price">PRICE (Per Session)</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="pricePeryear" id="total_price" readonly>
                    </div>
                  </div>
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="student_occupant">Student Name</label>
              <select name="occupant_id" id="student_occupant" class="select2 form-control form-control-lg">
                  <option value="">Choose...</option>
                  <?php echo $Student->getBoardingStudentInDropDownList();?>
              </select>
                    </div>
                  </div>
                   
                 <div class="col-md-6">
                   <div class="form-group">
                  <label for="duration">Booking Duration</label>
                <select name="duration" id="duration" class="form-control form-control-lg">
                  <?php echo $Administration->get_all_session_lists();?>
              </select>
                    </div>
                  </div>

                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="amount_paid">Amount Paid</label>
                <input type="number" autocomplete="off" class="form-control form-control-lg" name="amount_paid" id="amount_paid" placeholder="&#8358;55,000.00">
                    </div>
                  </div>

                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="expiry_date">Payment Expire Date</label>
               <input type="date" autocomplete="off" name="expiry_date" min="2022-01-01" id="expiry_date" class="form-control form-control-lg">
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
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__bed_assigned">
                    Submit & Assign </button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->