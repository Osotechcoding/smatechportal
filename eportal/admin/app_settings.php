        <?php 
        require_once "helpers/helper.php";
        ?>
        <!DOCTYPE html>

        <html class="loading" lang="en" data-textdirection="ltr">
        <!-- BEGIN: Head-->
        <head>
        <?php include "../template/MetaTag.php";?>
        <title><?php echo $SmappDetails->school_name ?> :: School Profile Settings</title>
        <!-- include template/HeaderLink.php -->
        <?php include "../template/HeaderLink.php";?>
        <!-- END: Head-->
        <!-- BEGIN: Body-->
        <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
        <!-- BEGIN: Header-->
        <?php include "template/HeaderNav.php"; ?>
        <!-- BEGIN: Main Menu-->
        <?php include "template/Sidebar.php";?>
        <!-- include Sidebar.php -->
        <!-- BEGIN: Content-->
        <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
        <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
        <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
        <div class="breadcrumb-wrapper d-none d-sm-block">
        	<ol class="breadcrumb p-0 mb-0 pl-1">
        			<li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
        			</li>
        			<li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
        			</li>
        			<li class="breadcrumb-item active">School Profile Settings
        			</li>
        	</ol>
        </div>
        </div>
        </div>
        </div>
        <div class="content-body">
        <div class="row">
        <div class="col-12">
        <h3 class="bd-lead text-primary text-bold"><span class="fa fa-edit fa-1x"></span> SCHOOL PROFILE MANAGEMENT MODULE </h3>
        </div>
        </div>
        <!-- content goes here -->
        <!-- account setting page start -->
        <section id="page-account-settings">
        <div class="row">
        <div class="col-12">
        <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
        <ul class="nav nav-pills flex-column">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-pill-social-two" data-toggle="pill"
        href="#logo-form" aria-expanded="false">
        <i class="fa fa-camera"></i>
        <span>Upload School Logo</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center" id="account-pill-general" data-toggle="pill"
        href="#account-vertical-general" aria-expanded="true">
        <i class="bx bx-cog"></i>
        <span>Administrator Info</span>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
        href="#account-vertical-info" aria-expanded="false">
        <i class="bx bx-info-circle"></i>
        <span>Set School Profile</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill"
        href="#account-vertical-social" aria-expanded="false">
        <i class="bx bxl-twitch"></i>
        <span>Set Social links</span>
        </a>
        </li>
        </ul>
        </div>
        <!-- right content section -->
        <div class="col-md-9">
        <div class="card">
        <div class="card-body">
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="account-vertical-general"
        aria-labelledby="account-pill-general" aria-expanded="true">
        <div class="media">
        <a href="javascript: void(0);">
        <img src="<?php echo $Configuration->get_schoolLogoImage();?>"
        class="rounded mr-75" alt="profile image" height="250" width="250" style="border:2px solid darkblue;">
        </a>

        </div>

        <hr>
        <form class="validate-form" id="update_school_administrator_form">
        <div class="row">
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label> OWNER'S NAME</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Prof. Idowu Samson A" name="owner_name" value="<?php echo ucwords($VisaPSchoolDetails->school_director)?>">
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label> OWNER'S CONTACT</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="09043654443" name="owner_phone" value="<?php echo ucwords($VisaPSchoolDetails->director_mobile)?>">
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label> PRINCIPAL'S NAME</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Mr Lawal O.P" name="principal" value="<?php echo ucwords($VisaPSchoolDetails->principal)?>">
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>PRINCIPAL'S CONTACT</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="09043654443"  name="principal_mobile" value="<?php echo ucwords($VisaPSchoolDetails->principal_mobile)?>">
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label> REGISTRAR'S NAME</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Ayangalu Fagbayi" name="registrar" value="<?php echo ucwords($VisaPSchoolDetails->registrar)?>">
        </div>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>REGISTRAR'S CONTACT</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="09043654443" name="registrar_phone" value="<?php echo ucwords($VisaPSchoolDetails->registrar_mobile)?>">
        </div>
        </div>
        </div>
        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>Authentication Key</label>
        <input autocomplete="off" type="password" class="form-control"
        placeholder="**********" name="auth_pass5">
        </div>
        </div>
        </div>
        <input type="hidden" name="action" value="update_school_administrator">
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
        <button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtn13__">Save Changes</button>

        </div>
        </div>
        </form>
        </div>

        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
        aria-labelledby="account-pill-info" aria-expanded="false">
        <form class="validate-form" id="submit_school_profile_form">
        <div class="row">
        <div class="col-8">
        <div class="form-group">
        <label>SCHOOL NAME</label>
        <input name="school_name" autocomplete="off" type="text" class="form-control"
        placeholder="SMATECH GROUP OF SCHOOLS" value="<?php echo ucwords($VisaPSchoolDetails->school_name)?>">
        </div>
        </div>
        <div class="col-4">
        <div class="form-group">
        <label>SCHOOL SHORT NAME</label>
        <input name="shortname" autocomplete="off" type="text" class="form-control"
        placeholder="SMATECH GROUP OF SCHOOLS" value="<?php echo ucwords($VisaPSchoolDetails->school_short_name)?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>MOTTO</label>
        <input name="slogan" autocomplete="off" type="text" class="form-control"
        placeholder="...all things are possible" value="<?php echo ucwords($VisaPSchoolDetails->school_slogan)?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>APPROVAL NUMBER</label>
        <input name="approval_number" autocomplete="off" type="text" class="form-control"
        placeholder="C24314" name="approval_number" value="<?php echo ucwords($VisaPSchoolDetails->govt_approve_number)?>">
        </div>
        </div>

        <div class="col-12">
        <div class="form-group">
        <label>CHAIRMAN/DIRECTOR'S WELCOME</label>
        <textarea class="form-control" name="school_history" rows="10" placeholder="Brief History of the School here..."><?php echo ($VisaPSchoolDetails->school_history)?></textarea>
        </div>
        </div> 
        <div class="col-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL FOUNDED YEAR</label>
        <input autocomplete="off" type="text" class="form-control" placeholder="Founded date" name="founded_year" value="<?php echo ucwords($VisaPSchoolDetails->founded_year)?>">
        </div>
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL LOCATION/ADDRESS</label>
        <textarea name="school_address" class="form-control"><?php echo ucwords($VisaPSchoolDetails->school_address)?></textarea>
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>SCHOOL STATE</label>
        <input type="text" class="form-control" name="school_state" value="<?php echo $VisaPSchoolDetails->school_state ?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>SCHOOL LGA</label>
        <input type="text" class="form-control" name="school_city" value="<?php echo $VisaPSchoolDetails->school_city ?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>SCHOOL COUNTRY</label>
        <input type="text" class="form-control" name="country" value="<?php echo $VisaPSchoolDetails->country ?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <label>SCHOOL LANGUAGE </label>
        <input type="text" class="form-control" name="default_language" value="<?php echo $VisaPSchoolDetails->default_language?>">
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL PHONE</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Phone number"
        name="school_phone" value="<?php echo $VisaPSchoolDetails->school_phone?>">
        </div>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL FAX</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Fax number" name="school_fax"  value="<?php echo $VisaPSchoolDetails->school_fax?>">
        </div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL EMAIL</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="visapportal@gmail.com" 
        name="school_email"  value="<?php echo $VisaPSchoolDetails->school_email?>">
        </div>
        </div>
        </div>

        <div class="col-md-6 col-sm-12">
        <div class="form-group">
        <div class="controls">
        <label>SCHOOL GMAIL</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="visapportal@gmail.com" 
        name="school_gmail"  value="<?php echo $VisaPSchoolDetails->school_gmail?>">
        </div>
        </div>
        </div>
        <div class="col-6">
        <div class="form-group">
        <label>LONGITUDE</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="90 EAST (functionality is coming soon)" readonly>
        </div>
        </div>
        <div class="col-6">
        <div class="form-group">
        <label>LATITUDE</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="19 NORTH (functionality is coming soon)" readonly>
        </div>
        </div>

        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>OUR MISSION</label>
        <textarea name="mission_statement" class="form-control" rows="2" placeholder="Enter School Mission Statement here..."><?php echo $VisaPSchoolDetails->our_mission;?></textarea>
        </div>
        </div>
        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>OUR VISION</label>
        <textarea name="vision_statement" id="" class="form-control" rows="2" placeholder="Enter School Vision Statement here..."><?php echo $VisaPSchoolDetails->our_vision;?></textarea>
        </div>
        </div>

        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>OUR CORE VALUES <small class="text-danger">(Comma separated values)</small></label>
        <textarea name="core_value" class="form-control" rows="2" placeholder="e.g value one, value two , value three etc..."><?php echo $VisaPSchoolDetails->our_core_value;?></textarea>
        </div>
        </div>

        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>KEY OF SUCCESS</label>
        <textarea name="key_of_success" id="" class="form-control" rows="2" placeholder="Enter About Us Message here..."><?php echo $VisaPSchoolDetails->key_of_success;?></textarea>
        </div>
        </div>

        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>OUR PHILOSOPHY</label>
        <textarea name="philosophy_statement" class="form-control" rows="2" placeholder="Enter About Us Message here..."><?php echo $VisaPSchoolDetails->our_philosophy;?></textarea>
        </div>
        </div>

         <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>OUR PRINCIPLE</label>
        <textarea name="principle_statement" class="form-control" rows="2" placeholder="Enter About Us Message here..."><?php echo $VisaPSchoolDetails->our_principle;?></textarea>
        </div>
        </div>

        <div class="col-md-12 col-sm-12">
        <div class="form-group">
        <label>ABOUT US MESSAGE </label>
        <textarea name="about_us_statement" class="form-control" rows="6" placeholder="Enter About Us Message here..."><?php echo $VisaPSchoolDetails->about_us;?></textarea>
        </div>
        </div>

        <div class="col-md-8 col-sm-12">
        <div class="form-group">
        <label>SCHOOL WEBSITE ADDRESS</label>
        <input autocomplete="off" type="text" class="form-control" name="website_link" placeholder="https://www.smappportal.com.ng" value="<?php echo $VisaPSchoolDetails->website_url?>">
        </div>
        </div>
        <div class="col-md-4 col-sm-12">
        <div class="form-group">
        <label>AUTH CODE</label>
        <input autocomplete="off" type="password" class="form-control"
        placeholder="*********" name="auth_code">
        </div>
        </div>
        <input type="hidden" name="action" value="update_school_profile_">
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
        <button type="submit" class="btn btn-dark btn-lg glow mr-sm-1 mb-1 __loadingBtn33__">Save
        changes</button>

        </div>
        </div>
        </form>
        </div>
        <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
        aria-labelledby="account-pill-social" aria-expanded="false">
        <form id="update_school_social_link_form">
        <div class="row">
        <div class="col-12">
        <input type="hidden" name="action" value="update_school_social_link_">
        <div class="form-group">
        <label>Twitter</label>
        <input name="twitter" autocomplete="off" type="text" class="form-control" placeholder="https://twitter.com/smatechportal"
        value="<?php echo $VisaPSoicalLink->twitter;?>">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>Facebook</label>
        <input autocomplete="off" type="text" class="form-control" placeholder="https://facebook.com/smatechportal" value="<?php echo $VisaPSoicalLink->facebook;?>" name="facebook">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>Google+</label>
        <input name="goggle" autocomplete="off" type="text" class="form-control" placeholder="https://google.com/smatechportal" value="<?php echo $VisaPSoicalLink->goggle;?>">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>LinkedIn</label>
        <input name="linkedin" autocomplete="off" type="text" class="form-control" placeholder="https://linkedIn.com/smatechportal"
        value="<?php echo $VisaPSoicalLink->linkedin;?>">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>Instagram</label>
        <input name="instagram" autocomplete="off" type="text" class="form-control" placeholder="https://instagram.com/smatechportal" value="<?php echo $VisaPSoicalLink->instagram;?>">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>YouTube</label>
        <input autocomplete="off" type="text" class="form-control" placeholder="https://youTube.com/smatechportal" value="<?php echo $VisaPSoicalLink->youtube;?>" name="youtube">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>WhatsApp</label>
        <input autocomplete="off" type="text" class="form-control" placeholder="https://wa.me/2348000000000" value="<?php echo $VisaPSoicalLink->WhatsApp;?>" name="whatsapp">
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <label>Authentication Code</label>
        <input autocomplete="off" type="password" class="form-control" placeholder="********"name="auth_pass55">
        </div>
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
        <button type="submit" class="btn btn-dark btn-lg glow mr-sm-1 mb-1 __loadingBtn35__">Save changes</button>

        </div>
        </div>
        </form>
        </div>

        <!-- Logo Form -->
        <div class="tab-pane active" id="logo-form" role="tabpanel"
        aria-labelledby="new-staff-account" aria-expanded="false">
        <form class="validate-form" id="upload-school-logo-form">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="logoName">News Logo <span class="text-danger">(png,jpg or jpeg format Only)</span></label>
        <input type="file" class="form-control form-control-lg" name="logoName" onchange="previewFile(this);">
        </div>
        <div class="col-md-6 offset-2" id="uploaded_logo">
        <img id="previewImg" width="200" src="<?php echo $Configuration->get_schoolLogoImage();?>" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
        <p>Image Size: <span id="ImageSize"></span></p> 
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
        <div class="controls">
        <input type="hidden" name="action" value="uploadschLogo">
        <label>Authentication Code</label>
        <input autocomplete="off" type="password" class="form-control"
        placeholder="*********" name="m_auth">
        </div>
        </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
        <button type="submit" class="btn btn-dark bnt-lg glow mr-sm-1 mb-1 __loadingBtn10__">Upload </button>

        </div>
        </div>
        </form>
        </div>
        <!-- Logo Form -->
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
        <!-- demo chat-->

        <?php include "../template/footer.php"; ?>
        <!-- END: Footer-->

        <!-- BEGIN: Vendor JS-->
        <?php include "../template/FooterScript.php"; ?>
        <!-- BEGIN: Page JS-->
        <script src="smappjs/app_settings.js"></script>
        <!-- END: Page JS-->
       
        <!-- END: Page JS-->
        </body>
        <!-- END: Body-->
        </html>