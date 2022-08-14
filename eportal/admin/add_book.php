<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name;?> :: School Library </title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Library Management
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">

</div>
 <!-- Statistics Cards Starts -->
        <div class="row">

        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Books</h3></div>
                  <h2 class="text-white mb-0"><?php echo 10; ?></h2>

                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-graduation-cap fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Authors</h3></div>
                  <h2 class="text-white mb-0"> <?php echo 20;?></h2>

                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Borrowed</h3></div>
                  <h2 class="text-white mb-0"><?php echo 30;?></h2>

                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-book fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Available</h3></div>
                  <h2 class="text-white mb-0"><?php echo 50; ?></h2>

                </div>
              </div>
            </div>


          </div>
        </div>

      </div>
       <!-- Revenue Growth Chart Starts -->

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="users-list-filter px-1">
        <form>
            <div class="row border rounded py-2 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-verified">Category</label>
                    <fieldset class="form-group">
                        <select class="form-control" name="category" id="users-list-verified">
                            <option value="">Choose...</option>
                            <option value="fiction">Fiction</option>
                            <option value="Nonfiction">Non Fiction</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-role">Author</label>
                    <fieldset class="form-group">
                        <select class="form-control" name="author" id="users-list-role">
                            <option value="">Choose...</option>
                            <option value="J.P Clark">J.P Clark</option>
                            <option value="Wole Soyinka O">Wole Soyinka O</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-status">Book Class Level</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-status">
                            <option value="">Choose...</option>
                            <option value="Creche">Creche</option>
                            <option value="KG">KG</option>
                            <option value="Nursery">Nursery</option>
                            <option value="Basic">Basic</option>
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                    <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>
                </div>
            </div>
        </form>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#addbookModal"><i class="fa fa-book fa-2x"></i> Add New Book</button>
        </div>
        <div class="card-body card-dashboard">

        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>

                  <th>Shef</th>
                  <th>Column</th>
                  <th> Title</th>
                  <th> Cover</th>
                  <th>Author</th>
                  <th>Supplier</th>
                  <th>Subject</th>
                  <th>Qty</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>

                  <td>12</td>
                  <td>9</td>
                  <td>The Mystery</td>
                  <td><img src="../assets/loaders/osotech.png" width="50" class="rounded-circle" alt="photo"></td>
                  <td>J P Clark</td>
                  <td>Learn Africa</td>
                  <td>Literature</td>
                  <td>34</td>
                  <td>Junior Classes </td>
                  <td>  <div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-info" data-toggle="modal" data-target="#updatebookModal" href="javascript:void(0);"><span class="fa fa-edit"></span> Update Book</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-line-chart"></span> Delete</a>
            </div>
          </div></td>
                </tr>
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
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="addbookModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 800;"><i class="fa fa-book fa-2x"></i> Add Book to Library</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">BOOK TITLE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="The Joy of Motherhood">
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="book_isbn">BOOK ISBN</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="book_isbn" placeholder="87098-0321">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="author">AUTHOR</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="author" placeholder="J.P Clark">
                    </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">BOOK PUBLISHER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" placeholder="Learn Africa">
                    </div>
               </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_subject">BOOK SUBJECT</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="book_subject" placeholder="Literature">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_edition">BOOK EDITION</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="book_edition" placeholder="Second Edition">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_cat">BOOK CATEGORY </label>
               <select name="book_cat" id="book_cat" class="form-control">
                 <option value="">Choose...</option>
                 <option value="fiction">Fiction</option>
                 <option value="nonfiction">Non-fiction</option>
               </select>
                </div>
              </div>
              <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_subcat">BOOK SUBCATEGORY </label>
               <select name="book_subcat" id="book_subcat" class="select2 form-control form-control-lg">
                 <option value="">--select--</option>
                 <option value="love">Love</option>
                 <option value="trag">Tragedy</option>
                 <option value="nontrag">Non-tragedy</option>
                 <option value="rela">Relationship</option>
                 <option value="moti">Motivational</option>
                 <option value="inspi">Inspirational</option>
               </select>
                </div>
              </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_class">BOOK CLASS LEVEL</label>
                <select name="book_class" id="book_class" class="form-control form-control-lg">
                 <option value="">--select--</option>
                 <option value="creche">Creche</option>
                 <option value="kg">Kg</option>
                 <option value="nursery">Nursery</option>
                 <option value="basic">Basic</option>
                 <option value="junior">Junior</option>
                 <option value="senior">Senior</option>
               </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="book_pages">TOTAL PAGES</label>
                <input type="number" class="form-control form-control-lg" name="book_pages" placeholder="45 Pages">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="supplier">SUPPLIER </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="supplier" placeholder="Adekola Oni Samuel">
                    </div>
                  </div>
                     <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name"> BOOK COPIES </label>
                <input type="number" class="form-control form-control-lg" name="qty" placeholder="90">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="email">BACK COVER IMAGE</label>
                <input type="file" class="form-control form-control-lg" name="bcover">
                    </div>
                  </div>
                   <div class="col-md-3">
                     <div class="form-group">
                  <label for="shef_no">PLACE AT SHEF NO</label>
                <input type="number" class="form-control form-control-lg" name="shef_no" placeholder="34">
                    </div>
                  </div>
                    <div class="col-md-3">
                     <div class="form-group">
                  <label for="column_no">PLACE AT COLUMN NO</label>
                <input type="number" class="form-control form-control-lg" name="column_no" id="column_no" step="1" placeholder="12">

                    </div>
                  </div>

                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-book"></span> Save Book</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span></button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

     <!-- UPDATE BOOK MODAL Start -->
   <div class="modal fade" id="updatebookModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-edit fa-2x"></i> Update Book</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">BOOK TITLE</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" value="The Joy of Motherhood">
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="book_isbn">BOOK ISBN</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="book_isbn" value="87098-0321">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="author">AUTHOR</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="author" value="J.P Clark">
                    </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">BOOK PUBLISHER</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="pin_view_code" value="Learn Africa">
                    </div>
               </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_subject">BOOK SUBJECT</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="book_subject" value="Literature">
                    </div>
                  </div>
                   <div class="col-md-3">
                     <div class="form-group">
                  <label for="book_cat">BOOK CATEGORY </label>
               <select name="book_cat" id="book_cat" class="form-control">
                 <option value="">--select--</option>
                 <option value="friction" selected>Friction</option>
                 <option value="nonfriction">Non-friction</option>
               </select>
                </div>
              </div>
              <div class="col-md-3">
                     <div class="form-group">
                  <label for="book_subcat">BOOK SUBCATEGORY </label>
               <select name="book_subcat" id="book_subcat" class="select2 form-control form-control-lg">
                 <option value="">--select--</option>
                 <option value="love">Love</option>
                 <option value="trag" selected>Tragedy</option>
                 <option value="nontrag">Non-tragedy</option>
                 <option value="rela">Relationship</option>
                 <option value="moti">Motivational</option>
                 <option value="inspi">Inspirational</option>
               </select>
                </div>
              </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="book_class">BOOK CLASS LEVEL</label>
                <select name="book_class" id="book_class" class="form-control form-control-lg">
                 <option value="">--select--</option>
                 <option value="creche">Creche</option>
                 <option value="kg">Kg</option>
                 <option value="nursery">Nursery</option>
                 <option value="basic">Basic</option>
                 <option value="junior">Junior</option>
                 <option value="senior" selected>Senior</option>
               </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                  <label for="book_pages">TOTAL PAGES</label>
                <input type="number" class="form-control form-control-lg" name="book_pages" value="45">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="supplier">SUPPLIER </label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="supplier" value="Adekola Oni Samuel">
                    </div>
                  </div>
                     <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">BOOK QUANTITY </label>
                <input type="number" class="form-control form-control-lg" value="30" name="qty" value="90">
                    </div>
                  </div>

                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="shef_no">PLACE AT SHEF NO</label>
              <input type="number" class="form-control form-control-lg" name="shef_no" value="34">
                    </div>
                  </div>
                    <div class="col-md-6">
                     <div class="form-group">
                  <label for="column_no">PLACE AT COLUMN NO</label>
                <input type="number" class="form-control form-control-lg" name="column_no" id="column_no" step="1" value="12">

                    </div>
                  </div>

                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-edit"></span> Save Change</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <span class="fa fa-power-off"></span> Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- UPDATE BOOK MODAL  END -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>
