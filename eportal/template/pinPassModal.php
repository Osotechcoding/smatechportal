<!-- MODAL PIN CODE -->
    <div class="modal fade text-left" id="showPinPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="text-uppercase text-sm-center">Enter Password to reveal Pins</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                <div class="form-group">
                <input type="password" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="Enter Access Key to Show Password">
                <input type="hidden" name="show_pins" value="pin_view">
                    </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="d-none d-sm-block">Submit Password</span>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- MODAL PIN CODE -->