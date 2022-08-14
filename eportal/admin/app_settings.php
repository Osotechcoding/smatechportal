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
      <li class="nav-item">
      <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill"
      href="#new-account-vertical-form" aria-expanded="false">
      <i class="fa fa-user-plus"></i>
      <span>Add New Staff</span>
      </a>
      </li>
      <li class="nav-item">
      <a class="nav-link d-flex align-items-center" id="account-pill-social-two" data-toggle="pill"
      href="#new-student-account-vertical-form" aria-expanded="false">
      <i class="fa fa-graduation-cap"></i>
      <span>Add New Student</span>
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
      <div class="col-12">
      	<div class="form-group">
      					<label>SCHOOL NAME</label>
      					<input name="school_name" autocomplete="off" type="text" class="form-control"
      									placeholder="SMApp GROUP OF SCHOOLS" value="<?php echo ucwords($VisaPSchoolDetails->school_name)?>">
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
      									placeholder="OG/NAPPS/009" name="approval_number" value="<?php echo ucwords($VisaPSchoolDetails->govt_approve_number)?>">
      	</div>
      </div>

      <div class="col-12">
      	<div class="form-group">
      					<label>BRIEF HISTORY OF THE SCHOOL</label>
      					<textarea class="form-control" name="school_history" rows="3" placeholder="Brief History of the School here..."><?php echo ($VisaPSchoolDetails->school_history)?></textarea>
      	</div>
      </div> 
      <div class="col-12">
      	<div class="form-group">
      					<div class="controls">
      									<label>FOUNDED YEAR</label>
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
      <!-- <div class="col-12">
      	<div class="form-group">
      					<label>LONGITUDE</label>
      					<input autocomplete="off" type="text" class="form-control"
      									placeholder="90 EAST">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>LATITUDE</label>
      					<input autocomplete="off" type="text" class="form-control"
      									placeholder="19 NORTH">
      	</div>
      </div> -->
      <div class="col-md-6 col-sm-12">
      		<div class="form-group">
      					<label>SCHOOL WEBSITE ADDRESS</label>
      					<input autocomplete="off" type="text" class="form-control" name="website_link" placeholder="https://www.smappportal.com.ng" value="<?php echo $VisaPSchoolDetails->website_url?>">
      	</div>
      </div>
      <div class="col-md-6 col-sm-12">
      	<div class="form-group">
      					<label>AUTH CODE</label>
      					<input autocomplete="off" type="password" class="form-control"
      									placeholder="*********" name="auth_pass5">
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
      					<input name="twitter" autocomplete="off" type="text" class="form-control" placeholder="Add link"
      									value="<?php echo $VisaPSoicalLink->twitter;?>">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>Facebook</label>
      					<input autocomplete="off" type="text" class="form-control" placeholder="Add link" value="<?php echo $VisaPSoicalLink->facebook;?>" name="facebook">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>Google+</label>
      					<input name="goggle" autocomplete="off" type="text" class="form-control" placeholder="Add link" value="<?php echo $VisaPSoicalLink->goggle;?>">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>LinkedIn</label>
      					<input name="linkedin" autocomplete="off" type="text" class="form-control" placeholder="Add link"
      									value="<?php echo $VisaPSoicalLink->linkedin;?>">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>Instagram</label>
      					<input name="instagram" autocomplete="off" type="text" class="form-control" placeholder="Add link" value="<?php echo $VisaPSoicalLink->instagram;?>">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>YouTube</label>
      					<input autocomplete="off" type="text" class="form-control" placeholder="Add link" value="<?php echo $VisaPSoicalLink->youtube;?>" name="youtube">
      	</div>
      </div>
      <div class="col-12">
      	<div class="form-group">
      					<label>Authentication Key</label>
      					<input autocomplete="off" type="password" class="form-control" placeholder="********"name="auth_pass55">
      	</div>
      </div>

      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
      	<button type="submit" class="btn btn-dark btn-lg glow mr-sm-1 mb-1 __loadingBtn35__">Save changes</button>

      </div>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="new-account-vertical-form" role="tabpanel"
      aria-labelledby="new-staff-account" aria-expanded="false">
      <div class="col-md-12 text-center"><h3><span class="fa fa-user-plus"></span> Add New Staff</h3></div>
      <div class="col-md-12 text-center" id="myResponseText3"></div>
      <form class="validate-form" id="create_new_staff_form">
      <div class="row">
      <input type="hidden" name="action" value="submit_new_staff">

      <div class="col-12">
      	<div class="form-group">
      					<div class="controls">
      									<label>Surname</label>
      									<input autocomplete="off" type="text" class="form-control"
      													placeholder="Surname"
      													name="sname">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>First Name </label>
      									<input autocomplete="off" type="text" class="form-control"
      													placeholder="First Name" name="fname">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Middle Name</label>
      									<input autocomplete="off" type="text"
      													class="form-control"
      													placeholder="Middle Name"
      													name="mname">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>E-mail</label>
      									<input autocomplete="off" type="text"
      													class="form-control"
      													placeholder="E-mail"
      													name="semail">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Mobile</label>
      									<input autocomplete="off" type="number"
      													class="form-control"
      													placeholder="Mobile"
      													name="mphone">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Username</label>
      									<input autocomplete="off" type="text"
      													class="form-control"
      													placeholder="Portal Username"
      													name="musername">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Password</label>
      					<input autocomplete="off" type="password"
      					class="form-control"
      	placeholder="Portal Password" name="mpassword">
      					</div>
      	</div>
      </div>

      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Level of Education</label>
      									<select name="education" id="education" class="custom-select form-control">
      													<option value="">Choose...</option>
      													<option value="Pry">Pry Schl Cert</option>
      													<option value="olevel">O'Level</option>
      													<option value="OND">OND </option>
      													<option value="NCE">NCE</option>
      													<option value="HND">HND</option>
      													<option value="BSc">BSc </option>
      													<option value="Phd">Phd</option>
      									</select>
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Job Type</label>
      									<select name="jobType" id="jobType" class="custom-select form-control">
      													<option value="">Choose...</option>
      													<option value="Teaching">Teaching</option>
      													<option value="Non-Teaching">Non-Teaching </option>
      									</select>
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Gender</label>
      									<select name="staff_gender" id="staff_gender" class="custom-select form-control">
      													<option value="">Choose...</option>
      													<option value="Male">Male</option>
      													<option value="Female">Female </option>
      									</select>
      					</div>
      	</div>
      </div>

      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>AUTHENTICATION KEY</label>
      					<input autocomplete="off" type="password"
      					class="form-control"
      	placeholder="Auth Code" name="auth_pass">
      					</div>
      	</div>
      </div>
      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
      	<button type="submit" class="btn btn-dark glow btn-lg mr-sm-1 mb-1 __loadingBtn3__">Register Now</button>
      	
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


      <div class="tab-pane fade" id="new-student-account-vertical-form" role="tabpanel"
      aria-labelledby="new-staff-account" aria-expanded="false">
      <div class="col-md-12 text-center"><h3><span class="fa fa-graduation-cap"></span> Register New Student</h3></div>
      <div class="col-md-12 text-center" id="myResponseText5"></div>
      <form class="validate-form" id="create_new_student_form">
      <div class="row">
      <input type="hidden" name="action" value="submit_new_student_details">

      <div class="col-12">
      	<div class="form-group">
      					<div class="controls">
      									<label>Surname</label>
      									<input autocomplete="off" type="text" class="form-control"
      													placeholder="Surname"
      													name="student_surname">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>First Name </label>
      									<input autocomplete="off" type="text" class="form-control"
      													placeholder="First Name" name="student_first_name">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Middle Name</label>
      									<input autocomplete="off" type="text"
      													class="form-control"
      													placeholder="Middle Name"
      													name="student_middle_name">
      					</div>
      	</div>
      </div>
      <div class="col-md-12">
      	<div class="form-group">
      					<div class="controls">
      									<label>Student Home Address</label>
      									<textarea name="student_home_address" id="home_address" class="form-control" placeholder="Student home address"></textarea>
      					</div>
      	</div>
      </div>
      <div class="col-md-12">
      	<div class="form-group">
      					<div class="controls">
      									<label>Student E-mail</label>
      									<input autocomplete="off" type="text"
      													class="form-control"
      													placeholder="Portal Login e-mail"
      													name="student_email">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Mobile</label>
      									<input autocomplete="off" type="number"
      													class="form-control"
      													placeholder="080*********"
      													name="student_phone">
      					</div>
      	</div>
      </div>
     

      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Student Present Class</label>
      									<select name="student_class" id="student_class" class="select2 form-control">
      													<option value="">Choose...</option>
      		<?php echo $Administration->get_classroom_InDropDown_list() ?>
      									</select>
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Admission Date</label>
      									<input type="date" name="admission_date" class="form-control">
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Gender</label>
      									<select name="student_gender" id="gender" class="custom-select form-control">
      													<option value="">Choose...</option>

      													<option value="Male">Male</option>
      													<option value="Female">Female </option>
      													<option value="Other">Other </option>
      													
      									</select>
      					</div>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Date of Birth</label>
      					<input autocomplete="off" type="date"
      					class="form-control" name="student_dob">
      					</div>
      	</div>
      </div>

      <!-- SCRATCH CARD -->
      <div class="col-md-6">
        <div class="form-group">
                <div class="controls">
                        <label for="">CARD PIN</label>
                <input autocomplete="off" type="password"
                class="form-control" name="cardpin" placeholder="**********">
                </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
                <div class="controls">
                  <label for="">CARD SERIAL</label>
                <input autocomplete="off" type="text"
                class="form-control" name="cardserial" placeholder="**********">
                </div>
        </div>
      </div>
      <!-- SCRATCH CARD -->
      <div class="col-md-6">
      	<div class="form-group">
      					<div class="controls">
      									<label>Authentication Code</label>
      					<input autocomplete="off" type="password"
      					class="form-control"
      	placeholder="Enter Pass Code to continue" name="auth_pass2">
      					</div>
      	</div>
      </div>
      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
      	<button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtn4__ btn-lg">Register</button>
      	
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
				<!-- demo chat-->
	
			<?php include "../template/footer.php"; ?>
				<!-- END: Footer-->

				<!-- BEGIN: Vendor JS-->
				<?php include "../template/FooterScript.php"; ?>
					<!-- BEGIN: Page JS-->
				<script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
				<!-- END: Page JS-->
