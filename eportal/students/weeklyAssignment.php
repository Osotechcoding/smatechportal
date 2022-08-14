<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: Weekly Assignments</title>

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
<h3 class="text-center mb-5 text-warning">SEARCH WEEKLY ASSIGNMENT.</h3>
<div class="row">
<div class="col-sm-4 col-12">
</div>

</div>
<div class="content-page">
<form action="" method="POST">
<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
<select name="subject" id="subject" class="select2 form-control">
	<option value="">Choose...</option>
	<?php echo $Administration->get_all_subjects_InDropDown_list()?>
</select>
<label class="focus-label">Subject</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<input type="text" name="from_date" id="from_date" class="form-control datetimepicker" data-toggle="datetimepicker">
<label class="focus-label">From Date</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<input type="text" name="to_date" class="form-control datetimepicker" data-toggle="datetimepicker">
<label class="focus-label">To Date</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<button type="submit" name="filter-assignment-btn" class="btn btn-search rounded btn-block mb-3"> <i class="fas fa-search fa-1x"></i> Search  </button>
</div>

</div>
</form>
<?php if (isset($_POST['filter-assignment-btn'])): ?>
	<?php 
$from_date = $Configuration->Clean($_POST['from_date']);
$to_date = $Configuration->Clean($_POST['to_date']);
$subject = $Configuration->Clean($_POST['subject']);
$stdGrade = $student_data->studentClass;
if ($Configuration->isEmptyStr($from_date) || $Configuration->isEmptyStr($to_date) || $Configuration->isEmptyStr($subject)) {
	echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Subejct, From Date and To Date are required to Filter assignments","danger").'
          </div>';
}else{

//get all filtered ass
	$all_filtered = $Student->filter_class_assignmentByDate($stdGrade,$subject,$from_date,$to_date);
	if ($all_filtered) {?>
<h3 class="mt-3 text-center mb-3 text-info"> Assignment from <?php echo date("M j, Y",strtotime($from_date));?> To  <?php echo date("F j, Y",strtotime($to_date));?>, <?php echo strtoupper($activeSess->term_desc); ?>  <?php echo strtoupper($activeSess->session_desc_name);?>.</h3>
	<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light text-center">
<tr>
<th>Teacher</th>
<th>Subject</th>
<th>Posted Date</th>
<th>Note</th>
<th>Question </th>
<th>Submission Date</th>
<th>Action</th>
</tr>
</thead>
<tbody class="text-center">
<?php 
foreach ($all_filtered as $values) { 
		$staff_data = $Staff->get_staff_ById($values->teacherId);
		?>
<tr>
<td><?php echo ucwords($staff_data->full_name);?></td>
<td><?php echo ucwords($values->subject);?></td>
<td><?php echo date("l jS F,Y",strtotime($values->created_at)); ?></td>
<td><button type="button" class="btn btn-danger btn-sm view_btn" data-instruction="<?php echo $values->note;?>" data-title="<?php echo $values->subject;?>"><i class="fas fa-eye"></i> Read</button></td>
<td> <a href="ass_downloader?fileId=<?php echo $values->assId;?>&assignment_file=<?php echo $values->ass_content;?>"><button type="button" class="btn btn-dark btn-sm"><i class="fas fa-download"></i> Download</button></a>
	</td>
<td><?php echo date("l jS F,Y",strtotime($values->submission_date)); ?></td>
<td class="text-center">
<a href="submitmyAss?assidmi=<?php echo $values->assId;?>&action=submit"><button type="button" class="btn btn-outline-success btn-round btn-md">Upload Answer</button></a>
</td>
</tr>
		<?php
	}

 ?>
</tbody>
</table>
</div>
</div>
</div>

		<?php
	}else{
		echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("No Result Found!","danger").'
          </div>';
	}
}

	 ?>
	<?php else: ?>
		<h3 class="mt-3 text-center mb-3 text-success">WEEKLY ASSIGNMENT FOR <?php echo strtoupper($activeSess->term_desc); ?>  <?php echo strtoupper($activeSess->session_desc_name);?>.</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light text-center">
<tr>
<th>Teacher</th>
<th>Subject</th>
<th>Posted Date</th>
<th>Note</th>
<th>Question </th>
<th>Submission Date</th>
<th>Action</th>
</tr>
</thead>
<tbody class="text-center">
<?php 
$get_myassignments = $Student->get_all_students_assignments_by_class($student_data->studentClass);
if ($get_myassignments) {
	foreach ($get_myassignments as $value) { 
		$staff_data = $Staff->get_staff_ById($value->teacherId);
		?>
<tr>
<td><?php echo ucwords($staff_data->full_name);?></td>
<td><?php echo ucwords($value->subject);?></td>
<td><?php echo date("l jS F,Y",strtotime($value->created_at)); ?></td>
<td><button type="button" class="btn btn-danger btn-sm view_btn" data-instruction="<?php echo $value->note;?>" data-title="<?php echo $value->subject;?>"><i class="fas fa-eye"></i> Read</button></td>
<td> <a href="ass_downloader?fileId=<?php echo $value->assId;?>&assignment_file=<?php echo $value->ass_content;?>"><button type="button" class="btn btn-dark btn-sm"><i class="fas fa-download"></i> Download</button></a>
	</td>
<td><?php echo date("l jS F,Y",strtotime($value->submission_date)); ?></td>
<td class="text-center">
<a href="submitmyAss?assidmi=<?php echo $value->assId;?>&action=submit"><button type="button" class="btn btn-outline-success btn-round btn-md">Upload Answer</button></a>
</td>
</tr>
		<?php
	}
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
</div>
</div>

<!--Modal Read Instruction Starts -->
          <div class="modal fade text-left" id="ReadInstructModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="lesson_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- Modal Read Instruction ends -->

<?php include_once ("templates/FooterScript.php");?>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".datetimepicker").datetimepicker();
 //when view btn is clicked
  const view_btn = $(".view_btn");
  view_btn.on("click", function(){
     let instruction = $(this).data("instruction");
      $("#lesson_details").html(instruction);
    $("#ReadInstructModal").modal("show");
  })

	})
</script>
</body>
</html>