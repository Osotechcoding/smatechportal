<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Portal Configuration </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/dataTableHeaderLink.php";?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Module Configuration
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-cogs fa-1x"></span> Disable & Enable Portal  Modules </h3>
  </div>
    </div>
    <!-- Dropdown Buttons options -->
    <div class="btn-group dropdown mb-1 float-right mb-2">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-danger register" href="controlRegistration"> Registration</a>
              <a class="dropdown-item text-warning login2" href="controlLogin"> Login Settings</a>
              <!--  <a class="dropdown-item text-info apiBtn" href="controlApi"> Payment gateway</a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-primary roleBtn" href="controlRoom"> Main Settings</a>
            </div>
          </div>
          <div class="clearfix"></div>
          <!-- Dropdown Buttons options -->
           <!-- start-clients contant-->
                      
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                             <!-- page contend goes here -->
                        <div class="card">
                          <div class="card-body">
                         
                                <div class="table-responsive">
                            <table  class="table table-striped table-bordered text-center osotechDatatable">
                                        <thead class="text-center">
                                            <tr>
                                                <!-- <th>S/N</th> -->
                                                <th>Module Name</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                       <?php 
                                       $get_modules = $Configuration->get_configuration_modules_by_type("main");
                                       if ($get_modules) {
                                        $cnt=0;
                                        foreach ($get_modules as $modules) {
                                          $cnt++;?>
                                          <tr>
                                            <!-- <td><?php //echo $cnt; ?> </td> -->
                                            <td><?php echo $modules->description;?> </td>
                                            <td>

                                      <?php if ($modules->status=='1') {
                                       if ($modules->module =='maintenance_mode') {
                                         // code...
                                        echo '<span class="badge badge-danger badge-md">Deactivated</span>';
                                       }else{
                                        echo '<span class="badge badge-success badge-md">Enabled</span>';
                                       }
                                      }else{
                                        if ($modules->module =='maintenance_mode') {
                                         // code...
                                        echo '<span class="badge badge-success badge-md">Activated</span>';
                                       }else{
                                        echo '<span class="badge badge-danger badge-md">Disabled</span>';
                                       }
                                        
                                      }
                                       ?></td>
                                            <td>
                                              <?php echo $modules->detail;?> 
                                           </td>
                                            <td><?php if ($modules->status=='1'): ?>
                                            <?php if ($modules->module =='maintenance_mode'): ?>
                                              <span class="btn btn-success btn-sm disable_module" data-action="disable_module" data-id="<?php echo $modules->id;?>">Activate </span> <i class="fa fa-reply-all" style="color: purple;width: 12px; height: auto;"></i>
                                            <?php else: ?>
                                              <span class="btn btn-warning btn-sm disable_module" data-action="disable_module" data-id="<?php echo $modules->id; ?>">Disable </span> <i class="fa fa-reply-all" style="color: purple;width: 12px; height: auto;"></i>
                                            <?php endif ?>
                                              <?php else: ?>
                                                <?php if ($modules->module =='maintenance_mode'): ?>
                                                  <span class="btn btn-danger btn-sm enable_module" data-action="enable_module" data-id="<?php echo $modules->id; ?>">Deactivate</span> <i class="fa fa-reply-all" style="color: purple;width: 12px; height: auto;"></i>
                                              <?php else: ?>
                                                <span class="btn btn-dark btn-sm enable_module" data-action="enable_module" data-id="<?php echo $modules->id; ?>">Enable </span> <i class="fa fa-reply-all" style="color: purple;width: 12px; height: auto;"></i>

                                            <?php endif ?>
                                            <?php endif ?> </td>
                                          </tr>
                                          <?php
                                        }
                                       }
                                        ?>
                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <!-- <th>S/N</th> -->
                                                <th>Module Name</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                            <button class="mb-4 mt-3 btn btn-success btn-round all-enable ml-2" data-action="enable_all" data-module="main" type="button" style="float: right;">
                            <i class="fa fa-key"></i> Enable All Modules</button>
                                    <button class="mb-4 mt-3 btn btn-danger btn-round all-disable" data-action="disable_all" data-module="main" type="button" style="float: right;"><i class="fa fa-lock"></i> Disable All Modules</button>
                                </div>
                          </div>
                        </div>
                        

                   
                            </div>
                        </div>
                        <!-- end-clients contant-->
    <!-- content goes here -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
   
    </div>
    <!-- demo chat-->
 
    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script>

    jQuery.noConflict();
(function($) {
  $(function() {
    // More code using $ as alias to jQuery
     //disable and enable module btn action 
            $(document).on('click','.disable_module', function(){
            let module_id = $(this).data('id');
            let action = $(this).data('action');
            $.post("../actions/actions",{module_id:module_id,
            action:action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })
            });
            //disable and enable module btn action 
            $('.enable_module').on('click', function(){
            let module_id = $(this).data('id');
            let action = $(this).data('action');
            //alert(action);
            //do ajax call 
            $.post("../actions/actions",{module_id:module_id,
            action:action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })

                });
            //enable and disable all login
            //diable all module 
            $(".all-disable").on('click', function(){
            let module_name = $(this).data('module');
            let module_action = $(this).data('action');
            $.post("../actions/actions",{module_name:module_name,
            action:module_action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })
            });
            //Enable all Modules
            //diable all module 
            $(".all-enable").on('click', function(){
            let module_name = $(this).data('module');
            let module_action = $(this).data('action');
            $.post("../actions/actions",{module_name:module_name,
            action:module_action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            });
            })
  });
})(jQuery);
            
    </script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>