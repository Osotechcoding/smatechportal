<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo ($SmappDetails->school_name);?> ::  <?php echo ucwords($admin_data->adminType);?></title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">Profile</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($admin_data->adminType);?></a>
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
                        
                      <!--   <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="staff-bank-info" data-toggle="pill"
                                href="#bank" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>Update Bank Info</span>
                            </a>
                        </li> -->
                        <!--  <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                                href="#update-avatar-photo" aria-expanded="false">
                                <i class="fa fa-camera"></i>
                                <span>Profile Image</span>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                                href="#account-vertical-password" aria-expanded="false">
                                <i class="bx bx-lock"></i>
                                <span>Change Password</span>
                            </a>
                        </li>

                        <!--  <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
                                href="#bank-info" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>Update Bank Info</span>
                            </a>
                        </li> -->
                      
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
        <img src="<?php echo $Configuration->get_schoolLogoImage();?>"
        class="rounded mr-75" alt="profile image" height="150" width="150" style="border:2px solid darkblue;">
                                        </a>
                                        
                                    </div>
                                    <hr>
                                    <form class="validate-form" id="admin_profile_update_form">
                                        <div class="row">

                                          
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>User Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="User Name" value="<?php echo ucwords($admin_data->adminUser);?>" name="UserName">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Middle Name" value="<?php echo ucwords($admin_data->fullname);?>" name="fullName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Portal User Type</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="User Type" value="<?php echo ($admin_data->adminType);?>" name="userType" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>E-mail</label>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            value="<?php echo ($admin_data->adminEmail);?>" name="email" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Authentication Code</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="*********" name="auth_pass">
                                                </div>
                                            </div>
                                            <input type="hidden" name="action" value="update_admin_details">
                                           <input type="hidden" name="admin_id" value="<?php echo $admin_data->adminId;?>">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtn38__">Save
                                                    changes</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <h4 class="text-center text-muted"> UPDATE ACCOUNT PASSWORD</h4>
                                    <form class="validate-form" id="password-update-form">
                                      <div class="col-md-12 text-center" id="myResponseText"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" value="<?php echo $admin_data->adminEmail;?>" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Old Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Old Password"
                                                            name="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-sm-12">
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
                                            <div class="col-md-6 col-12 col-sm-12">
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
                                            <input type="hidden" name="action" value="update_admin_pwd_now">
                                            <input type="hidden" name="admin_id" value="<?php echo $adminId;?>">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1 __loadingBtn__">Save
                                                    changes</button>
                                               
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               
                              <div class="tab-pane fade" id="bank" role="tabpanel"
                                    aria-labelledby="staff-bank-info" aria-expanded="false">
                                    <form class="validate-form" id="staff-update-bank-info">
                                      
                                      <h4 class="text-center text-muted"> Upload Staff Bank Info</h4>
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
          $("#server-response").html(data);
        },500);
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
            },500);
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
        },500);
      })
    })

    //upload photo start
    const UPLOADPHOTOFORM = $("#upload_avatar_photo_form");
    UPLOADPHOTOFORM.on("click", function(e){
      e.preventDefault();
     
    })

//update profile info
const MY_PROFILE_UPDATE_FORM = $("#admin_profile_update_form");
    MY_PROFILE_UPDATE_FORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn38__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/update_actions",MY_PROFILE_UPDATE_FORM.serialize(),function(re_data){
        setTimeout(()=>{
          $(".__loadingBtn38__").html('Save Changes').attr("disabled",false);
          $("#server-response").html(re_data);
        },500);
      })
    })

  })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>