<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: My Performance</title>

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
<h1 class="text-center mb-5 text-warning">SEARCH ASSESSMENT REPORT.</h1>
<div class="row">
<div class="col-sm-4 col-12">
</div>

</div>
<div class="content-page">
<form action="" method="post">
<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
<?php include ("templates/stdHiddenVals.php");?>
<input type="text" class="form-control floating" value="<?php echo $student_data->stdRegNo;?>" readonly>
<label class="focus-label">Your ID</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<select name="schoolterm" class="custom-select form-control">
<option value="" selected>Choose Term...</option>
<option value="1st Term">1st Term</option>
<option value="2nd Term">2nd Term</option>
<option value="3rd Term">3rd Term</option>
</select>
<label class="focus-label">Academic Term</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<select name="aca_session" class="select2 form-control">
<option value="" selected>Choose Session...</option>
<?php echo $Administration->get_all_session_lists();?>
</select>
<label class="focus-label">Academic Session</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<button type="submit" name="search_assessment_btn" class="btn btn-search rounded btn-block mb-3"> Search Assessment </button>
</div>
</div>

	
</form>
<?php if (isset($_POST['search_assessment_btn'])): ?>
	<!-- Check for empty fileds -->
	<?php 
	$term =$_POST['schoolterm'];
	$aca_session = $_POST['aca_session'];
	if (empty($term) || empty($aca_session)) {
	echo ' <div class="text-center col-md-12">
          <div class="alert alert-danger alert-dismissible fade show">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> Academic Term & Academic Session is Required!.
     </div></div>';
	}else{?>
<h3 class="mt-3 text-center mb-3 text-success">ASSESSMENT REPORT FOR <?php echo $term;?> TERM <?php echo $aca_session; ?>.</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light">
<tr>
<th>Subject Name</th>
<th>Continous Assessment (40)</th>
<th>Examination (60)</th>
<th>Overall (100)</th>
</tr>
</thead>
<tbody>
	<?php 
$filter_assessments = $Student->get_all_my_assessments_by_filter($student_data->stdRegNo,$student_data->studentClass,$term,$aca_session);
if ($filter_assessments) {
	// code...
	foreach ($filter_assessments as $fAssessment) {?>
		<tr>
<td><?php echo $fAssessment->subjectName;?></td>
<td><?php echo $fAssessment->ca;?></td>
<td><?php echo $fAssessment->exam;?></td>
<td>
	<?php if ($fAssessment->overallMark >= 60): ?>
		 <span class="badge badge-success-border badge-lg badge-pill"><?php echo $fAssessment->overallMark;?></span>
		<?php else: ?>
 <span class="badge badge-danger-border badge-lg badge-pill"><?php echo $fAssessment->overallMark;?></span>
	<?php endif ?>
</td>
</tr>
		<?php
		// code...
	}
}else{
	echo ' <div class="text-center col-md-12">
          <div class="alert alert-danger alert-dismissible fade show">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> No Result Found!.
     </div></div>';
}

	 ?>
</tbody>
</table>
</div>
</div>
</div>
	<?php }


	 ?>
	<?php else: ?>
		<h3 class="mt-3 text-center mb-3 text-success">ASSESSMENT REPORT FOR FIRST TERM 2021/2022.</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable text-center">
<thead class="thead-light">
<tr>
<th>Subject Name</th>
<th>Continous Assessment (40)</th>
<th>Examination (60)</th>
<th>Overall (100)</th>
</tr>
</thead>
<tbody class="text-center">
	<!--  -->
	<?php 
$get_assessments = $Student->get_all_my_assessments_by_student_id($student_data->stdId,$student_data->stdRegNo,$student_data->studentClass);
if ($get_assessments) {
	foreach ($get_assessments as $assessment) {?>
		<tr>
<td><?php echo $assessment->subjectName;?></td>
<td><?php echo $assessment->ca;?></td>
<td><?php echo $assessment->exam;?></td>
<td><span class="badge badge-danger"><?php echo $assessment->overallMark;?></span></td>
</tr>
		<?php
		// code...
	}
}else{
	echo ' <div class="text-center col-md-12">
          <div class="alert alert-info alert-dismissible fade show">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Notice!</strong> No Result Found!.
     </div></div>';
}

	 ?>
</tbody>
</table>
</div>
</div>
</div>
<?php endif ?>

</div>

</div>

</div>
<?php //include "../template/footer.php"; ?>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/toastr/toastr.js"></script>

<script src="assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		//my_toastr("Please Select Term and Session to filter Assessment");
		$(".select2").select2();
	})

	function my_toastr(msg,title="GSSOTA SAYS"){
	toastr.info(msg,title,{showMethod:"slideDown",hideMethod:"fadeOut",timeOut:10000,progressBar:!0});
	}
</script>
</body>
</html>