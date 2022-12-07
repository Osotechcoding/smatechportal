<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <!-- metaTag -->
  <?php include("../template/MetaTag.php"); ?>
  <title><?php echo $SmappDetails->school_name ?> :: Manage Classroom</title>
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
  <!--  -->
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
                <li class="breadcrumb-item active">Manage Classroom
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-list fa-1x"></span> SCHOOL CLASSROOMS</h3>
          </div>
        </div>

        <div class="row">
          <!-- Statistics Cards Starts -->
          <div class="col-xl-12 col-md-12">
            <div class="row">
              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-success">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-book fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">Active Classes</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms_status("active"); ?>
                    </h2>

                  </div>
                </div>
              </div>
              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-danger">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-book fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">Inactive Classes </h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms_status("pending"); ?>
                    </h2>

                  </div>
                </div>
              </div>

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-dark">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-book fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white">All Classes</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Administration->count_all_classrooms(); ?></h2>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Revenue Growth Chart Starts -->
        </div>

        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#addClassModal"><span
                class="fa fa-plus fa-1x"></span> Add</button>
          </div>
          <div class="card-body">
            <div class="text-center col-md-12" id="delete_response"></div>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="text-center">
                  <tr>
                    <th>CLASS DESC</th>
                    <th>CLASS TEACHER</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php
                  $all_classrooms = $Administration->get_all_classrooms();
                  if ($all_classrooms) {
                    foreach ($all_classrooms as $classrooms) {
                  ?>
                  <tr>
                    <td><?php echo strtoupper($classrooms->gradeDesc); ?></td>

                    <td><?php if ($classrooms->grade_teacher == NULL) : ?>
                      <span class="badge badge-warning badge-md">Not Assigned</span>
                      <?php else : ?>
                      <?php $staff_data = $Staff->get_staff_ById($classrooms->grade_teacher);
                              echo strtoupper($staff_data->full_name); ?>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php switch ($classrooms->grade_status) {
                            case 'pending':
                              echo ' <span class="badge badge-warning badge-md">Pending</span>';
                              break;
                            case 'closed':
                              echo ' <span class="badge badge-danger badge-md">Not Active</span>';
                              break;
                            case 'active':
                              echo ' <span class="badge badge-success badge-md">Active</span>';
                              break;
                          } ?></td>
                    <td> <button type="button" data-id="<?php echo $classrooms->gradeId; ?>"
                        class="badge badge-dark badge-pill badge-md update_btn"><span class="fa fa-edit"></span>
                        Edit</button>
                      <button type="button" data-action="synchronize_teacher_btn"
                        data-id="<?php echo $classrooms->gradeId; ?>"
                        data-teacher="<?php echo $classrooms->grade_teacher; ?>"
                        class="badge badge-danger badge-pill badge-md sync_btn"><span class="fa fa-refresh"></span> Sync
                        C.T</button>
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
  <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <!-- modal-dialog-scrollable -->
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span
              class="fa fa-plus fa-1x"></span> Add Classroom</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="bx bx-x"></i></button>
        </div>
        <!-- <div class="col-md-12 text-center mt-2" id="result-response"></div> -->
        <form id="add_ClassModal_form">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="grade_name">CLASS DESC</label>
                  <input type="text" autocomplete="off" class="form-control form-control-lg" name="grade_name"
                    placeholder="JSS3">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="status"> STATUS </label>
                  <select name="status" id="status" class="form-control form-control-lg">
                    <option value="">Choose...</option>
                    <option value="active">Enable</option>
                    <option value="pending">Disable</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="teacher"> CLASS TEACHER </label>
                  <select name="teacher" id="teacher" class="form-control form-control-lg">
                    <option value="">Choose...</option>
                    <?php echo $Staff->show_staff_indropdown_list(); ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="auth_code">Authentication Code</label>
                  <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code"
                    placeholder="*********">
                </div>
              </div>

            </div>

          </div>
          <input type="hidden" name="action" value="submit_new_classroom">
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
  <!-- BUS MODAL  END -->



  <!-- BUS MODAL Start -->
  <div class="modal fade" id="classUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <!-- modal-dialog-scrollable -->
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i
              class="fa fa-edit fa-1x"></i> Update Classroom</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="bx bx-x"></i>
          </button>
        </div>
        <form id="update_classroom_form_modal">
          <div class="modal-body">
            <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12" id="show_classroom_details_div">
            </div>

          </div>
          <input type="hidden" name="action" value="update_classroom_now">
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark ml-1 __loadingBtn2__">
              <span class="fa fa-paper-plane"> Save Changes</span></button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BUS MODAL  END -->

  <!-- BUS MODAL Start -->
  <div class="modal fade" id="synchronizeStaffModalForm" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <!-- modal-dialog-scrollable -->
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i
              class="fa fa-edit fa-1x"></i> Please upgrade to Premium version To use this functionality</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="bx bx-x"></i>
          </button>
        </div>
        <form id="update_classroom_form_modal">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Class Desc</label>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Class Status</label>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Current Class Teacher</label>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Change Class Teacher</label>
                  <select name="new_clas_teacher" id="new_class_teacher"
                    class="form-control form-control-lg custom-select">
                    <option value="" selected>Choose...</option>
                    <?php echo $Staff->show_staff_indropdown_list(); ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Enter Authentication</label>
                  <input type="password" autocomplete="off" placeholder="**********" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="action" value="update_classroom_now">
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark ml-1 __loadingBtn2__">
              <span class="fa fa-paper-plane"> Save Changes</span></button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BUS MODAL  END -->
  <?php include("../template/footer.php"); ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include("../template/DataTableFooterScript.php"); ?>
  <script src="smappjs/create_classroom.js"></script>
  <!-- DataTableFooterScript.php -->

</body>
<!-- END: Body-->

</html>