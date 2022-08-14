<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Fee Component - VISAP</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->

  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">GSSOTA PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Fee Component Management
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-money fa-1x"></span> FEE COMPONENT</h3>
  </div>
          </div>
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-sm btn-rounded" data-toggle="modal" data-target="#add_Component_Modal"><i class="fa fa-money fa-2x"></i> Add Component</button>
          <a href="fee_allocate"> <button type="button" class="btn btn-warning btn-md btn-round"> Fee Allocation</button></a>
        </div>
      <div class="card-body">
        <div class="text-center col-md-12" id="osotech_res"></div>
        <div class="table-responsive">
      <table class="table osotechDatatable table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>COMPONENT</th>
          <th>STATUS</th>
          <th>CREATED</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
        <?php $all_fees =$Administration->get_all_fee_components();
        if ($all_fees) {
          $x =0;
         foreach ($all_fees as $fees) {
           // code...
          $x++;
          ?>
        <tr>
          <td><?php echo $x;?></td>
          <td><?php echo ucwords($fees->feeType) ?></td>
          <td><?php if ($fees->fee_status =="Active"): ?>
          <span class="badge badge-success badge-md">Active</span>
            <?php else: ?>
          <span class="badge badge-danger badge-md">Inactive</span>
          <?php endif ?> </td>
          <td><?php echo date("j F Y",strtotime($fees->date))?></td>
         <td> <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
             <a class="dropdown-item text-info edit_btn_compo" href="javascript:void(0);" data-id="<?php echo $fees->compId;?>" data-action="show_component_edit_modal">Edit</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger delete_btn" data-compo="<?php echo $fees->compId;?>" href="javascript:void(0);">Delete</a>
            </div>
          </div> </td>
        </tr>
          <?php
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
    <!-- demo chat-->
    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="add_Component_Modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-money fa-1x"></span> Add Fee Component</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12" id="response"></div>
                <form id="Component_Form_Fee">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-8">
                  <div class="form-group">
                  <label for="component_desc">Component Type</label>
              <input type="text" id="component_desc" autocomplete="off" class="form-control" name="component_desc" placeholder="e.g Tuition">
                    </div>
               </div>

                   <div class="col-md-4">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="status" id="status" class="form-control">
                 <option value="">Choose...</option>
                 <option value="active">Active</option>
                 <option value="pending">Pending</option>
               </select>
                </div>
              </div>
              <input type="hidden" name="action" value="create_component_now">
              <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="Update_Component_Fee_Modal_Form" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-md">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-edit fa-1x"></span> Update Component</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <div class="text-center col-md-12" id="response2"></div>
                <form id="Update_Component_Form_Fee">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="show_component_details_div">
                  </div>
                </div>
                <input type="hidden" name="action" value="update_fee_compo_now">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn2__">
                     Save Changes</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
     $(".osotechDatatable").DataTable();
     //when edit btn is clicked
     const edit_btn_compo = $(".edit_btn_compo");
     edit_btn_compo.on("click", function(){
      let compoId = $(this).data("id");
      let action = $(this).data("action");
      //send request
      $.ajax({
        url:"../actions/update_actions",
        type:"POST",
        data:{action:action,compoId:compoId},
        success:function(res){
          setTimeout(()=>{
        $("#show_component_details_div").html(res);
        $("#Update_Component_Fee_Modal_Form").modal("show");
        },500);
        }
      });
     })
     //when create component form is submitted
     const Component_Form_Fee = $("#Component_Form_Fee");
        Component_Form_Fee.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request
      $.post("../actions/actions",Component_Form_Fee.serialize(),function(data){
        setTimeout(()=>{
      $(".__loadingBtn__").html('Submit').attr("disabled",false);
       $("#Component_Form_Fee")[0].reset();
       $("#response").html(data);
        },1500);
      })
        });
 //when Update component form is submitted
        //Update_Component_Form_Fee
         const Update_Component_Form_Fee = $("#Update_Component_Form_Fee");
        Update_Component_Form_Fee.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request
      $.post("../actions/update_actions",Update_Component_Form_Fee.serialize(),function(data){
        setTimeout(()=>{
      $(".__loadingBtn2__").html('Submit').attr("disabled",false);
       $("#response2").html(data);
        },1500);
      })
        });
        //when a delete btn is clicked
      const  $delete_btn = $(".delete_btn");
      $delete_btn.on("click", function(){
         let Id = $(this).data("compo");
        let action = "delete_compo";
        //send request
       const is_true = confirm("Are you sure you want to execute this command? You CANNOT Undo this action!");
       if (is_true) {
         $.post("../actions/delete_actions",{action:action,Id:Id},function(r){
         setTimeout(()=>{
           $("#osotech_res").html(r);
         // alert(r);
         },500);
        })
       }else{
        return false;
       }
      })
     })
   </script>
  </body>
  <!-- END: Body-->

</html>
