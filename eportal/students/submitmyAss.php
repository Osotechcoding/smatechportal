
<?php include_once ("visap_helper.php");?>
<?php 
if (isset($_GET['assidmi']) && ! $Configuration->isEmptyStr($_GET['assidmi']) && isset($_GET['action']) && $_GET['action'] ==="submit") {
	$assIdmi = $Configuration->Clean($_GET['assidmi']);
	$ass_data = $Student->get_assignmentById($assIdmi);
	$staff_data = $Staff->get_staff_ById($ass_data->teacherId);
}else{
	header("Location: weeklyAssignment");
	exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo __SCHOOL_NAME__; ?> :: Submit Weekly Assignments</title>
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
<div class="card">
<div class="card-body">
<h3 class="mb-2 text-center text-info">Submit your Assignment answer here.</h3>
<div class="page-content1">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<form id="uploadAssForm">
<div class="form-group">
	<?php include_once("templates/stdHiddenVals.php");?>
	<input type="hidden" name="assignmentId" value="<?php echo $ass_data->assId;?>">
	<input type="hidden" name="teacher" value="<?php echo $ass_data->teacherId;?>">
	<label>Subject Name</label>
<input type="hidden" name="action" value="submit_myassignment_answer_now">
<input type="text" class="form-control form-control-lg" name="subject" readonly value="<?php echo $ass_data->subject;?>">
</div>

<div class="form-group">
<label>Assignment Title</label>
<input type="text" name="topic" class="form-control form-control-lg" value="<?php echo $ass_data->topic;?>" readonly>
</div>
<div class="form-group">
<label>Instruction</label>
<textarea name="note_content" class="form-control form-control-lg" readonly><?php echo $ass_data->note;?></textarea>
</div>
<div class="form-group">
<label> Subject Teacher</label>
<select class="form-control form-control-lg" name="subject_teacher" style="width: 100%;">
<option value="<?php echo $staff_data->full_name;?>" selected><?php echo $staff_data->full_name;?></option>
</select>
</div>
<div class="form-group">
<label>Upload Your Assignment</label>
<input type="file" name="ass_file" class="form-control form-control-file">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-dark mr-2 btn-md __loadingBtn__" type="submit">Upload</button>
<button class="btn btn-danger btn-md" type="reset">Cancel</button>
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
</div>
<?php include_once("templates/FooterScript.php");?>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".summernote").summernote({
			height:250
		});
		//when a submit btn is clicked 
		const SUBMIT_ASS_FORM =$("#uploadAssForm");
		SUBMIT_ASS_FORM.on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Submitting...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Upload').attr("disabled",false);
        $("#uploadAssForm")[0].reset();
        $("#server-response").html(data);
        //alert(data);
      },1000);
    }

  });
})
	})
</script>
</body>
</html>