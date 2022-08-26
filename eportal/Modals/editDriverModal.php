<!-- BUS MODAL Start -->
    <!-- modal-dialog-scrollable -->
   <div class="modal fade" id="EditbusDriverModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-bus fa-1x"></i> Update Driver's Details</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="editDriverModalForm">
                  <input type="hidden" name="action" value="submit_edited_driver_details">
                  <input type="hidden" name="dhiddenId" id="dhiddenId">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="dname">DRIVER'S NAME </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="dname" placeholder="Adekola Oni Samuel" id="dname">
                    </div>
                  </div>
                     
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="demail">DRIVER'S EMAIL ADDRESS</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="demail" placeholder="expert_driver@visap.edu.ng" id="demail" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="dphone">DRIVER'S PHONE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="dphone" placeholder="081***43452" id="dphone">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="dlicense_no">DRIVER'S LICENSE ID </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="dlicense_no" readonly id="mydriver_license">
                </div>
              </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="daddress">RESIDENTIAL ADDRESS</label>
                  <textarea placeholder="e.g xyz street, Sango Ota Ogun State" name="daddress" id="daddress" class="form-control form-control-lg"></textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">Authentication Code </label>
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="***********">
                </div>
              </div>
                 
                 </div>

                  </div>
                
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-dark btn-md ml-1 __loadingBtn__driver_edit">
                Save Changes</button>
                  <button type="button" class="btn btn-danger btn-md ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Cancel</button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->