<h3 class="text-center">Scratch Card Information</h3>
<form id="newStudentAdmissionform">
<div class="row">
  <input type="hidden" name="action" value="submit_first_step_admission">
  <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
  <div class="col-md-6 mb-2">
    <div class="form-group">
      <label for="card_pin" class="form-label">Scratch Card Pin</label>
      <input type="password" name="card_pin" class="form-control form-control-lg" placeholder="**********" id="card_pin">
      <div id="cardHelp" class="form-text text-danger">Enter the Card Pin and Serial in the space provided</div>
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
      <label for="card_serial" class="form-label">Card Serial</label>
      <input type="text" autocomplete="off" name="card_serial" id="card_serial" class="form-control form-control-lg" placeholder="**********">
    </div>
  </div>
  <div class="col-md-6 mb-2">
     <span id="email-error"></span>
    <div class="form-group">
      <label for="student_email" class="form-label">Email address</label>
      <input type="text" autocomplete="off" name="student_email" class="form-control form-control-lg" placeholder="student@smatechportal.edu.com">
        <div id="emailHelp" class="form-text text-danger">I don't have an e-mail <a href="https://accounts.google.com/SignUp" target="_blank"> Create Email Account</a></div>
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
      <label for="username" class="form-label">Father's Name (Username)</label>
      <input type="text" autocomplete="off" id="username" name="username" class="form-control form-control-lg" placeholder="@osotech">
    </div>
  </div>
  <div class="col-md-6 mb-2">
     <span id="phone-error"></span>
    <div class="form-group">
      <label for="student_phone" class="form-label">Phone</label>
      <input type="text" autocomplete="off" name="student_phone" class="form-control form-control-lg" placeholder="080-0000-0000" id="student_phone">
      <div id="phoneHelp" class="form-text text-danger">Allowed phone format 080-2311-3432 </div>
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label for="student_class" class="form-label"> Class Level</label>
      <select class="custom-select form-control form-control-lg" id="student_class" name="student_class">
        <option value="pry" selected>Primary</option>
        <option value="jnr">Junior </option>
        <option value="snr">Senior</option>
      </select>
    </div>
  </div>
  <div class="col-md-6 mb-2">
     <span id="phone-error"></span>
    <div class="form-group">
      <input type="datetime" autocomplete="off" name="regDateTime" class="form-control form-control-lg" value="<?php echo date("Y-m-d h:i:s") ?>" readonly>
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
      <div class="" id="captcha_load">
      </div>
    </div>
  </div>
</div>
<div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Agree to Terms &amp; Conditions</label>
</div>
<button type="submit" class="btn btn-dark btn-lg btn-round mb-5 __loadingBtn__" style="float:right">Continue Registration</button>
</form>
