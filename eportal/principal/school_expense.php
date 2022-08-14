<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> - SCHOOL EXPENSES</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">EXPENSES
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bar-chart fa-2x"></span> SCHOOL EXPENSES MANAGEMENT</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_today_expenses(),2) ?></h2>
                  
                </div>
              </div>
            </div>
          
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Current Term  </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_expenses_this_term($activeSess->term_desc,$activeSess->session_desc_name),2) ?></h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Current Session </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_expenses_this_session($activeSess->session_desc_name),2) ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-round" data-toggle="modal" data-target="#busModal"><span class="fa fa-line-chart fa-1x"></span> Add Expense</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                 
                  <th>S/N</th>
                  <th>Expense Desc</th>
                  <th>Cost</th>
                  <th>Reciever Name</th>
                   <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
            $get_all_expenses =$Administration->get_all_school_expenses();

            if ($get_all_expenses) {
              $cnt =0;
              foreach ($get_all_expenses as $expenses) {
                $cnt++;
                ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo  $expenses->expense_desc;?></td>
                  <td>&#8358;<?php echo number_format($expenses->cost,2);?></td>
                  <td><?php echo ucwords($expenses->receiver) ?></td>
                  <td><span class="badge badge-pill badge-success badge-md"><?php echo date("D j F Y",strtotime($expenses->created_on));?></span></td>
                  <td><button data-id="<?php echo $expenses->expense_id;?>" type="button" class="badge badge-pill badge-danger badge-md delete_btn"><i class="fa fa-trash"></i> Delete</button></td>
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
</section>
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    </div>
   
    <!-- BEGIN: Footer-->

    <!-- BUS MODAL Start -->
    <!-- modal-dialog-scrollable -->
   <div class="modal fade" id="busModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-line-chart fa-1x"></i> Expense Form</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <div class="text-center col-md-12 mt-1" id="server-result"></div>
                <form id="createNew_expense_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="expense_desc">EXPENSE DESC</label>
            <input type="text" name="expense_desc" id="expense_desc" class="form-control form-control-lg" placeholder="e.g Payment of Staff salary...">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="price">COST OF EXPENSES</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="expense_cost" placeholder="&#8358;55,000.00">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="t_date"> DATE</label>
              <input type="date" autocomplete="off" class="form-control form-control-lg" name="expense_date">
                    </div>
                  </div>
               
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="paid_to"> RECIEVER </label>
              <input type="text" autocomplete="off" class="form-control form-control-lg" id="paid_to" name="reciever" placeholder="Enter the receiver name here">
                </div>
              </div>
                 
                 </div>
                  </div>
                </div>
                <input type="hidden" name="cterm" value="<?php echo $activeSess->term_desc;?>">
             <input type="hidden" name="csession" value="<?php echo $activeSess->session_desc_name;?>">
                 <input type="hidden" name="action" value="submit_expense_now">
                 <input type="hidden" name="bypass" value="<?php echo md5('oiza1');?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                    <span class="fa fa-paper-plane"></span> Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
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
    //when a del btn is clicked
    const delete_btn = $(".delete_btn");
    delete_btn.on("click",runMi);

    //when create expense form is submitted
  const createNew_expense_form = $("#createNew_expense_form");
  createNew_expense_form.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/actions",createNew_expense_form.serialize(),function(data){
    setTimeout(()=>{
      $("#server-result").html(data);
      $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
    },2000);
   })
  })


     })
     function runMi(){
      let is_true = confirm("Are you sure you want to delete this permanently!");
      if (is_true) {
alert("Yes Expense has been deleted");
window.location.reload();
      }else{
        return false;
      }
     }
   </script>
  </body>
  <!-- END: Body-->

</html>