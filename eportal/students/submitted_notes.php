<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>GSSOTA - Subject Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

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
<h1 class="text-center mb-5 text-warning">SEARCH ASSESSMENT REPORT.</h1>
<div class="row">
<div class="col-sm-4 col-12">
</div>

</div>
<div class="content-page">
<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
<input type="text" class="form-control floating" value="GSSOTA/09081" readonly>
<label class="focus-label">Student ID</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<select class="select2 form-control">
<option value="" selected>Choose Term...</option>
<option value="1st">1st Term</option>
<option value="2nd ">2nd Term</option>
<option value="3rd">3rd Term</option>
</select>
<label class="focus-label">Academic Term</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<select class="select2 form-control">
<option value="" selected>Choose Session...</option>
<option value="2021/2022">2021/2022</option>
<option value="2020/2021">2020/2021</option>
<option value="2019/2020">2019/2020</option>
</select>
<label class="focus-label">Academic Session</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<a href="#" class="btn btn-search rounded btn-block mb-3"> Search Assessment </a>
</div>
</div>
<h3 class="mt-3 text-center mb-3 text-success">ASSESSMENT REPORT FOR FIRST TERM 2021/2022.</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light">
<tr>
<th>Teacher</th>
<th>Subject </th>
<th>Topic</th>
<th>Sub Topic</th>
<th> Date</th>
<th>Note</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td>MATH001</td>
<td>Mathematics</td>
<td><?php echo 10; ?></td>
<td><?php echo 15; ?></td>
<td><?php echo 15; ?></td>
<td><?php echo 60; ?></td>
<td><span class="badge badge-danger"><?php echo 100; ?></span></td>
</tr>
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

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		$(".select2").select2();
	})
</script>
</body>
</html>
