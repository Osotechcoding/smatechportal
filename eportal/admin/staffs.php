<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title> <?php echo $SmappDetails->school_name; ?> :: Staff</title>
  <!-- include template/HeaderLink.php -->
  <?php include "../template/dataTableHeaderLink.php"; ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- include headernav.php -->
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
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
            <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
              <ol class="breadcrumb p-0 mb-0 pl-1">
                <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                </li>
                <li class="breadcrumb-item active">Our Staff
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Statistics Cards Starts -->
        <div class="row">

          <div class="col-xl-12 col-md-12">
            <div class="row">

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-info">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Male Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"> <?php echo $Staff->count_staff_by_gender("Male"); ?></h2>

                  </div>
                </div>
              </div>

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-danger">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Female Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Staff->count_staff_by_gender("Female"); ?></h2>

                  </div>
                </div>
              </div>
              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-dark">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">Total Staff</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Staff->count_all_staff(); ?></h2>

                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
        <!-- Revenue Growth Chart Starts -->
        <section class="users-list-wrapper">
          <!--<div class="users-list-filter px-1">-->
          <!--    <form>-->
          <!--        <div class="row border rounded py-2 mb-2">-->
          <!--             <div class="col-12 col-md-4 col-sm-6 col-lg-4">-->
          <!--                <label for="users-list-verified">Staff Type</label>-->
          <!--                <fieldset class="form-group">-->
          <!--                    <select class="form-control" id="users-list-verified">-->
          <!--                        <option value="">Choose...</option>-->
          <!--                        <option value="Teaching">Teaching</option>-->
          <!--                        <option value="Non-Teaching">Non-Teaching</option>-->
          <!--                    </select>-->
          <!--                </fieldset>-->
          <!--            </div>-->
          <!--            <div class="col-12 col-md-4 col-sm-6 col-lg-4">-->
          <!--                <label for="users-list-role">Staff Status</label>-->
          <!--                <fieldset class="form-group">-->
          <!--                    <select class="form-control" id="users-list-role">-->
          <!--                        <option value="">Choose...</option>-->
          <!--                        <option value="Active">Active</option>-->
          <!--                        <option value="Pending">Pending</option>-->
          <!--                        <option value="Retired">Retired</option>-->
          <!--                    </select>-->
          <!--                </fieldset>-->
          <!--            </div>-->

          <!--            <div class="col-12 col-md-4 col-sm-6 col-lg-4 d-flex align-items-center">-->
          <!--                <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>-->
          <!--            </div>-->
          <!--        </div>-->
          <!--    </form>-->
          <!--</div>-->
          <div class="users-list-table">
            <div class="card">
              <div class="card-body">
                <!-- datatable start -->
                <div class="table-responsive">
                  <table id="users-list-datatable" class="table text-center">
                    <thead>
                      <tr>
                        <th>PASSPORT</th>
                        <th>Reg Number</th>
                        <th>Full Name</th>
                        <th>Phone / E-mail</th>
                        <th>Class Teacher</th>
                        <th>Role/ Status</th>
                        <th>Edit</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      $get_all_staff = $Staff->get_all_staff();
                      if ($get_all_staff) {
                        foreach ($get_all_staff as $value) { ?>
                      <tr>
                        <td><?php if ($value->staffPassport == NULL || $value->staffPassport == "") : ?>
                          <a
                            href="./uploadstaffpassport?staffRegId=<?php echo $value->staffRegNo; ?>&actionId=<?php echo $value->staffId; ?>"><button
                              type="button" class="badge badge-dark">
                              <span class="fa fa-camera"></span> Upload</button></a>
                          <?php else : ?>
                          <img src="../schoolImages/staff/<?php echo $value->staffPassport; ?>" width="70"
                            style="border-radius: 10px;border: 3px solid deepskyblue;">
                          <?php endif ?>
                        </td>
                        <td><?php echo strtoupper($value->staffRegNo); ?></td>
                        <td>
                          <?php echo strtoupper($value->full_name); ?>
                        </td>
                        <td><?php echo strtoupper($value->staffPhone); ?><br>
                          <?php echo strtolower($value->staffEmail); ?></td>
                        <td><?php if ($value->staffGrade == null) {
                                  echo '<span class="badge badge-info">Not Class teacher</span>';
                                } else {
                                  echo strtoupper($value->staffGrade);
                                }  ?></td>
                        <td><?php if ($value->staffRole == NULL || $value->staffRole == "") {
                                  echo '<span class="badge badge-warning">Not Assigned</span>';
                                } else {
                                  echo strtoupper($value->staffRole);
                                } ?> <br>
                          <?php if ($value->jobStatus == 0) : ?>
                          <span class="badge badge-warning m-1">Pending</span>
                          <?php elseif ($value->jobStatus == 1) : ?>
                          <span class="badge badge-success m-1">Active</span>
                          <?php else : ?>
                          <span class="badge badge-danger m-1">Left</span>
                          <?php endif ?>
                        </td>
                        <td><a
                            href="editstaffinfo?record-id=<?php echo $Configuration->convert_String('code', $value->staffId); ?>&action=view-staff-record&viewer=<?php echo $Configuration->convert_String('code', 'admin'); ?>"><i
                              class="bx bx-edit-alt"></i></a>
                        </td>
                        <td>
                          <button type="button"
                            class="badge badge-danger badge-pill badge-sm remove_staff_btn __loadingBtn__<?php echo $value->staffId; ?>"
                            data-staff="<?php echo $value->staffId; ?>"
                            data-action="remove_staff_permanently">Remove</button>
                        </td>
                      </tr>
                      <?php  // code...
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- datatable ends -->
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <!-- BEGIN: Customizer-->
  <?php //include ("template/Customizer.php");
  ?>
  <!-- End: Customizer-->
  </div>

  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include("../template/DataTableFooterScript.php"); ?>
  <!-- BEGIN: Page JS-->

  <!-- END: Page JS-->
  <script>
  $(document).ready(function() {
    $("#users-list-datatable").DataTable();
    //remove action
    $(".remove_staff_btn").on("click", function() {
      const staffId = $(this).data("staff");
      const action = $(this).data("action");

      isTrue = confirm(
        "Are you sure, you want to remove this staff from your database? there is no undo after this action!");
      if (isTrue) {
        $(".__loadingBtn__" + staffId).html(
            '<img src="../assets/loaders/rolling_loader.svg" width="20">')
          .attr("disabled", true);
        //send delete request
        // console.log(staffId, action)
        $.post("../actions/delete_actions", {
          staff_Id: staffId,
          action: action
        }, function(res) {
          setTimeout(() => {
            $(".remove_staff_btn").html(
                'Remove')
              .attr("disabled", false);
            $("#server-response").html(res);
          }, 1000);
        })
      } else {
        return;
      }
    })
  })
  </script>
  <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>