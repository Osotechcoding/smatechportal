<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo ucwords($staff_data->full_name);?> || <?php echo $lang['webtitle']?></title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">Account Settings</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="index-2.html"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"> Account Settings
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <!-- account setting page start -->
<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill"
                                href="#account-vertical-general" aria-expanded="true">
                                <i class="bx bx-cog"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"-->
                        <!--        href="#account-vertical-info" aria-expanded="false">-->
                        <!--        <i class="bx bx-info-circle"></i>-->
                        <!--        <span>Update Info</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!-- <li class="nav-item">-->
                        <!--    <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"-->
                        <!--        href="#update-avatar-photo" aria-expanded="false">-->
                        <!--        <i class="fa fa-camera"></i>-->
                        <!--        <span>Profile Image</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                                href="#account-vertical-password" aria-expanded="false">
                                <i class="bx bx-lock"></i>
                                <span>Change Password</span>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
                                href="#bank-info" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>Update Bank Info</span>
                            </a>
                        </li>
                      
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <div class="media text-center">
                                        <a href="javascript: void(0);">
                                            <img src="../schlogo.jpg"
                                                class="rounded mr-75" alt="profile image" height="100" width="100" style="border: solid black 2px; border-radius: 20px;">
                                        </a>
                                        
                                    </div>
                                    <hr>
                                    <form class="validate-form">
                                        <div class="row">

                                           <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Surname</label>
                                                 <input type="text" class="form-control"
                                                  placeholder="Surname" value="<?php echo ucwords($staff_data->lastName);?>" name="surname" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="First Name" value="<?php echo ucwords($name_arr[0]);?>" name="firstname" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Middle Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Middle Name" value="<?php echo ucwords($name_arr[1]);?>" name="middlename" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Portl Username</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Username" value="<?php echo ($staff_data->staffUser);?>" name="username" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>E-mail</label>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            value="<?php echo ($staff_data->staffEmail);?>" name="email" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Job Type</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Company name" value="<?php echo ($staff_data->staffType);?>" readonly>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Company name" value="<?php echo ($staff_data->staffRole);?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center" id="resendResponse"></div>
                                            <!--  -->
                                            <?php if ($staff_data->confirmation_code != "" || $staff_data->confirmation_code!= NULL): ?>
                                              <div class="col-12">
                                                <div class="alert bg-rgba-warning alert-dismissible mb-2"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <p class="mb-0">
                                                        Your email is not confirmed. Please check your mail inbox at <?php echo $staff_data->staffEmail;?>. OR Click the Link bellow
                                                    </p>
                                                    <button type="button" class="btn btn-dark btn-sm resend-btn" data-action="resend" data-id="<?php echo $staff_data->staffId;?>" data-email="<?php echo $staff_data->staffEmail;?>" data-code="<?php echo $staff_data->confirmation_code;?>" data-name="<?php echo $staff_data->full_name;?>" >Resend confirmation</button>
                                                </div>
                                            </div>
                                            <?php endif ?>
                                            
                                            
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="update-avatar-photo" role="tabpanel">
                                  <form method="POST" enctype="multipart/form-data" >
                                     <div class="media-body mt-25">
                                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label  class="btn btn-sm btn-light-primary">
                                                  <span>Upload Profile Image</span>
                                                  <input autocomplete="off" type="file" id="myavatar" name="myavatar" class="form-control form-control-file">
                                                </label>
                                            </div>
                                            <p class="text-muted ml-1 mt-50"><small class="text-danger"><em>Allowed JPG or PNG Only. Max size of 100kB</em></small></p>
                                        </div>
                                        <div class="myPreview" style="display: none;">
                                          <img src="../schlogo.jpg" width="100" height="100" alt="profile-image" style="border: solid darkgreen 2px; border-radius: 20%;">
                                        </div>
                                        <h3 id="osotech-result"></h3>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                         <button type="button" id="upload_avatar_photo_form" class="btn btn-dark glow mr-sm-1 mb-1">Upload
                                            </button>
                                            
                                            </div>
                                  </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <h4 class="text-center text-muted"> UPDATE ACCOUNT PASSWORD</h4>
                                    <form class="validate-form" id="password-update-form">
                                      <div class="col-md-12 text-center" id="myResponseText"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Old Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Old Password"
                                                            name="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="New Password"
                                                            id="account-new-password"
                                                            name="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Retype new Password</label>
                                                        <input type="password"
                                                            class="form-control"
                                                            data-validation-match-match="password"
                                                            placeholder="New Password"
                                                            name="confirm-new-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="action" value="update_staff_pwd_now">
                                            <input type="hidden" name="staff_id" value="<?php echo $_SESSION['STAFF_SES_ID'] ?>">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1 __loadingBtn__">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                    aria-labelledby="account-pill-info" aria-expanded="false">
                                    <form class="validate-form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Bio</label>
                                                    <textarea class="form-control" id="accountTextarea" name="bio_data" rows="3"
                                                        placeholder="Your Bio data here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Birth date</label>
                                                        <input type="text" class="form-control birthdate-picker"
                                                            placeholder="Birth date"
                                                            name="dob">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                    <select class="form-control" id="accountSelect">
                                                        <option>Nigerian</option>
                                                        <option>Non-Nigerian</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State of Origin</label>
                                                    <select name="state_origin" class="form-control select2" id="">
                                    <option value="Lagos State" selected>Lagos State</option>
                                            </select>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Local Govt.</label>
                                                    <select name="state_origin" class="form-control select2" id="">
                                    <option value="Lagos State" selected>Ikeja</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Home Town</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Idimu" value=""
                                                            name="homeTown">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Phone number" value="(+656) 254 2568"
                                                            name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Residence Address</label>
                                                        <textarea class="form-control" id="accountTextarea" name="res_address" rows="3"
                                                        placeholder="Your Residence address..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Permanent Address</label>
                                                       <textarea class="form-control" id="accountTextarea" name="per_address" rows="3"
                                                        placeholder="Your Permanent address..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>School Attended</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Website address">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Course Studied</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Website address">
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>From Date</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Website address">
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Website address">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Higher Certificate Obtained</label>
                                                    <select class="form-control" id="musicselect2">
                                                    <option value="Rock">Rock</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              
                              <div class="tab-pane fade" id="bank-info" role="tabpanel"
                                    aria-labelledby="update-bank-info" aria-expanded="false">
                                    <form class="validate-form" id="staff-update-bank-info">
                                      
                                      <h4 class="text-center text-muted"> UPDATE YOUR BANK INFO</h4>
                                      <div class="col-md-12 text-center" id="myResponseText3"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Bank Name:</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="FCMB"
                                                            name="bank_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Account Name</label>
                                                <input type="text" class="form-control"
                                         placeholder="Adesola Olornwa Segun"name="bank_account_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Account Number</label>
                                         <input type="number"
                                            class="form-control"placeholder="1090987432" name="bank_account_no">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                            <label>Type of Account</label>
                                         <select name="bank_account_type" id="" class="form-control custom-select">
                                             <option value=""selected>Choose...</option>
                                             <option value="saving">Saving</option>
                                             <option value="current">Current</option>
                                             <option value="deposit">Deposit</option>
                                         </select>
                                            </div>
                                             </div>
                                            </div>
                                            <input type="hidden" name="action" value="update_staff_bank_info_now">
                                            <input type="hidden" name="staff_id" value="<?php echo $_SESSION['STAFF_SES_ID'] ?>">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1 __loadingBtn3__">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account setting page ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
