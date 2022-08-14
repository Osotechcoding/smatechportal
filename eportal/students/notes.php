<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: My Note</title>

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
<h2 class="mb-2 text-center"><i class="fas fa-pencil-alt"></i> My English Class Notes.</h2>
<div class="row">
<div class="col-sm-4 col-12">
</div>
<div class="col-sm-8 col-12 text-right add-btn-col">
<a href="writenote.php" class="btn btn-primary btn-rounded float-right"><i class="fas fa-edit"></i> Write New Note</a>

</div>
</div>

<div class="row staff-grid-row">

<!-- Subject Note Starts -->
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="student-profile.html" class="avatar">V</a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="single_note.php"><i class="fas fa-pencil-alt m-r-5"></i> Read Note</a>
</div>
</div>
<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="notes.php?std_subject_notId=1&stdId=1&term=1st&aca_sess=2022-2023">Verbs</a></h4>
<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="notes.php?std_subject_notId=1&stdId=1&term=1st&aca_sess=2022-2023">Date: 20-04-2022</a></h4>
</div>
</div>
<!-- Subject Note Starts -->
</div>

</div>
</div>
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/app.js"></script>
</body>
</html>