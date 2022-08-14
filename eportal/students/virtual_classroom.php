<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?php echo $SmappDetails->school_name ?> - Subject Registration</title>
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
<h1 class="text-center mb-5 text-warning"><span class="fas fa-video"></span> VIRTUAL CLASSROOM.</h1>
<div class="row">
<div class="col-sm-4 col-12">
</div>

</div>
<div class="content-page">
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light text-center">
<tr>
<th>Teacher</th>
<th>Subject</th>
<th>Posted Date</th>
<th>Validity Date</th>
<th>Instruction </th>
<th>Total Downloads</th>
<th>Watch</th>
</tr>
</thead>
<tbody class="text-center">
<tr>
<td>Agberayi Samson</td>
<td>Mathematics</td>
<td><?php echo date("Y-m-d"); ?></td>
<td><button type="button" class="badge badge-success-border badge-lg">Read</button></td>
<td><button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
<i class="fas fa-download"></i> Download
</button> 
	</td>
<td><?php echo date("d-m-Y"); ?></td>
<td class="text-center">
<div class="btn-group mb-1">
<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="watch.php?type=mp4">Watch</a>
<a class="dropdown-item" href="#">Download</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Share Video Link</a>
</div>
</div>
</td>
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
		$(".datetimepicker").datetimepicker();
	})
</script>
</body>
</html>