</div>

   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
<script>
  $(document).ready(function(){
    const UPDATEPWDFORM = $("#password-update-form");
    UPDATEPWDFORM.on("submit", function(event){
      event.preventDefault();
      //alert("Submitted");
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",UPDATEPWDFORM.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
          $("#myResponseText").html(data);
        },1000);
      })
    });

    //end
    //when resend confirmation btn is clicked
    const resendCodeBtn = $(".resend-btn");
    resendCodeBtn.on("click", function(){
        $(".resend-btn").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Sending Mail...');
        //evt.preventDefault();
        //alert("yes confirmation code was sent successfully");
        const staffName = $(this).data('name');
        const staffEmail = $(this).data('email');
        const staffCode = $(this).data('code');
        const staffId = $(this).data('id');
        const action = $(this).data('action');
       // alert(staffName+ " "+staffEmail+ " "+staffCode+" "+staffId+" "+action);
        const myData = {
            action:action,
            staffName:staffName,
            staffEmail:staffEmail,
            staffCode:staffCode,
            staffId:staffId
        }
        //send to ../actions/actions
        $.post("../actions/actions",myData,function(result){
            setTimeout(()=>{
                 $(".resend-btn").html('Resend Confirmation');
            $("#resendResponse").html(result);
            },1500);
        })
    })

    //update bank info form submission actions
    const UPDATE_BANK_FROM = $("#staff-update-bank-info");
    UPDATE_BANK_FROM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",UPDATE_BANK_FROM.serialize(),function(res_data){
        setTimeout(()=>{
          $(".__loadingBtn3__").html('Save Changes').attr("disabled",false);
          $("#myResponseText3").html(res_data);
        },1000);
      })
    })

    //upload photo start
    const UPLOADPHOTOFORM = $("#upload_avatar_photo_form");
    UPLOADPHOTOFORM.on("click", function(e){
      e.preventDefault();
     
    })

    //when update profile details form is submitted


    /*$("#myavatar").on("change", function(e){
      var file = e.target.files[0].name;
      $("#osotech-result").html(file + " is the selected file");
    })*/
  })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>