 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
   <div class="navbar-header">
     <ul class="nav navbar-nav flex-row">
       <li class="nav-item mr-auto"><a class="navbar-brand" href="./">
           <h2 class="brand-text mb-0"><?php echo $lang['owner'] ?></h2>
         </a></li>
       <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
             class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
             class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
     </ul>
   </div>
   <div class="shadow-bottom"></div>
   <div class="main-menu-content">
     <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
       data-icon-style="lines">
       <li class="active"><a class="d-flex align-items-center" href="./"><i class="fa fa-desktop fa-1x"></i><span
             class="menu-item text-truncate" data-i18n="Dashboard"><?php echo $lang['Dashboard'] ?></span></a>
       </li>
       <!--  <li class="navigation-header text-truncate"><span data-i18n="MANAGEMENT">MANAGEMENT</span>
          </li> -->
       <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="notebook"></i><span
             class="menu-title text-truncate" data-i18n="ADMINISTRATIVE">ADMINISTRATIVE</span></a>
         <ul class="menu-content">
           <li class="nav-item"><a href="acaSession"><i class="fa fa-calendar fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Academic Session">Academic Session</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="create_subject"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Subject Management">Subject Management</span></a>
           </li>

           <li><a class="d-flex align-items-center" href="create_classroom"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Class Management">Class Management</span></a>
           </li>
           <!-- <li><a class="d-flex align-items-center" href="upload_lecture"><i class="bx bx-video-plus"></i><span
                 class="menu-item text-truncate" data-i18n="Online Class"> Online Class</span></a>
           </li> -->
           <!-- <li><a class="d-flex align-items-center" href="registerStudentSubject"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Exam Subject I">Exam Subject I</span></a>
              </li> -->
           <li><a class="d-flex align-items-center" href="bulkSubjectReg"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Exam Subject"> Exam Subject</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="examSubjectList"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Search Exam Subject">Search Subject</span></a>
           </li>
           <!-- <li class=" nav-item"><a href="student_assignment"><i class="fa fa-book fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Student Assignment"> Student Assignment</span></a>
           </li>
           <li class=" nav-item"><a href="markstudentass"><i class="fa fa-pencil fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Mark Assignment">Mark Assignment</span></a>
           </li> -->
         </ul>
       </li>
       <!-- ADMISSION -->
       <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-lock fa-1x" data-icon="notebook"></i><span
             class="menu-title text-truncate" data-i18n="MANAGE PORTAL">MANAGE PORTAL</span></a>
         <ul class="menu-content">
           <li class=" nav-item"><a href="callAdmission"><i class="fa fa-cogs fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Admission Portal">Admission Portal</span></a>
           </li>
         </ul>
       </li>
       <!-- ADMISSION ENDS -->

        <!-- ADMISSION -->
        <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-certificate fa-1x" data-icon="certificate"></i><span
             class="menu-title text-truncate" data-i18n="STUDENT DOCS">STUDENT DOCS</span></a>
         <ul class="menu-content">
           <li class=" nav-item"><a href="genIdCard"><i class="fa fa-address-book fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Generate ID Card">Generate ID Card</span></a>
           </li>
           <li class=" nav-item"><a href="generate-testimonial"><i class="fa fa-certificate fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Generate Testimonial"> Generate Testimonial</span></a>
           </li>
           <li class=" nav-item"><a href="reprintcert"><i class="fa fa-print fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Re-print Testimonial">Re-print Testimonial</span></a>
           </li>
         </ul>
       </li>
       <!-- ADMISSION ENDS -->
       <!-- RESULT -->
       <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-bar-chart fa-1x" data-icon="notebook"></i><span
             class="menu-title text-truncate" data-i18n="MANAGE RESULTS">MANAGE RESULTS</span></a>
         <ul class="menu-content">
           <li class="nav-item"><a href="rgrading"><i class="fa fa-line-chart fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Result Grading">Result Grading</span></a>
           </li>
           <!-- <li class=" nav-item"><a href="result_uploading"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Upload Results">Upload Results</span></a>
           </li> -->
           <li class=" nav-item"><a href="view_uploaded_result"><i class="fa fa-eye fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Results">View Results</span></a>
           </li>
           <!-- <li class=" nav-item"><a href="uploading_behavior"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Affective Domain">Affective Domain</span></a>
           </li> -->
           <li class=" nav-item"><a href="view_cognitive"><i class="fa fa-eye fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Affective">View Affective</span></a>
           </li>
           <!-- <li class=" nav-item"><a href="psychomotor"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Psychomotor">Psychomotor</span></a>
           </li> -->
           <li class=" nav-item"><a href="viewpsycho"><i class="fa fa-eye fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Psychomotor">View Psychomotor</span></a>
           </li>
           <li class=" nav-item"><a href="viewResultComments"><i class="fa fa-eye fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Comments">View Comments</span></a>
           </li>
           <li class=" nav-item"><a href="checkResult"><i class="fa fa-line-chart fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Check Result">Check Result</span></a>
           </li>
           <li class=" nav-item"><a href="editstudentresult"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Edit Result">Edit Result</span></a>
           </li>
           <li class=" nav-item"><a href="deleteExamResults"><i class="fa fa-trash fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Remove Result">Remove Result</span></a>
           </li>

           <li class=" nav-item"><a href="publishResult"><i class="fa fa-paper-plane fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Publish Results">Publish Results</span></a>
           </li>

           <li class=" nav-item"><a href="viewPublishedResult"><i class="fa fa-eye fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Published">View Published</span></a>
           </li>
         </ul>
       </li>
       <!-- RESULT ENDS -->
       <!-- STUDENT -->
       <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-graduation-cap fa-1x"
             data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE STUDENTS">MANAGE
             STUDENTS</span></a>
         <ul class="menu-content">
           <li class="nav-item"><a href="add_student"><i class="fa fa-graduation-cap fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Single Registration">Single Registration</span></a>
           </li>
           <!-- <li class="nav-item"><a href="studentcsvupload"><i class="fa fa-graduation-cap fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Bulk Registration">Bulk Registration</span></a>
           </li> -->

           <li class="nav-item"><a href="ab_students"><i class="fa fa-user-plus fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="View Students">View Students</span></a>
           </li>
           <!-- student_attendance -->
           <!-- <li class="nav-item"><a href="upload-attendance"><i class="fa fa-child fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Mark Attendance">Mark Attendance</span></a>
           </li> -->
           <li class="nav-item"><a href="view-attendance"><i class="fa fa-child fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="view Attendance">View Attendance</span></a>
           </li>
           <li class="nav-item"><a href="prefects"><i class="fa fa-user-secret fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Manage Prefects">Manage Prefects</span></a>
           </li>
           <li class="nav-item"><a href="student_office_list"><i class="fa fa-user-secret fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Student Prefects">Student Office</span></a>
           </li>
           <li class="nav-item"><a href="massPromotion"><i class="fa fa-line-chart fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Student Promotion">Student Promotion</span></a>
           </li>

           <li class="nav-item"><a href="searchstudent"><i class="fa fa-search fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Search Student">Search Student</span></a>
           </li>
         </ul>
       </li>
       <!-- STUDENT ENDS -->
       <!-- STUDENT -->
       <li class="nav-item"><a href="javascript:void(0)"><i class="fa fa-users fa-1x" data-icon="notebook"></i><span
             class="menu-title text-truncate" data-i18n="MANAGE STAFF"> MANAGE STAFF</span></a>
         <ul class="menu-content">
           <li class="nav-item"><a href="add_staff"><i class="fa fa-user-plus fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Register Staff">Register Staff</span></a></li>
           <li class="nav-item"><a href="staffs"><i class="fa fa-users fa-1x"></i><span class="menu-title text-truncate"
                 data-i18n="Staff">View Staff</span></a></li>
           <li class=" nav-item"><a href="dutyAssignment"><i class="fa fa-briefcase fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Assign Staff Duty">Assign Staff Duty</span></a>
           </li>
           <li class="nav-item"><a href="HODs"><i class="fa fa-briefcase fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Staff Office">Staff Office</span></a>
           </li>
           <li class="nav-item"><a href="staff_office_list"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Create Office">Create Office</span></a>
           </li>
         </ul>
       </li>
       <!-- STUDENT ENDS -->

       <!--   <li class=" navigation-header text-truncate"><span data-i18n="FINANCIAL">FINANCIAL</span>
          </li> -->
       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-money fa-1x" data-icon="retweet"></i><span
             class="menu-title text-truncate" data-i18n="Accounting">ACCOUNTING</span></a>
         <ul class="menu-content">
           <li><a class="d-flex align-items-center" href="make_payment"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n=" Make Payment">Make Payment</span></a> </li>
           <li><a class="d-flex align-items-center" href="filter-payments"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Search Payment"> Search Payment</span></a> </li>
           <li><a class="d-flex align-items-center" href="fee_component"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Fee Component">Fee Component</span></a> </li>
           <li><a class="d-flex align-items-center" href="fee_allocate"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Fee Structure">Fee Structure</span></a> </li>
           <li><a class="d-flex align-items-center" href="account_reports"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Payment Records">Payment Records</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="visap_payroll"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Payroll"> Payroll</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="school_expense"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Expenses"> Expenses</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="add_loan"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Loan">Manage Loan</span></a> </li>
         </ul>
       </li>
       <!--  <li class=" navigation-header text-truncate"><span data-i18n="SCHOOL ACTIVITY">SCHOOL ACTIVITY</span>
          </li> -->
       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-credit-card-alt fa-1x"
             data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCRATCH CARD">SCRATCH
             CARD</span></a>
         <ul class="menu-content">
           <?php if ($Admin->isSuperAdmin($admin_data->adminId)) : ?>
           <li><a class="d-flex align-items-center" href="gencode"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="OAuth">Create OAuth</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="genpin"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Generate">Generate Card</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="regPin"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Generate Pins">Admission Pins</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="resPin"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Generate Pins">Result Pins</span></a>
           </li>
           <?php else : ?>
           <li><a class="d-flex align-items-center" href="regPin"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Generate Pins">Admission Pins</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="resPin"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Generate Pins">Result Pins</span></a>
           </li>
           <?php endif ?>
         </ul>
       </li>
       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-hotel fa-1x" data-icon="pie-chart"></i><span
             class="menu-title text-truncate" data-i18n="SCHOOL HOSTEL">SCHOOL HOSTEL</span></a>
         <ul class="menu-content">
           <li><a class="d-flex align-items-center" href="create_hostel"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Hostel">Create Hostels</span></a>
           </li>
         </ul>
       </li>
       <!--  <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-book fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="LIBRARY">LIBRARY</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="add_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Book">Add Book</span></a>
             </li>
              <li><a class="d-flex align-items-center" href="student_n_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Lend Book">Lend Book</span></a>
             </li>
             <li><a class="d-flex align-items-center" href="return_books"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Return Book">Return Book</span></a>
            </li>
           </ul>
         </li> -->

       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-bus fa-1x" data-icon="pie-chart"></i><span
             class="menu-title text-truncate" data-i18n="SCHOOL BUS"> SCHOOL BUS </span></a>
         <ul class="menu-content">

           <li>
             <a class="d-flex align-items-center" href="bus_driver"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Drivers">Manage Drivers</span></a>
           </li>

           <li>
             <a class="d-flex align-items-center" href="create_bus"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Vehicles">Manage Vehicles</span></a>
           </li>

           <li>
             <a class="d-flex align-items-center" href="bus_route"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Routes"> Manage Routes</span></a>
           </li>

           <li>
             <a class="d-flex align-items-center" href="student_n_bus"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Assign Bus">Assign Bus</span></a>
           </li>
           <li>
             <a class="d-flex align-items-center" href="running_cost"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Vehicle Maintenance">Vehicle Maintenance</span></a>
           </li>
         </ul>
       </li>
       <!--  <li class=" navigation-header text-truncate"><span data-i18n="EVENT & BLOG">EVENT & BLOG</span>
          </li>  -->
       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-calendar fa-1x" data-icon="retweet"></i><span
             class="menu-title text-truncate" data-i18n="BLOGS &amp; EVENTS">BLOGS &amp; EVENTS</span></a>
         <ul class="menu-content">
           <li><a class="d-flex align-items-center" href="add_event"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Upload Events">Upload Events</span></a> </li>
           <li><a class="d-flex align-items-center" href="add_holidays"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Holiday">Manage Holidays</span></a> </li>

           <li><a class="d-flex align-items-center" href="uploadblog"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Manage Newsletter"> Manage Newsletter</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="feedback"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="FeedBack"> FeedBack</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="add_gallery"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n=" Gallery"> Gallery </span></a>
           <li><a class="d-flex align-items-center" href="add_slider"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Homepage Slider">Homepage Slider</span></a>
           </li>
           <li><a class="d-flex align-items-center" href="add_testimonial"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="What People Say">What People Say</span></a>
           </li>

           <li><a class="d-flex align-items-center" href="visitor_book"><i class="bx bx-right-arrow-alt"></i><span
                 class="menu-item text-truncate" data-i18n="Guest Book">Guest Book</span></a>
           </li>
         </ul>
       </li>
       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="pie-chart"></i><span
             class="menu-title text-truncate" data-i18n="SCHOOL EXAM">SCHOOL EXAM </span></a>
         <ul class="menu-content">
           <li class=" nav-item"><a href="examquestion"><i class="fa fa-edit fa-1x"></i><span
                 class="menu-title text-truncate" data-i18n="Exam Questions">Exam Questions</span></a>
           </li>
           <!-- <li><a class="d-flex align-items-center" href="javascript:void(0)"><i class="bx bx-calendar"></i><span
                 class="menu-item text-truncate" data-i18n="Exam Timetable">Exam Timetable</span></a>
           </li> -->
         </ul>
       </li>
       <!-- MSG -->
       <!-- messaging was removed -->
       <!-- MSG -->

       <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-cogs fa-1x" data-icon="retweet"></i><span
             class="menu-title text-truncate" data-i18n="SETTINGS">SETTINGS</span></a>
         <ul class="menu-content">
           <li class="nav-item"><a href="app_settings"><i class="fa fa-cogs fa-1x" data-icon="morph-folder"></i><span
                 class="menu-title text-truncate" data-i18n="School Profile"> School Profile</span></a>
           </li>
           <li class=" nav-item"><a href="account-settings"><i class="fa fa-edit fa-1x"
                 data-icon="morph-folder"></i><span class="menu-title text-truncate"
                 data-i18n="Personal Profile">Personal Profile</span></a>
           </li>
           <li class=" nav-item"><a href="upload-stamp"><i class="fa fa-edit fa-1x" data-icon="morph-folder"></i><span
                 class="menu-title text-truncate" data-i18n="Role &amp; Permission">Stamp &amp; Signature</span></a>
           </li>
           <li class=" nav-item"><a href="controlRoom"><i class="fa fa-cog fa-1x" data-icon="morph-folder"></i><span
                 class="menu-title text-truncate" data-i18n="Role &amp; Permission">Role &amp; Permission</span></a>
           </li>
           <li class=" nav-item"><a href="mybackup"><i class="fa fa-database fa-1x" data-icon="help"></i><span
                 class="menu-title text-truncate" data-i18n="Backup &amp; Restore"> Backup &amp; Restore</span></a>
           </li>
         </ul>
       </li>
       <li>
         <a onclick="return confirm('Are you sure to open a new tab for the Homepage?');"
           class="d-flex align-items-center" href="<?php echo WEBSITE_HOME_PAGE; ?>" target="_blank"><i
             class="fa fa-globe"></i>
           <span class="menu-item text-truncate"> <?php echo 'Go to Website' ?></span></a>
       </li>
       <li>
         <a class="d-flex align-items-center" onclick=" return confirm('<?php echo $lang["logout-sure?"]; ?>');"
           href="logout?action=logout"><i class="fa fa-power-off"></i>
           <span class="menu-item text-truncate"> <?php echo $lang['Logout'] ?></span></a>
       </li>
     </ul>
   </div>
 </div>