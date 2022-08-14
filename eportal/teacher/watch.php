<?php 
require_once "helpers/helper.php";
 ?>
  <?php 
  if (isset($_REQUEST['type']) && isset($_REQUEST['lessonId']) && !$Configuration->isEmptyStr($_REQUEST['lessonId'])) {
     $video_type = $_REQUEST['type'];
     $lectureId = $Configuration->Clean($_REQUEST['lessonId']);
     $video_data = $Administration->get_virtual_lecture_ById($lectureId);
  }else{
    header("location: upload_lecture");
    exit();
  }
     ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Watch </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?> </a>
                  </li>
                  <li class="breadcrumb-item active">Online Lesson
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
         <div class="content-body"><!-- medai Player Start here -->
          <div class="row">
            <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><?php echo ucwords($video_data->subject)?> for <?php echo strtoupper($video_data->lesson_grade)?></h3>
                <h3>Topic: <?php echo ucfirst($video_data->lesson_topic)?><br>
                 <span class="text-warning">Uploaded On: <?php echo date("l jS F Y",strtotime($video_data->uploaded_date))?></span></h3>
                 <h4>Uploaded By : Mr. Agberayi Samson Idowu</h4>
                 <h5 class="text-danger">Available Til : <?php echo date("l jS F Y",strtotime($video_data->date_to)) ?></h5>
  </div>
            
          </div>
 <section id="media-player-wrapper">
  <div class="row">
    <?php if ($video_type =="video/mp4"): ?>
       <div class="col-md-12">
      <div class="card p-2">
        <!-- width="320" height="240" -->
        <video controls width="100%" height="500" autoplay="autoplay" style="border:2px solid black;">
          <source src="../lecture_file/<?php echo $video_data->lesson_file;?>" type="video/mp4">
        </video>
        <!-- VIDEO END -->
      </div>
    </div>
    <?php endif ?>

    <?php if ($video_type =="audio/mp3"): ?>
      <div class="col-md-12">
      <div class="card p-2">
        <!-- AUDIO -->
        <!-- <h6 class="card-title">Audio</h6> -->
        <audio id="plyr-audio-player" class="audio-player ytplayer" controls>
          <source src="../lecture_file/<?php echo $video_data->lesson_file;?>" type="audio/mp3" />
          <!-- <source src="lecture_file/song1.mp3" type="audio/mp3" /> -->
        </audio>
        <!-- AUDIO END -->
      </div>
    </div>
    <?php endif ?>
    <?php if ($video_type =="application/pdf"): ?>
<div class="col-md-12">
      <div class="card p-2">
        <iframe id="Iframe1" src="../lecture_file/<?php echo $video_data->lesson_file;?>" frameborder="0" width="100%"  style="overflow:hidden; width:99%; height: 506px; z-index: 104; left: 4px; ; top: 231px;" visible="true" scrolling="no"> </iframe>
       <!--  <iframe src="../lecture_file/<?php //echo $video_data->lesson_file;?>" width="100%" height="500px" style='padding-bottom:90%' type="application/pdf">
    </iframe> -->
      </div>
    </div>
    <?php endif ?>
  </div>
</section>
<button onclick="go_back('upload_lecture');" class="btn btn-danger btn-md btn-round back_btn"><span class="fa fa-power-off fa-1x"></span> Go Back</button>
        </div>
      </div>
    </div>
    <!-- END: Content-->
   <!-- BEGIN: Customizer-->
   
    </div>
  
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script>
      function go_back(url){
        $(".back_btn").html('<img src="../assets/loaders/rolling_loader.svg" width="30">').removeClass('btn-danger').addClass('btn-dark');
        setTimeout(()=>{
          window.location.assign(url);
        },1500);
      }
    </script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>