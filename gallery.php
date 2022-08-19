<?php if (!file_exists("Helper.php")) {
  die("Access is Denied!");
} else {
  require 'Helper.php';
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
  <?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title>Edusquad</title>
    <?php if (!file_exists("Templates/HeaderScript.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/HeaderScript.php'; ?>
    <?php endif; ?>
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
        <h1 class="font-weight-bold text-center">Welcome to Our Gallery Page</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start gallery -->
    <section class="course">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our School Gallery</span>
                <h2>Life At <?php echo ($Osotech->getConfigData()->school_name);?></h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <ul class="nav nav-pills mb-3 p-0 justify-content-center" id="pills-tab" role="tablist" data-aos="fade-up"
                data-aos-duration="1000">
                <li class="nav-item">
                    <a class="nav-link active" id="showall-tab" data-toggle="pill" href="#showall" role="tab"
                       aria-controls="showall" aria-selected="true">Show All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="YearBook-tab" data-toggle="pill" href="#YearBook" role="tab"
                       aria-selected="false">Yearbook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Gallery-tab" data-toggle="pill" href="#Gallery" role="tab"
                       aria-selected="false">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Anniversary-tab" data-toggle="pill" href="#Anniversary" role="tab"
                        aria-selected="false">Anniversary</a>
                </li>
            </ul>

            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane  fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">

                      <?php $schoolGallery = $Osotech->getGalleryImages();
                      if ($schoolGallery) {
                        foreach ($schoolGallery as $Xmg) {?>
                          <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                              <img class="img-fluid" src="eportal/gallery/<?php echo $Xmg->image; ?>" alt="<?php echo $Xmg->type;?>">
                              <div class="overlay"></div>
                              <div class="overlay-text">
                                  <a href="eportal/gallery/<?php echo $Xmg->image;?>" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                  <h5 class="text-center font-weight-bold"><?php echo strtoupper($Xmg->title);?></h5>
                              </div>
                          </div>
                          <?php
                        }
                      }
                      ?>
                    </div>

                    <div class="tab-pane  fade" id="YearBook" role="tabpanel" aria-labelledby="YearBook-tab">
                      <?php $schoolGallery = $Osotech->GalleryByType("yearbook");
                   if ($schoolGallery) {
                       foreach ($schoolGallery as $yearbook) {?>
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="img-fluid " src="eportal/gallery/<?php echo $yearbook->image; ?>" alt="<?php echo $yearbook->type;?>">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="eportal/gallery/<?php echo $yearbook->image; ?>" data-fancybox="<?php echo $yearbook->type;?>"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold"><?php echo ucfirst($yearbook->title) ?></h5>
                            </div>
                        </div>
                        <?php
                       }
                   }
                    ?>

                    </div>
                    <div class="tab-pane fade" id="Gallery" role="tabpanel" aria-labelledby="Gallery-tab">

                      <?php $schoolGallery = $Osotech->GalleryByType("gallery");
                   if ($schoolGallery) {
                       foreach ($schoolGallery as $gallery) {?>
                         <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                             <img class="img-fluid " src="eportal/gallery/<?php echo $gallery->image; ?>" alt="<?php echo $gallery->type;?>">
                             <div class="overlay"></div>
                             <div class="overlay-text">
                                 <a href="eportal/gallery/<?php echo $gallery->image; ?>" data-fancybox="<?php echo $gallery->type;?>"><i class="fa fa-plus fa-2x"></i></a>
                                 <h5 class="font-weight-bold"><?php echo ucfirst($gallery->title) ?></h5>
                             </div>
                         </div>
                        <?php
                       }
                   }

                    ?>

                    </div>
                    <div class="tab-pane fade" id="Anniversary" role="tabpanel" aria-labelledby="Anniversary-tab">

                      <?php $schoolGallery = $Osotech->GalleryByType("anniversary");
                   if ($schoolGallery) {
                       foreach ($schoolGallery as $anniversary) {?>
                         <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                             <img class="img-fluid " src="eportal/gallery/<?php echo $anniversary->image; ?>" alt="<?php echo $anniversary->type;?>">
                             <div class="overlay"></div>
                             <div class="overlay-text">
                                 <a href="eportal/gallery/<?php echo $anniversary->image; ?>" data-fancybox="<?php echo $anniversary->type;?>"><i class="fa fa-plus fa-2x"></i></a>
                                 <h5 class="font-weight-bold"><?php echo ucfirst($anniversary->title) ?></h5>
                             </div>
                         </div>
                        <?php
                       }
                   }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery -->
    <!-- start footer -->
  <?php if (file_exists("Templates/Footer.php")) {
  include_once 'Templates/Footer.php';
  } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
</div>
<!-- ===============jQuery Frameworks============= -->
<?php if (file_exists("Templates/FooterScript.php")): ?>
  <?php include_once 'Templates/FooterScript.php';?>
<?php endif; ?>
</body>

</html>
