<?php 
ob_start();
require_once "helpers/helper.php";
 ?>
 <?php 

if (isset($_GET['blogId']) && $_GET['blogId'] !=="" && isset($_GET['action']) && $_GET['action'] ==="view") {
 $blogId = $Configuration->Clean($_GET['blogId']);
 $all_comments = $Blog->get_all_blog_comments($blogId);
}else  {
  header("Location: uploadblog");
  exit();
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: School News</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                  <li class="breadcrumb-item active">
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comments-o fa-1x"></span> Blog Comments </h3>
  </div>
    </div>
    <!-- Statistics Cards Starts -->
        <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="row">
           <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-edit fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Unapproved</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Blog->count_blog_comment_by_blogId($blogId,"2");?></h2>
                </div>
              </div>
            </div>
             
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-comment fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Approved</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->count_blog_comment_by_blogId($blogId,"1");?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-comments fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Total Comments</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->count_blogComments($blogId);?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Revenue Growth Chart Starts -->
    <!-- content goes here -->
    <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="uploadblog"><button type="button" class="btn btn-dark btn-lg btn-round"><span class="fa fa-comment fa-1x"></span> Blogs</button></a> 
        </div>
        <div class="card-body card-dashboard">
       <div class="text-center" id="response"></div>
        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th width="5%">S/N</th>
                  <th width="15%">Client</th>
                  <th width="15%">Email</th>
                  <th width="25%">Comment</th>
                  <th width="10%">Status</th>
                  <th width="15%">Date</th>
                  <th width="15%">Options</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php if ($all_comments): ?>
                  <?php 
                  $cnt=0;
                   foreach ($all_comments as $value): ?>
                    <?php $cnt++; ?>
                    <tr>
                      <td width="5%"><?php echo $cnt; ?></td>
                  <td width="15%"><?php echo $value->guestName;?></td>
                  <td width="15%"><?php echo $value->user_email;?> </td>
                  <td width="25%"><?php echo $value->comment;?></td>
                  <td width="10%"> <?php if ($value->status=='1'): ?>
                  <span class="badge badge-success badge-rounded badge-lg">Approved</span>
                    <?php else: ?>
                       <span class="badge badge-danger badge-rounded badge-lg">Pending</span>
                  <?php endif ?> </td>
                  <td width="15%"><?php echo date("Y-m-d h:i:s a",strtotime($value->comment_date));?></td>
                  <td width="15%"> <?php if ($value->status=='0'): ?>
                  <button class="btn btn-dark btn-sm btn-rounded approve_btn m-1" data-id="<?php echo $value->commentId;?>" data-action="<?php echo 'approve_this_comment';?>">Approve</button>
                  <?php endif ?>
                    <button type="button" class="btn btn-danger btn-sm delete_btn">Delete</button></td>
                </tr>
                  <?php endforeach ?>
                <?php endif ?>
                
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
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/DataTableFooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
     <script>
       $(document).ready(function() {
        const approve_btn = $(".approve_btn");
        approve_btn.on("click", function(){
          let commentId = $(this).data('id');
          let comment_action = $(this).data('action');
         // alert(commentId+ " "+comment_action);
         //send request
         if (confirm("Are you sure you want to approve this comment?")) {
          $.post("../actions/delete_actions",{action:comment_action,comtId:commentId},function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
          },500);
         })
        }else{
          return false;
        }
        })
       });
     </script>
  </body>
  <!-- END: Body-->
</html>