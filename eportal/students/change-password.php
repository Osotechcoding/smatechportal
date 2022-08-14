<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: Student Dashboard</title>
<?php include_once ("templates/HeaderLinks.php");?>
</head>
<body>
<div class="main-wrapper">
<!-- NAV BAR HEADER -->
<?php include("templates/navBarMenu.php") ?>
<!-- NAV BAR HEADER ENDS -->
<!-- SIDE BAR HEADER -->
<?php include("templates/studentSideBar.php") ?>
<!-- SIDE BAR HEADER ENDS -->
<div class="page-wrapper">
<div class="content container-fluid">
<!-- GREETING INFO -->
<?php include("templates/greetingInfo.php");?>
<!-- GREETING INFO ENDS -->
<div class="content-page">
<div class="row">
<div class="col-md-8 offset-md-2">
<div class="card">
<div class="card-body">
    <div class="col-md-12 text-center">
        <h1 class="text-center text-bold text-muted">Change Password</h1>
    </div>
<form id="passwordUpdateform">
    <!-- <div class="col-md-12 text-center" id="server-response"></div> -->
<div class="row">
<div class="col-sm-12">
    <input type="hidden" name="action" value="save_student_password_changed">
    <input type="hidden" name="studentId" value="<?php echo $student_data->stdId;?>">
<div class="form-group">
<label for="old-password">Old Password</label>
<input type="password" class="form-control" placeholder="Enter Old Password" name="oldpassword">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="form-group">
<label>New Password</label>
<input type="password" placeholder="Enter New Password" class="form-control" name="newpassword">
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="form-group">
<label>Confirm Password</label>
<input type="password" class="form-control" placeholder="Enter Confirm New Password" name="cpassword">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12 text-center m-t-20">
<button type="submit" class="btn btn-dark btn-md __loadingBtn__">Save Changes</button>
<a href="./"><button type="button" class="btn btn-danger btn-md">Back</button></a>
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
<?php include_once ("templates/FooterScript.php");?>
<script>
    $(document).ready(function(){
        const PASSWORDUFORM = $("#passwordUpdateform");
        PASSWORDUFORM.on("submit", function(event){
            event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...');
        $.post("../actions/update_actions",PASSWORDUFORM.serialize(),(res)=>{
                setTimeout(()=>{
                $("#server-response").html(res);
                $(".__loadingBtn__").html('Save Changes');
                },1000);
            });
        })
    })
</script>
</body>

</html>