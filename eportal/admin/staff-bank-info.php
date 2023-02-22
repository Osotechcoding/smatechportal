<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <!-- metaTag -->
  <?php include("../template/MetaTag.php"); ?>
  <title><?php echo $SmappDetails->school_name ?> :: Staff Bank Info</title>
  <?php include("../template/dataTableHeaderLink.php"); ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include("template/HeaderNav.php"); ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include("template/Sidebar.php"); ?>
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
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                </li>
                <li class="breadcrumb-item active">Staff Bank Info
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
        <div class="content-body">
          <div class="row">
            <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-credit-card-alt fa-1x"></span> STAFF BANK ACCOUNT DETAILS MODULE</h3>
  </div>
</div>
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#addStaffBankDetailsModal"><span
                class="fa fa-plus fa-1x"></span> Add</button>
          </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechExp">
              <thead>
                <tr>
                  <th>Account Name</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Account Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $staffBanks = $Staff->getStaffBankInfo();

                if ($staffBanks) {
                   foreach ($staffBanks as $bank) {
                    $staff_data = $Staff->get_staff_ById($bank->staff_id);
                    ?>
                  <tr>
                  <td><?php echo strtoupper($bank->account_name);?></td>
                  <td><?php echo strtoupper($bank->bank_name);?></td>
                  <td><?php echo strtoupper($bank->account_number);?></td>
                  <td><?php echo strtoupper($bank->account_type);?></td>
                  <td>
                    <button class="btn btn-dark btn-sm"><span class="fa fa-edit"></span></button>
                    <button class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span></button>
                  </td>
                </tr>
                    <?php
                   }
                 } ?>
                
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- Bank MODAL Start -->
  <div class="modal fade" id="addStaffBankDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <!-- modal-dialog-scrollable -->
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span
              class="fa fa-plus fa-1x"></span> Add Staff Bank Details</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="bx bx-x"></i></button>
        </div>
        <form id="addStaffBankDetailsForm" autocomplete="off">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="staff_id"> Staff Name </label>
                  <select name="staff_id" id="staff_id" class="custom-select form-control">
                    <option value="" selected>Choose...</option>
                    <?php echo $Staff->show_staff_indropdown_list(); ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="staff_account_name">Account Name</label>
                  <input type="text" class="form-control form-control-lg" name="staff_account_name"
                    placeholder="Account Name">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="bank_name"> Name of Bank</label>
                  <input type="text" autocomplete="off" class="form-control form-control-lg" name="bank_name"
                    placeholder="Smapp Bank of Nig">
                </div>
              </div>
               <div class="col-md-12">
                <div class="form-group">
                  <label for="staff_bank_account_no"> Name of Bank</label>
                  <input type="text" autocomplete="off" class="form-control form-control-lg" name="staff_bank_account_no"
                    placeholder="e.g 0123456789">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="accountType"> Account Type </label>
                <select name="accountType" id="accountType" class="custom-select form-control">
                    <option value="" selected>Choose...</option>
                    <option value="Saving">Saving</option>
                    <option value="Current">Current</option>
                    <option value="Deposit">Deposit</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="auth_code">Authentication Code</label>
                  <input type="password" autocomplete="off" class="form-control" name="auth_code"
                    placeholder="*********">
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="action" value="submit_new_staff_bank_info">
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
              Submit</button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bank MODAL  END -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
      <script src="smappjs/staff-bank-info.js"></script>
  </body>
</html>