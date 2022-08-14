<?php include_once ("visap_helper.php");?>
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
<div class="content-page">
<h1 class="mt-3 text-center mb-3 text-success">
SUBMITTED ASSIGNMENTS</h1>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light text-center">
<tr>
<th>S/N</th>
<th>Dead Line</th>
<th>Teacher</th>
<th>Subject</th>
<th>My Answer</th>
<th>Status</th>
<th>Submitted Date</th>
</tr>
</thead>
<tbody class="text-center">
	<?php 
	$all_submitted_ass = $Student->get_all_my_submitted_assignments($student_data->stdRegNo,$student_data->studentClass);
	if ($all_submitted_ass) {
		$cnt =0;
		foreach ($all_submitted_ass as $value) {
			$ass_data = $Student->get_assignmentById($value->question_id);
			$staff_data = $Staff->get_staff_ById($ass_data->teacherId);
			$cnt++;
			?>
			<tr>
<td><?php echo $cnt; ?></td>
<td><?php echo date("l jS F, Y",strtotime($ass_data->submission_date)); ?></td>
<td><?php echo ucwords($staff_data->full_name);?></td>
<td><?php echo ucwords($ass_data->subject)?></td>
<td><button type="button" class="badge badge-success-border badge-lg">Download</button></td>
<td><?php if ($value->status =='0') {
	echo '<span class="badge badge-danger-border badge-lg">Not Seen</span>';
} else
{
	echo '<span class="badge badge-success-border badge-lg">Seen</span>';
}

?></td>
<td><?php echo date("l jS F, Y",strtotime($value->Submitted_at)); ?></td>
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
</div>
</div>
</div>
</div>
</div>

<?php include_once("templates/FooterScript.php");?>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".datetimepicker").datetimepicker();
	})
</script>
</body>
</html>