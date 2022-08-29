<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Fee Allocation</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                   <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Fee Allocation
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-money fa-1x"></span> FEE & LEVY STRUCTURE</h3>
  </div>
    </div>
     <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-danger btn-md btn-rounded" data-toggle="modal" data-target="#addAllocateModalRForm"> Create Structure</button>
          <a href="fee_component"> <button type="button" class="btn btn-warning btn-md btn-round" > View Component </button></a>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>CLASS</th>
          <th>TYPE</th>
          <th>AMOUNT</th>
          <th>CREATED</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $all_allocations = $Administration->get_all_allocated_fees();
          if ($all_allocations) {
            $x =0;
            foreach ($all_allocations as $allocate) {
              $x++;
              ?>
        <tr>
          <td><?php echo $x; ?></td>
          <td><?php echo strtoupper($allocate->gradeDesc);?></td>
           <td><?php echo strtoupper($allocate->feeType) ?></td>
          <td>&#8358;<?php echo number_format($allocate->amount,2)?></td>
          <td><?php echo date("j F Y",strtotime($allocate->created_on)) ?></td>
          <td>
            <button type="button" class="btn btn-dark update_btn_allo"  data-id="<?php echo $allocate->faId;?>" data-action="show_alloc_edit_modal"><span class="fa fa-edit"></span> Edit Structure</button>
          </td>
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
    <!-- BUS MODAL Start -->
   <div class="modal fade" id="addAllocateModalRForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
        
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">

                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-money fa-1x"></span> Set Fee Structure</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12 mt-1" id="response"></div>
                <form id="allocation_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="fee_type_id">Component Type</label>
             <select name="fee_type_id" id="fee_type_id" class="select2 w-100 form-control">
                   <option value="">Choose...</option>
                <?php echo $Administration->fee_component_inDropDown();?>
                  </select>
                    </div>
               </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="grade_desc"> CLASS </label>
               <select name="grade_desc" id="grade_desc" class="select2 w-100 form-control">
                     <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list();?>
                  </select>
                </div>
              </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="status"> AMOUNT </label>
               <input type="number" id="amount" class="form-control" name="amount" placeholder="e.g &#8358; 50,000.00">
                </div>
              </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="status"> TODAY DATE </label>
               <input type="text" id="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>" readonly>
                </div>
              </div>
                <input type="hidden" name="action" value="submit_allocation_now">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                    <span class="fa fa-paper-plane"></span> Save</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Close
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="UpdateAllocFeeForm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-edit fa-1x"></span> Update Allocation</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12" id="myres"></div>
                <form id="update_allocated_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="show_allocated_details_div">
                  </div>
                </div>
                   <input type="hidden" name="action" value="submit_edited_allocation_now">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
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
    <!-- BEGIN: Footer-->
   <!--  -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script src="smappjs/fee_allocate.js"></script>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->
</html>