<script>
				$(document).ready(function(){
								const NEWSTAFFFORM = $("#create_new_staff_form");
								NEWSTAFFFORM.on("submit", function(e){
								e.preventDefault();
								//myResponseText3
										$(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
						//send request 
						$.post("../actions/actions",NEWSTAFFFORM.serialize(),function(res_data){
								setTimeout(()=>{
										$(".__loadingBtn3__").html('Register Now').attr("disabled",false);
										// $("#myResponseText3").html(res_data);
										$("#server-response").html(res_data);
								},1000);
						})
				})

								//STUDENT FORM SUBMISSION METHOD
								const NEWSTUDENTFORM = $("#create_new_student_form");
								NEWSTUDENTFORM.on("submit", function(e){
								e.preventDefault();
								//myResponseText3
										$(".__loadingBtn4__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
						//send request 
						$.post("../actions/actions",NEWSTUDENTFORM.serialize(),function(res_data){
								setTimeout(()=>{
										$(".__loadingBtn4__").html('Register').attr("disabled",false);
										// $("#myResponseText3").html(res_data);
										$("#server-response").html(res_data);
								},1000);
						})
				});


								//update_school_administrator_form
								const UPDATE_ADMINISTRATOR_FORM = $("#update_school_administrator_form");
								UPDATE_ADMINISTRATOR_FORM.on("submit", function(evt){
								evt.preventDefault();
								//myResponseText3
										$(".__loadingBtn13__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
						//send request 
						$.post("../actions/update_actions",UPDATE_ADMINISTRATOR_FORM.serialize(),function(res_data){
								setTimeout(()=>{
										$(".__loadingBtn13__").html('Save Changes').attr("disabled",false);
										// $("#myResponseText3").html(res_data);
										$("#server-response").html(res_data);
								},1000);
						})
				});
								//submit_school_profile_form
								const UPDATE_SCHOOL_PROFILE_FORM = $("#submit_school_profile_form");
								UPDATE_SCHOOL_PROFILE_FORM.on("submit", function(vt){
								vt.preventDefault();
								//myResponseText3
										$(".__loadingBtn33__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
						//send request 
						$.post("../actions/update_actions",UPDATE_SCHOOL_PROFILE_FORM.serialize(),function(re_data){
								setTimeout(()=>{
										$(".__loadingBtn33__").html('Save Changes').attr("disabled",false);
										// $("#myResponseText3").html(res_data);
										$("#server-response").html(re_data);
								},1000);
						})
				});

								//update_school_social_link_form

								const UPDATE_SOCIAL_LINK_FORM = $("#update_school_social_link_form");
								UPDATE_SOCIAL_LINK_FORM.on("submit", function(myevent){
								myevent.preventDefault();
								//myResponseText3
										$(".__loadingBtn35__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
						//send request 
						$.post("../actions/update_actions",UPDATE_SOCIAL_LINK_FORM.serialize(),function(re_data){
								setTimeout(()=>{
										$(".__loadingBtn35__").html('Save Changes').attr("disabled",false);
										// $("#myResponseText3").html(res_data);
										$("#server-response").html(re_data);
								},1000);
						})
				});

    //update_school_social_link_form
    $("#upload-school-logo-form").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/update_actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn10__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn10__").html('Upload').attr("disabled",false);
        $("#upload-school-logo-form")[0].reset();
        $("#server-response").html(data);
        //alert(data);
      },800);
    }

  });
})

				})
</script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
               // $("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
				<!-- END: Page JS-->
		</body>
		<!-- END: Body-->
</html>