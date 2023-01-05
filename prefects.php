
<?php if (!file_exists("Helper.php")) {
  die("Access is Denied!");
} else {
  require 'Helper.php';
}?>

<?php  $allPrefects = $Osotech->get_all_prefect_list();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
<?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title>The School Prefects :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
    <!-- ========== Favicon Icon ========== -->

    <!-- ========== Start Stylesheet ========== -->
    <?php if (!file_exists("Templates/HeaderScript.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/HeaderScript.php'; ?>
    <?php endif; ?>
    <style type="text/css">
        .osotech-img{
            width: 330px;
            height: 360px;
            border: 4px solid orange;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<!--start preloader-->
<div class="preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--end preloader-->
<div class="page-wrapper">
    <!-- start top header -->
    <header class="top-header py-2">
        <?php include_once ("Templates/TopNavBar.php"); ?>
    </header>
    <!-- end top header -->
    <!-- start main header -->
    <?php if (!file_exists("Templates/NavBar.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/NavBar.php'; ?>
    <?php endif; ?>

    <!-- end main header -->
    <!-- start side menu -->
  <?php if (file_exists("Templates/SideBar.php")):
    include_once 'Templates/SideBar.php'; ?>
  <?php endif; ?>
    <!-- end side menu -->
    <!-- start inner-banner -->
    <section class="inner-banner">
        <h1 class="font-weight-bold text-center">School Prefects</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start student -->
    <section class="student">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our School Prefects</span>
                <h2>Our Dedicated Prefects</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-4 col-md-12">
                    <div class="search-student border px-4 py-3">
                        <h4 class="font-weight-bold color-orange">Search Old Student</h4>
                        <form>
                           
                            <div class="form-group">
                                <label for="exampleDepartment">Graduation Year</label>
                                <select id="exampleDepartment" class="form-control" disabled>
                                    <option selected>Choose...</option>
                                    <option>2020-2021</option>
                                    <option>2021-2022</option>
                                    <option>2022-2023</option>
                                    <option>2023-2024</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn theme-orange border-0 mt-2" disabled>Coming Soon</button>
                        </form>
                    </div>

                    <div class="video my-4" data-aos="zoom-in" data-aos-duration="1000">
                        <img class="img-fluid" src="assets/images/playground.jpg" alt="video">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-fancybox="gallery"
                           class="video-btn text-white">
                            <i class="fa fa-play-circle fa-3x"></i>
                        </a>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <!-- startsss -->
                         <?php if ($allPrefects): ?>
                    <?php foreach ($allPrefects as $prefect): ?>
                        <?php $student_data = $Osotech->get_student_data_byId($prefect->student_id);?>
                        <div class="col-md-4 mb-4">
                            <div class="student-block">
                                <div class="student-img">
                                     <?php if ($student_data->stdPassport==NULL || $student_data->stdPassport==""): ?>
    <?php if ($student_data->stdGender == "Male"): ?>
      <img src="eportal/schoolImages/students/male.png" class="img-fluid d-block m-auto osotech-img">
      <?php else: ?>
        <img src="eportal/schoolImages/students/female.png" class="img-fluid d-block m-auto osotech-img">
    <?php endif ?>
      <?php else: ?>
        <img src="eportal/schoolImages/students/<?php echo $student_data->stdPassport;?>" class="img-fluid d-block m-auto osotech-img" width="150" height="150">
    <?php endif ?>
                                   
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h5 class="font-weight-bold color-orange"><?php echo strtoupper($student_data->full_name);?></h5>
                                        <h6><b>REG NO:</b> <?php echo strtoupper($student_data->stdRegNo);?></h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>POSITION HELD:</b><?php echo ucwords($prefect->officeName);?></h6>
                                        
                                        <h6><b><?php echo $prefect->school_session;?>:</b> Set.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php endforeach ?>
                <?php else: ?>
                  <div class="mt-3">
  <div class="alert alert-info alert-dismissible fade show" role="alert">
   <h4 class="text-center"> <strong>Looking for Prefect? </strong>No Prefects to display at the moment!</h4>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>  
                <?php endif ?>
                        <!-- endsss -->

                        <!-- <div class="col-md-6">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/male.png" class="img-fluid d-block m-auto osotech-img" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h5 class="font-weight-bold color-orange">Osotech Software Inc.</h5>
                                        <h6><b>REG NO:</b> 2021C124310004</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>POSITION HELD:</b>Head Boy</h6>
                                        <h6><b>D.O.B:</b><?php echo date("M j, Y", strtotime('-3300day')) ?>.</h6>
                                        <h6><b>2020/2021:</b> Set.</h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end student -->
    <!-- start footer -->
  <?php if (file_exists("Templates/Footer.php")) {
  include_once 'Templates/Footer.php';
  } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
</div>
<!-- ===============jQuery Frameworks============= -->
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>

<!-- end -->