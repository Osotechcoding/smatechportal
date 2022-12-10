<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: </title>
  <!-- include template/HeaderLink.php -->
  <?php include "../template/HeaderLink.php"; ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
  class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar email-application navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">

  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
  <!-- END: Main Menu-->


  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-area-wrapper">
      <div class="sidebar-left">
        <div class="sidebar">
          <div class="sidebar-content email-app-sidebar d-flex">
            <!-- sidebar close icon -->
            <span class="sidebar-close-icon">
              <i class="bx bx-x"></i>
            </span>
            <!-- sidebar close icon -->
            <div class="email-app-menu">
              <div class="form-group form-group-compose">
                <!-- compose button  -->
                <button type="button" class="btn btn-primary btn-block my-2 compose-btn">
                  <i class="bx bx-plus"></i>
                  Compose
                </button>
              </div>
              <div class="sidebar-menu-list">
                <!-- sidebar menu  -->
                <div class="list-group list-group-messages">
                  <a href="javascript:void(0);" class="list-group-item pt-0 active" id="inbox-menu">

                    Inbox
                    <span class="badge badge-light-primary badge-pill badge-round float-right mt-50">5</span>
                  </a>
                  <a href="javascript:void(0);" class="list-group-item">

                    Sent
                  </a>
                  <a href="javascript:void(0);" class="list-group-item">
                    Draft
                  </a>
                  <a href="javascript:void(0);" class="list-group-item">

                    Starred
                  </a>
                  <a href="javascript:void(0);" class="list-group-item">

                    Spam
                    <span class="badge badge-light-danger badge-pill badge-round float-right mt-50">3</span>
                  </a>
                  <a href="javascript:void(0);" class="list-group-item">

                    Trash
                  </a>
                </div>
                <!-- sidebar menu  end-->

                <!-- sidebar label start -->
                <label class="sidebar-label">Labels</label>
                <div class="list-group list-group-labels ">
                  <a href="javascript:void(0);"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    Product
                    <span class="bullet bullet-success bullet-sm"></span>
                  </a>
                  <a href="javascript:void(0);"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    Work
                    <span class="bullet bullet-primary bullet-sm"></span>
                  </a>
                  <a href="javascript:void(0);"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    Misc
                    <span class="bullet bullet-warning bullet-sm"></span>
                  </a>
                  <a href="javascript:void(0);"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    Family
                    <span class="bullet bullet-danger bullet-sm"></span>
                  </a>
                  <a href="javascript:void(0);"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    Design
                    <span class="bullet bullet-info bullet-sm"></span>
                  </a>
                </div>
                <!-- sidebar label end -->
              </div>
            </div>
          </div>
          <!-- User new mail right area -->
          <div class="compose-new-mail-sidebar">
            <div class="card shadow-none quill-wrapper p-0">
              <div class="card-header">
                <h3 class="card-title" id="emailCompose">New Message</h3>
                <button type="button" class="close close-icon">
                  <i class="bx bx-x"></i>
                </button>
              </div>
              <!-- form start -->
              <form action="#" id="compose-form">
                <div class="card-body pt-0">
                  <div class="form-group pb-50">
                    <label for="emailfrom">from</label>
                    <input type="text" id="emailfrom" class="form-control" placeholder="user@example.com" disabled>
                  </div>
                  <div class="form-label-group">
                    <input type="email" id="emailTo" class="form-control" placeholder="To" required>
                    <label for="emailTo">To</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="emailSubject" class="form-control" placeholder="Subject">
                    <label for="emailSubject">Subject</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="emailCC" class="form-control" placeholder="CC">
                    <label for="emailCC">CC</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="emailBCC" class="form-control" placeholder="BCC">
                    <label for="emailBCC">BCC</label>
                  </div>
                  <!-- Compose mail Quill editor -->
                  <div class="snow-container border rounded p-50 ">
                    <div class="compose-editor mx-75"></div>
                    <div class="d-flex justify-content-end">
                      <div class="compose-quill-toolbar pb-0">
                        <span class="ql-formats mr-0">
                          <button class="ql-bold"></button>
                          <button class="ql-italic"></button>
                          <button class="ql-underline"></button>
                          <button class="ql-link"></button>
                          <button class="ql-image"></button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="emailAttach">
                      <label class="custom-file-label" for="emailAttach">Attach file</label>
                    </div>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-end pt-0">
                  <button type="reset" class="btn btn-light-secondary cancel-btn mr-1">
                    <i class='bx bx-x mr-25'></i>
                    <span class="d-sm-inline d-none">Cancel</span>
                  </button>
                  <button type="submit" class="btn-send btn btn-primary">
                    <i class='bx bx-send mr-25'></i> <span class="d-sm-inline d-none">Send</span>
                  </button>
                </div>
              </form>
              <!-- form start end-->
            </div>
          </div>
          <!--/ User Chat profile right area -->

        </div>
      </div>
      <div class="content-right">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            <!-- email app overlay -->
            <div class="app-content-overlay"></div>
            <div class="email-app-area">
              <!-- Email list Area -->
              <div class="email-app-list-wrapper">
                <div class="email-app-list">
                  <div class="email-action">
                    <!-- action left start here -->
                    <div class="action-left d-flex align-items-center">
                      <!-- select All checkbox -->
                      <div class="checkbox checkbox-shadow checkbox-sm selectAll mr-50">
                        <input type="checkbox" id="checkboxsmall">
                        <label for="checkboxsmall"></label>
                      </div>
                      <!-- delete unread dropdown -->
                      <ul class="list-inline m-0 d-flex">
                        <li class="list-inline-item mail-delete">
                          <button type="button" class="btn btn-icon action-icon">
                            <span class="fonticon-wrap">
                              <i class="fa fa-trash">
                              </i>
                            </span>
                          </button>
                        </li>
                        <li class="list-inline-item mail-unread">
                          <button type="button" class="btn btn-icon action-icon">
                            <span class="fonticon-wrap d-inline mr-25">
                              <i class="fa fa-envelope">
                              </i>
                            </span>
                          </button>
                        </li>
                        <li class="list-inline-item">
                          <div class="dropdown">
                            <button type="button" class="dropdown-toggle btn btn-icon action-icon" id="folder"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="fonticon-wrap">
                                <i class="fa fa-folder">
                                </i>
                              </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit"></i> Draft</a>
                              <a class="dropdown-item" href="javascript:void(0);"><i
                                  class="bx bx-info-circle"></i>Spam</a>
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash"></i>Trash</a>
                            </div>
                          </div>
                        </li>
                        <li class="list-inline-item">
                          <div class="dropdown">
                            <button type="button" class="btn btn-icon dropdown-toggle action-icon" id="tag"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="fonticon-wrap">
                                <i class="fa fa-th">
                                </i>
                              </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                              <a href="javascript:void(0);" class="dropdown-item align-items-center">
                                <span class="bullet bullet-success bullet-sm"></span>
                                <span>Product</span>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item align-items-center">
                                <span class="bullet bullet-primary bullet-sm"></span>
                                <span>Work</span>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item align-items-center">
                                <span class="bullet bullet-warning bullet-sm"></span>
                                <span>Misc</span>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item align-items-center">
                                <span class="bullet bullet-danger bullet-sm"></span>
                                <span>Family</span>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item align-items-center">
                                <span class="bullet bullet-info bullet-sm"></span>
                                <span> Design</span>
                              </a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- action left end here -->

                    <!-- action right start here -->
                    <div class="action-right d-flex flex-grow-1 align-items-center justify-content-around">
                      <!-- search bar  -->
                      <div class="email-fixed-search flex-grow-1">
                        <div class="sidebar-toggle d-block d-lg-none">
                          <i class="bx bx-menu"></i>
                        </div>
                        <fieldset class="form-group position-relative has-icon-left m-0">
                          <input type="text" class="form-control" id="email-search" placeholder="Search email">
                          <div class="form-control-position">
                            <i class="bx bx-search"></i>
                          </div>
                        </fieldset>
                      </div>
                      <!-- pagination and page count -->
                      <span class="d-none d-sm-block">1-10 of 653</span>
                      <button class="btn btn-icon email-pagination-prev d-none d-sm-block">
                        <i class="bx bx-chevron-left"></i>
                      </button>
                      <button class="btn btn-icon email-pagination-next d-none d-sm-block">
                        <i class="bx bx-chevron-right"></i>
                      </button>
                    </div>
                  </div>
                  <!-- / action right -->

                  <!-- email user list start -->
                  <div class="email-user-list list-group">
                    <ul class="users-list-wrapper media-list">
                      <li class="media mail-read">
                        <div class="user-action">
                          <div class="checkbox-con mr-25">
                            <div class="checkbox checkbox-shadow checkbox-sm">
                              <input type="checkbox" id="checkboxsmall1">
                              <label for="checkboxsmall1"></label>
                            </div>
                          </div>
                          <span class="favorite warning">
                            <i class="bx bxs-star"></i>
                          </span>
                        </div>
                        <div class="pr-50">
                          <div class="avatar">
                            <img src="../author.jpg" alt="avatar img holder">
                          </div>
                        </div>
                        <div class="media-body">
                          <div class="user-details">
                            <div class="mail-items">
                              <span class="list-group-item-text text-truncate">Open source project public release
                                👍</span>
                            </div>
                            <div class="mail-meta-item">
                              <span class="float-right">
                                <span class="mail-date">4:14 AM</span>
                              </span>
                            </div>
                          </div>
                          <div class="mail-message">
                            <p class="list-group-item-text truncate mb-0">
                              Hey John, bah kivu decrete epanorthotic unnotched
                              Argyroneta nonius veratrine preimaginary
                            </p>
                            <div class="mail-meta-item">
                              <span class="float-right">
                                <span class="bullet bullet-success bullet-sm"></span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </li>

                    </ul>
                    <!-- email user list end -->

                    <!-- no result when nothing to show on list -->
                    <div class="no-results">
                      <i class="bx bx-error-circle font-large-2"></i>
                      <h5>No Items Found</h5>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Email list Area -->

              <!-- Detailed Email View -->
              <div class="email-app-details">
                <!-- email detail view header -->
                <div class="email-detail-header">
                  <div class="email-header-left d-flex align-items-center mb-1">
                    <span class="go-back mr-50">
                      <span class="fonticon-wrap d-inline">
                        <i class="fa fa-chevron-left">
                        </i>
                      </span>
                    </span>
                    <h5 class="email-detail-title font-weight-normal mb-0">
                      Advertising Internet Online
                      <span class="badge badge-light-danger badge-pill ml-1">PRODUCT</span>
                    </h5>
                  </div>
                  <div class="email-header-right mb-1 ml-2 pl-1">
                    <ul class="list-inline m-0">
                      <li class="list-inline-item mail-delete">
                        <button type="button" class="btn btn-icon action-icon">
                          <span class="fonticon-wrap">
                            <i class="fa fa-trash">
                            </i>
                          </span>
                        </button>
                      </li>
                      <li class="list-inline-item mail-unread">
                        <button type="button" class="btn btn-icon action-icon">
                          <span class="fonticon-wrap d-inline mr-25">
                            <i class="fa fa-envelope">
                            </i>
                          </span>
                        </button>
                      </li>
                      <li class="list-inline-item">
                        <div class="dropdown">
                          <button type="button" class="dropdown-toggle btn btn-icon action-icon" id="folder"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fonticon-wrap">
                              <i class="fa fa-folder">
                              </i>
                            </span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit"></i> Draft</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i
                                class="bx bx-info-circle"></i>Spam</a>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash"></i>Trash</a>
                          </div>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <div class="dropdown">
                          <button type="button" class="btn btn-icon dropdown-toggle action-icon" id="tag"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fonticon-wrap">
                              <i class="fa fa-th">
                              </i>
                            </span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                            <a href="javascript:void(0);" class="dropdown-item align-items-center">
                              <span class="bullet bullet-success bullet-sm"></span>
                              <span>Product</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item align-items-center">
                              <span class="bullet bullet-primary bullet-sm"></span>
                              <span>Work</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item align-items-center">
                              <span class="bullet bullet-warning bullet-sm"></span>
                              <span>Misc</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item align-items-center">
                              <span class="bullet bullet-danger bullet-sm"></span>
                              <span>Family</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item align-items-center">
                              <span class="bullet bullet-info bullet-sm"></span>
                              <span> Design</span>
                            </a>
                          </div>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <span class="no-of-list d-none d-sm-block ml-1">1-10 of 653</span>
                      </li>
                      <li class="list-inline-item">
                        <button class="btn btn-icon email-pagination-prev action-icon">
                          <i class='bx bx-chevron-left'></i>
                        </button>
                      </li>
                      <li class="list-inline-item">
                        <button class="btn btn-icon email-pagination-next action-icon">
                          <i class='bx bx-chevron-right'></i>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- email detail view header end-->
                <div class="email-scroll-area">
                  <!-- email details  -->
                  <div class="row">
                    <div class="col-12">
                      <div class="collapsible email-detail-head">
                        <div class="card collapse-header" role="tablist">
                          <div id="headingCollapse5"
                            class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse"
                            role="tab" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <div class="collapse-title media">
                              <div class="pr-1">
                                <div class="avatar mr-75">
                                  <img src="../author.jpg" alt="avatar img holder" width="30" height="30">
                                </div>
                              </div>
                              <div class="media-body mt-25">
                                <span class="text-primary">Elnora Reese</span>
                                <span class="d-sm-inline d-none"> &lt;elnora@gmail.com&gt;</span>
                                <small class="text-muted d-block">to Lois Jimenez</small>
                              </div>
                            </div>
                            <div class="information d-sm-flex d-none align-items-center">
                              <small class="text-muted mr-50">15 Jul 2019, 10:30</small>
                              <span class="favorite">
                                <i class="bx bx-star mr-25"></i>
                              </span>
                              <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" id="first-open-submenu"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class='bx bx-dots-vertical-rounded mr-0'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="first-open-submenu">
                                  <a href="javascript:void(0);" class="dropdown-item mail-reply">
                                    <i class='bx bx-share'></i>
                                    Reply
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-redo'></i>
                                    Forward
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-info-circle'></i>
                                    Report Spam
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="collapse5" role="tabpanel" aria-labelledby="headingCollapse5" class="collapse">
                            <div class="card-body py-1">
                              <p class="text-bold-500">Greetings!</p>
                              <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of
                                type and scrambled it to make a type specimen book.
                              </p>
                              <p>
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining
                                essentially unchanged.
                              </p>
                              <p class="mb-0">Sincerely yours,</p>
                              <p class="text-bold-500">Envato Design Team</p>
                            </div>
                            <div class="card-footer pt-0 border-top">
                              <label class="sidebar-label">Attached Files</label>
                              <ul class="list-unstyled mb-0">
                                <li class="cursor-pointer pb-25">
                                  <img src="../author.jpg" height="30" alt="psd.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.psd</small>
                                </li>
                                <li class="cursor-pointer">
                                  <img src="../author.jpg" height="30" alt="sketch.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.sketch</small>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card collapse-header" role="tablist">
                          <div id="headingCollapse6"
                            class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse"
                            role="tab" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <div class="collapse-title media">
                              <div class="pr-1">
                                <div class="avatar mr-75">
                                  <img src="../author.jpg" alt="avatar img holder" width="30" height="30">
                                </div>
                              </div>
                              <div class="media-body mt-25">
                                <span class="text-primary">Lois Jimenez </span>
                                <span class="d-sm-inline d-none"> &lt;lois_jim@gmail.com&gt;</span>
                                <small class="text-muted d-block">to Elnora Reese</small>
                              </div>
                            </div>
                            <div class="information d-sm-flex d-none align-items-center">
                              <i class='bx bx-paperclip mr-50'></i>
                              <small class="text-muted mr-50">10 Jul 2019, 10:30</small>
                              <span class="favorite">
                                <i class="bx bx-star mr-25"></i>
                              </span>
                              <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" id="second-open-submenu"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class='bx bx-dots-vertical-rounded mr-0'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="second-open-submenu">
                                  <a href="javascript:void(0);" class="dropdown-item mail-reply">
                                    <i class='bx bx-share'></i>
                                    Reply
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-redo'></i>
                                    Forward
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-info-circle'></i>
                                    Report Spam
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="collapse6" role="tabpanel" aria-labelledby="headingCollapse7" class="collapse">
                            <div class="card-body py-1">
                              <p class="text-bold-500">Greetings!</p>
                              <p>
                                Successful businesses have many things in common, today we’ll look at the big ‘R’of
                                recognition
                                and how a digital advertising network may help. Recognition can be illustrated by two
                                individuals
                                entering a crowded room at a party. Both walk to the far side of the room, one of them
                                slips
                                through the crowd easily and unnoticed as they reach the far side.
                              </p>
                              <p>
                                Gummies sweet tart marzipan lemon drops donut pie. Chocolate cake gingerbread jujubes
                                gingerbread
                                chocolate cake tart bear claw apple pie jelly-o.
                                Gummies biscuit brownie marshmallow oat cake tootsie roll bear claw topping. Oat cake
                                sesame snaps
                                icing cupcake wafer tiramisu jelly-o sugar plum carrot cake
                              </p>
                              <p class="mb-0">Sincerely yours,</p>
                              <p class="text-bold-500">Envato Design Team</p>
                            </div>
                            <div class="card-footer pt-0 border-top">
                              <label class="sidebar-label">Attached Files</label>
                              <ul class="list-unstyled mb-0">
                                <li class="cursor-pointer pb-25">
                                  <img src="../author.jpg" height="30" alt="psd.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.psd</small>
                                </li>
                                <li class="cursor-pointer">
                                  <img src="../author.jpg" height="30" alt="sketch.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.sketch</small>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card collapse-header open" role="tablist">
                          <div id="headingCollapse7"
                            class="card-header d-flex justify-content-between align-items-center" data-toggle="collapse"
                            role="tab" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            <div class="collapse-title media">
                              <div class="pr-1">
                                <div class="avatar mr-75">
                                  <img src="../author.jpg" alt="avatar img holder" width="30" height="30">
                                </div>
                              </div>
                              <div class="media-body mt-25">
                                <span class="text-primary">Elnora Reese</span>
                                <span class="d-sm-inline d-none">&lt;elnora@gmail.com&gt;</span>
                                <small class="text-muted d-block">to Lois Jimenez</small>
                              </div>
                            </div>
                            <div class="information d-sm-flex d-none align-items-center">
                              <small class="text-muted mr-50">05 Jul 2019, 10:30</small>
                              <span class="favorite warning">
                                <i class="bx bxs-star mr-25"></i>
                              </span>
                              <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" id="third-open-menu"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class='bx bx-dots-vertical-rounded mr-0'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="second-open-submenu">
                                  <a href="javascript:void(0);" class="dropdown-item mail-reply">
                                    <i class='bx bx-share'></i>
                                    Reply
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-redo'></i>
                                    Forward
                                  </a>
                                  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class='bx bx-info-circle'></i>
                                    Report Spam
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="collapse7" role="tabpanel" aria-labelledby="headingCollapse7" class="collapse show">
                            <div class="card-body py-1">
                              <p class="text-bold-500">Greetings!</p>
                              <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page
                                when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less
                                normal
                                distribution of letters, as opposed to using 'Content here, content here',making it look
                                like
                                readable English.
                              </p>
                              <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly
                                believable.
                              </p>
                              <p class="mb-0">Sincerely yours,</p>
                              <p class="text-bold-500">Envato Design Team</p>
                            </div>
                            <div class="card-footer pt-0 border-top">
                              <label class="sidebar-label">Attached Files</label>
                              <ul class="list-unstyled mb-0">
                                <li class="cursor-pointer pb-25">
                                  <img src="../author.jpg" height="30" alt="psd.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.psd</small>
                                </li>
                                <li class="cursor-pointer">
                                  <img src="../author.jpg" height="30" alt="sketch.png">
                                  <small class="text-muted ml-1 attachment-text">uikit-design.sketch</small>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- email details  end-->
                  <div class="row px-2 mb-4">
                    <!-- quill editor for reply message -->
                    <div class="col-12 px-0">
                      <div class="card shadow-none border rounded">
                        <div class="card-body quill-wrapper">
                          <span>Reply to Lois Jimenez</span>
                          <div class="snow-container" id="detail-view-quill">
                            <div class="detail-view-editor"></div>
                            <div class="d-flex justify-content-end">
                              <div class="detail-quill-toolbar">
                                <span class="ql-formats mr-50">
                                  <button class="ql-bold"></button>
                                  <button class="ql-italic"></button>
                                  <button class="ql-underline"></button>
                                  <button class="ql-link"></button>
                                  <button class="ql-image"></button>
                                </span>
                              </div>
                              <button class="btn btn-primary send-btn">
                                <i class='bx bx-send mr-25'></i>
                                <span class="d-none d-sm-inline"> Send</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Detailed Email View -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <!-- demo chat-->
  <!-- BEGIN: Footer-->
  <?php include_once "../template/footer.php"; ?>
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>