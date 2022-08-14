<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $SmappDetails->school_name ?> - Online Classroom</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

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
<h3 class="mb-3 text-center text-info">Currently Watching English Language Lesson for JSS1 <br> Develiered by Mr. Ojo Samson On 23rd March, 2022 @ 2:00PM</h3>
<section id="media-player-wrapper">
  <div class="row">
          <div class="col-md-12">
      <div class="card p-2">
        <!-- <h6 class="card-title">Video</h6> -->
        <!-- VIDEO allow="autoplay" -->
<!-- default width and height are 320 & 240 respectively -->
        <video width="auto" height="auto" allowfullscreen autoplay controls style="border:1px solid black;">
  <source src="../lecture_file/Osotechcoding_0046.mp4" type="video/mp4">
</video>
        <!-- <div class="video-player" id="plyr-video-player">
          <iframe id="ytplayer" width="100%" height="500" >
          </iframe>
        </div> -->
        <!-- VIDEO END -->
      </div>
    </div>
          
  </div>
 
</section>
<button onclick="go_back('virtual_classroom.php');" class="btn btn-danger btn-md btn-round back_btn"><span class="fa fa-power-off fa-1x"></span> Go Back</button>

</div>
</div>
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/app.js"></script>

    <script>
      function go_back(url){
        $(".back_btn").html("Please wait...").removeClass('btn-danger').addClass('btn-dark');
        setTimeout(()=>{
          window.location.assign(url);
        },1500);
      }
    </script>
</body>
</html>