<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Subjects Registration</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->../
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <!--  -->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"> Subjects Registration
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-book fa-1x"></span> STUDENT EXAM SUBJECT REGISTRATION</h3>
  </div>
          </div>
          
          <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Subjects</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects(); ?></h2>
                </div>
              </div>
            </div>
           
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Active </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_subjects_status("active"); ?></h2>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Registered </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Administration->count_all_registered_subjects(); ?></h2>
                  
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
      
    <div class="card">
     
      <div class="card-body">
        <!-- filter student -->
       <div class="users-list-filter px-1">
        <form id="subject_register_form">
            <div class="row border rounded py-2 mb-2">
                
                <div class="col-md-4">
                    <label for="ClassGrade">Student Class</label>
                    <fieldset class="form-group">
                      <input type="hidden" name="submittedBy" value="<?php echo $_SESSION['ADMIN_USERNAME'];?>">
                     <select name="subject_class" id="subject_class" class="select2 form-control">
                       <option value="" selected>Choose...</option>
                        <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                     </select>
                    </fieldset>
                </div>
                <div class="col-md-5">
                    <label for="subject">Select Subject to Register</label>
                    <fieldset class="form-group">
                      <select class="form-control select2" name="subject" id="subject">
                            <option value="" selected>Choose...</option>
                          <?php echo $Administration->get_all_subjects_InDropDown_list();?>
                        </select>
                    </fieldset>
                    <input type="hidden" name="action" value="register_class_subject">
                   <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                    
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <button type="submit" class="btn btn-dark btn-lg btn-block glow users-list-clear mb-0 __loadingBtn__2">Register</button>
                </div>
            </div>
            <div class="col-md-12 text-center server-response" id="result-responseText"></div>
        </form>
    </div>
      <!-- filter student ends -->
        <div class="col-md-12 text-center" id="delete_response"></div>
        <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Class Name</th>
          <th>Subject Name</th>
          <th>Registered At</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
$regiestered_subejcts = $Administration->get_all_registered_subejcts_principal();
if ($regiestered_subejcts) {
  // code...
  $cnt =0;
  foreach ($regiestered_subejcts as $allSubject) { 
    $cnt++;
    ?>
    <tr>
<td><?php echo $cnt;?></td>
<td><?php echo strtoupper($allSubject->subject_class);?></td>
<td><?php echo ucwords($allSubject->subject_name);?></td>
<td><?php echo date("l jS F Y",strtotime($allSubject->created_at));?></td>
<td class="text-right">
</a>
<button type="button" data-id="<?php echo $allSubject->id;?>" data-value="<?php echo $allSubject->subject_name;?>" class="btn btn-danger btn-sm mb-1 remove_sub_btn __loadingBtn2__<?php echo $allSubject->id;?>">
<i class="far fa-trash-alt"></i> Unregister
</button>
</td>
</tr>
    <?php
    // code...
  }
}


   ?>
      </tbody>
      </table>
    </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <script>
     $(document).ready(function(){
    //when unregister btn is clicked
    const remove_sub_btn = $(".remove_sub_btn");
    remove_sub_btn.on("click", function(){
      let theId = $(this).data("id");
      let subject = $(this).data("value");
      let action = 'unregistered_exam_subject_now';
      var is_true = confirm("Are you Sure you really want to unregister this Subject?");
      if (is_true) {
        $(".__loadingBtn2__"+theId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/actions",{action:action,theId:theId,subId:subject},function(data){
          setTimeout(()=>{
            $(".__loadingBtn2__"+theId).html("<i class='far fa-trash-alt'></i> Unregister").attr("disabled",false);
            $(".server-response").html(data);
          },500);
        });
      }else{
        return false;
      }
    })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $("#subject_register_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__2").html('<img src="../assets/loaders/rolling_loader.svg" width="30">').attr("disabled",true);
        const subject_register_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",subject_register_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__2").html('Register').attr("disabled",false);
        $("#result-responseText").html(data);
          },500);
        })
    
      });
     })
   </script>
  </body>
  <!-- END: Body-->

</html>