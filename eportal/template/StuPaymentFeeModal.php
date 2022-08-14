<div class="modal fade" id="newPaymentModalForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-money fa-1x"></span> <span id="paymentTitle"></span> Payment</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12 mt-1" id="text-response"></div>
                <form id="make_payment_modal_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="type_of_fee">Fee Type (<span class="text-danger text-bold">COMPONENT</span>)</label>
             <input type="text" id="myComponent_fee" class="form-control form-control-lg" name="fee_type" readonly>
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="termly_amount"> Termly Payment </label>
               <input type="number" id="termly_amount" class="form-control" name="termly_amount" readonly>
                </div>
              </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="amount_to_pay"> Amount to Pay </label>
               <input type="number" autocomplete="off" id="amount_to_pay" class="form-control" name="amount_paid">
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="due_bal"> Due Balance </label>
               <input type="number" id="due_bal" class="form-control" name="std_due" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="payMethod"> Payment Method </label>
              <select name="paymentMethod" id="payMethod" class="form-control custom-select">
                <option value="">Choose...</option>
                <option value="Cash">Cash</option>
                <option value="Bank">Bank Transfer</option>
              </select>
                </div>
              </div>
              <div class="col-md-4 dispalyNone" style="display: none;">
                     <div class="form-group">
                  <label for="bankName"> Bank Name (<span class="text-warning"> if Bank Payment</span>) </label>
               <input type="text" autocomplete="off" id="bankName" class="form-control" name="bankName" placeholder="e.g First Bank Plc">
                </div>
              </div>
              <div class="col-md-4 dispalyNone" style="display: none;">
                     <div class="form-group">
                  <label for="teller"> Teller No / Transaction ID</label>
               <input type="text" autocomplete="off" id="teller" class="form-control" name="tellerNo" placeholder="e.g 17780815-0001">
                </div>
              </div>
                 </div>
                  </div>
                </div>
              <input type="hidden" name="paidTo" value="<?php echo $_SESSION['ADMIN_ID'];?>">
                <input type="hidden" name="student_id" value="<?php echo $stuId;?>">
                <input type="hidden" name="std_class" value="<?php echo $stuClass;?>">
                <input type="hidden" name="std_admno" value="<?php echo $std_regNo;?>">
             <input type="hidden" name="cterm" value="<?php echo $activeSess->term_desc;?>">
             <input type="hidden" name="csession" value="<?php echo $activeSess->session_desc_name;?>">
             <input type="hidden" name="bypass_auth" value="<?php echo md5("oiza1");?>">
             <input type="hidden" name="action" value="submit_student_pay">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                   <span class="fa fa-paper-plane"></span> Submit Payment</button>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>