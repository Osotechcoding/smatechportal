<?php 
require_once "helpers/helper.php";
 ?>
 <?php 
/****************/
 require_once('classes/backup_restore.php'); 
    $newImport = new backup_restore(__OSO_HOST__,__OSO_DBNAME__,__OSO_USER__,__OSO_PASS__);
    if(isset($_GET['process'])){
        $process = $_GET['process'];
        if($process == 'backup'){
            $message = $newImport -> backup ();   
        }else if($process == 'restore'){
            $message = $newImport -> restore (); 
            @unlink('backups/database_'.__OSO_DBNAME__.'.sql');
        }
    }

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
   <?php include "template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Admin</a>
                  </li>
                  <li class="breadcrumb-item active">Backup Restore
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12 mb-3">
  <h2 class="text-bold-800"><span class="fa fa-server fa-2x"></span> SYSTEM BACKUP & RESTORE MODULE</h2>
  </div>
</div>
           <div class="col-md-12">
             <div class="alert alert-warning alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-bell"></i>
              <span>
              <strong>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti excepturi qui fugit culpa architecto vero repellendus atque omnis molestiae animi possimus repudiandae veniam, ipsa eius iusto. Ea hic voluptatum error!</strong>
              </span>
            </div>
          </div>
             <div class="row">
               <div class="col-md-6 col-sm-12 col-xl-6">
                 <div class="card">
                   <div class="card-body">
                  <a href="mybackup?process=backup" style="text-decoration: none; color: #fff;font-size: 35px;" class="btn btn-success btn-block"><span class="fa fa-database icon-lg text-white"></span> BACKUP NOW</a>
                   </div>
                 </div>
               </div>
               <!--  -->
                <div class="col-md-6 col-sm-12 col-xl-6">
                 <div class="card">
                   <div class="card-body">
                      <a href="mybackup?process=restore" style="text-decoration: none; color: #fff;font-size: 35px;" class="btn btn-warning btn-block"><span class="fa fa-server icon-lg"></span> RESTORE BACKUP</a>
                   </div>
                  
                 </div>
               </div>

             </div>
              <!-- start -->
             <?php if(isset($_GET['process'])): ?>
                            <?php 
                                $msg = $_GET['process'];   
                                $class = 'text-center';
                                switch($msg){
                                    case 'backup':
                                        $msg = '<h3 class="lead text-success text-center">System Backup Done Successfully!<br /> <br>Download the <a href="backups/'.$message.'" target="_blank" class="btn btn-info btn-sm text-white">SQL FILE </a> OR RESTORE ANY TIME</h3>'; 
                                        break;
                                    case 'restore':
                                        $msg = $message; 
                                        break;
                                    case 'upload':
                                        $msg = $message; 
                                        break;
                                    default:
                                        $class = 'hide';
                                }                                
                            ?>
                                <strong><?php echo $msg; ?></strong><br>
                        <?php endif; ?>
           <!-- response message end -->
           </div>
         
        </div>
      </div>
    </div>
    <!-- END: Content-->
   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->
    </div>
    <!-- demo chat-->
    <?php include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <?php include "template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>