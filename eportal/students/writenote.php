<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?php echo $SmappDetails->school_name ?> - Classnote Copier</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">

<link rel="stylesheet" href="assets/css/style.css">
<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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
	<div class="text-center mb-2"><h3 id="server-response"></h3></div>
<h2 class="mb-2 text-center">Write Class Note Here.</h2>
<div class="page-content1">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<form id="studentNoteForm">
<div class="form-group">
	<?php include_once("templates/stdHiddenVals.php");?>
<input type="hidden" name="action" value="upload_student_classNote">
<input type="text" class="form-control form-control-lg" readonly value="Adekola Adeola">
</div>
<div class="form-group">
<label>Subject</label>
<select class="form-control select2" style="width: 100%;" name="subject_id">
<option value="">Select</option>
<option value="1">Computer</option>
<option value="2">Science</option>
<option value="3">Maths</option>
<option value="4">Tamil</option>
<option value="5">English</option>
<option value="6">Social Science</option>
</select>
</div>
<div class="form-group">
<label>Topic</label>
<input type="text" name="topic" class="form-control form-control-lg">
</div>

<div class="form-group">
<label>Sub-Topic <span class="text-danger">(Optional)</span></label>
<input type="text" name="subtopic" class="form-control form-control-lg">
</div>
<div class="form-group">
<label> Subject Teacher</label>
<select class="form-control select2" name="subject_teacher" style="width: 100%;">
<option value="">Select...</option>
<option value="1">Agberayi Samson</option>
<option value="2">Bolanle Adeola</option>
<option value="3">Caroline Oseni</option>
<option value="4">David Olaoluwa</option>
</select>
</div>

<div class="form-group">
<label>Note Content here</label>
<textarea name="note_content" class="form-control form-control-lg summernote"></textarea>
</div>

<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="form-group">
<label>Note Diagram <span class="text-danger">(Optional)</span></label>
<input type="file" name="pic[]" accept="image/*" multiple class="form-control">
</div>
</div> -->
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="form-group text-center custom-mt-form-group">
<button class="btn btn-primary mr-2 btn-lg __loadingBtn__" type="submit">Submit Classnote</button>
<button class="btn btn-secondary btn-lg" type="reset">Cancel</button>
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
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

<script src="assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".summernote").summernote({
			height:250
		});

		//when a submit btn is clicked 
		const studentNoteForm =$("#studentNoteForm");
		studentNoteForm.on("submit", (event)=>{
			event.preventDefault();
			 $(".__loadingBtn__").html('<img src="../../loaders/rolling_loader.svg" width="30"> Processing...');
			//send to server
			$.post("../admin/actions/actions",studentNoteForm.serialize(),(res)=>{
				setTimeout(()=>{
					$("#server-response").html(res);
					 $(".__loadingBtn__").html('Submit Classnote');
				},2000);
			});
		})
	})
</script>
</body>
</html>