 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="./">
          <h2 class="brand-text mb-0"><?php echo $lang['owner'] ?></h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
          <li class="active"><a class="d-flex align-items-center" href="./"><i class="fa fa-desktop fa-1x"></i><span class="menu-item text-truncate" data-i18n="Dashboard"><?php echo $lang['Dashboard'] ?></span></a>
              </li>
         <!--  <li class="navigation-header text-truncate"><span data-i18n="MANAGEMENT">MANAGEMENT</span>
          </li> -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="ADMINISTRATIVE">ADMINISTRATIVE</span></a>
            <ul class="menu-content">
              <li class="nav-item"><a href="acaSession"><i class="fa fa-calendar fa-1x"></i><span class="menu-title text-truncate" data-i18n="academic year">Academic Year</span></a>
          </li>
           <li><a class="d-flex align-items-center" href="create_subject"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Subject">Manage Subject</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="upload_lecture"><i class="bx bx-video-plus"></i><span class="menu-item text-truncate" data-i18n="Online Class"> Online Class</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="create_classroom"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="School Classes">School Classes</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="registerStudentSubject"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Register Subject I">Register Subject I</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="bulkSubjectReg"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Register Subject II"> Register Subject II</span></a>
             </li>
             <li><a class="d-flex align-items-center" href="examSubjectList"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Filter Subjects">Filter Subjects</span></a>
            </li>
           <li class=" nav-item"><a href="student_assignment"><i class="fa fa-book fa-1x"></i><span class="menu-title text-truncate" data-i18n="Assignment">Assignment</span></a>
          </li>
           <li class=" nav-item"><a href="markstudentass"><i class="fa fa-pencil fa-1x"></i><span class="menu-title text-truncate" data-i18n="Mark Assignment">Mark Assignment</span></a>
          </li>
         
           <li class=" nav-item"><a href="dutyAssignment"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Assign Duty">Assign Duty</span></a>
          </li>
            </ul>
          </li>
          <!-- ADMISSION -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE PORTAL">MANAGE PORTAL</span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="callAdmission"><i class="fa fa-cogs fa-1x"></i><span class="menu-title text-truncate" data-i18n="Portal Status">Admission Portal</span></a>
          </li>
            </ul>
          </li>
          <!-- ADMISION ENDS -->
          <!-- RESULT -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-bar-chart fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE RESULTS">MANAGE RESULTS</span></a>
            <ul class="menu-content">
              <li class="nav-item"><a href="rgrading"><i class="fa fa-line-chart fa-1x"></i><span class="menu-title text-truncate" data-i18n="Result Grading">Result Grading</span></a>
          </li>
           <li class=" nav-item"><a href="result_uploading"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Upload Results">Upload Results</span></a>
          </li>
           <li class=" nav-item"><a href="view_uploaded_result"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Results">View Results</span></a>
          </li>
          <li class=" nav-item"><a href="uploading_behavior"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Affective Domain">Affective Domain</span></a>
          </li>
          <li class=" nav-item"><a href="view_cognitive"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Affective">View Affective</span></a>
          </li>
          <li class=" nav-item"><a href="psychomotor"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Psychomotor">Psychomotor</span></a>
          </li>
          <li class=" nav-item"><a href="viewpsycho"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Psychomotor">View Psychomotor</span></a>
          </li>
           <li class=" nav-item"><a href="viewResultComments"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="Result Comments">Result Comments</span></a>
          </li>
          <li class=" nav-item"><a href="checkResult"><i class="fa fa-line-chart fa-1x"></i><span class="menu-title text-truncate" data-i18n="Check Result">Check Result</span></a>
          </li>
           <li class=" nav-item"><a href="editstudentresult"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Edit Result">Edit Result</span></a>
          </li>
          <li class=" nav-item"><a href="deleteExamResults"><i class="fa fa-trash fa-1x"></i><span class="menu-title text-truncate" data-i18n="Remove Result">Remove Result</span></a>
          </li>
        
           <li class=" nav-item"><a href="publishResult"><i class="fa fa-paper-plane fa-1x"></i><span class="menu-title text-truncate" data-i18n="Publish Results">Publish Results</span></a>
          </li>

            <li class=" nav-item"><a href="viewPublishedResult"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Published">View Published</span></a>
          </li> 
        
            </ul>
          </li>
          <!-- RESULT ENDS -->
          <!-- STUDENT -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-graduation-cap fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE STUDENTS">MANAGE STUDENTS</span></a>
            <ul class="menu-content">
          <li class="nav-item"><a href="ab_students"><i class="fa fa-user-plus fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Students">View Students</span></a>
          </li>
          <!-- student_attendance -->
           <li class="nav-item"><a href="student_attendance"><i class="fa fa-child fa-1x"></i><span class="menu-title text-truncate" data-i18n="Mark Attendance">Mark Attendance</span></a>
          </li>
           <li class="nav-item"><a href="view_student_attendance"><i class="fa fa-child fa-1x"></i><span class="menu-title text-truncate" data-i18n="view Attendance">View Attendance</span></a>
          </li>
           <li class="nav-item"><a href="prefects"><i class="fa fa-user-secret fa-1x"></i><span class="menu-title text-truncate" data-i18n="Manage Prefects">Manage Prefects</span></a>
          </li>
           <li class="nav-item"><a href="student_office_list"><i class="fa fa-credit-card-alt fa-1x"></i><span class="menu-title text-truncate" data-i18n="Student Prefects">Student Office</span></a>
          </li>
          <li class="nav-item"><a href="massPromotion"><i class="fa fa-line-chart fa-1x"></i><span class="menu-title text-truncate" data-i18n="Student Promotion">Student Promotion</span></a>
          </li>
            </ul>
          </li>
          <!-- STUDENT ENDS -->
           <!-- STUDENT -->
          <li class="nav-item"><a href="javascript:void(0)"><i class="fa fa-users fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="MANAGE STAFF"> MANAGE STAFF</span></a>
            <ul class="menu-content">
          <li class="nav-item"><a href="staffs"><i class="fa fa-user-plus fa-1x"></i><span class="menu-title text-truncate" data-i18n="Staff">Staff</span></a>
             <li class="nav-item"><a href="HODs"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Staff Office">Staff Office</span></a>
          </li>
           <li class="nav-item"><a href="staff_office_list"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Create Office">Create Office</span></a>
          </li>
            </ul>
          </li>
          <!-- STUDENT ENDS -->

        <!--   <li class=" navigation-header text-truncate"><span data-i18n="FINANCIAL">FINANCIAL</span>
          </li> -->
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-money fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="Accounting">ACCOUNTING</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="make_payment"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n=" Make Payment">Make Payment</span></a> </li>
                <li><a class="d-flex align-items-center" href="filter-payments"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Search Payment"> Search Payment</span></a> </li>
               <li><a class="d-flex align-items-center" href="fee_component"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Component">Fee Component</span></a> </li>
                 <li><a class="d-flex align-items-center" href="fee_allocate"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Fee Structure">Fee Structure</span></a> </li>
                  <li><a class="d-flex align-items-center" href="account_reports"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Payment Records">Payment Records</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="visap_payroll"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Payroll"> Payroll</span></a>
              </li>
                <li><a class="d-flex align-items-center" href="school_expense"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Expenses"> Expenses</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="add_loan"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Loan">Manage Loan</span></a> </li>
            </ul>
          </li>
         <!--  <li class=" navigation-header text-truncate"><span data-i18n="SCHOOL ACTIVITY">SCHOOL ACTIVITY</span>
          </li> -->
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-credit-card-alt fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCRATCH CARD">SCRATCH CARD</span></a>
            <ul class="menu-content">
              <?php if ($Admin->isSuperAdmin($admin_data->adminId)): ?>
                <li><a class="d-flex align-items-center" href="gencode"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="OAuth">Create OAuth</span></a>
              </li>
                 <li><a class="d-flex align-items-center" href="genpin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate">Generate Card</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="regPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Admission Pins</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="resPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Result Pins</span></a>
              </li>
            <?php else: ?>
               <li><a class="d-flex align-items-center" href="regPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Admission Pins</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="resPin"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Generate Pins">Result Pins</span></a>
              </li>
              <?php endif ?>
            </ul>
          </li>
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-hotel fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="HOSTEL">HOSTEL</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="create_hostel"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Hostel">Manage Hostel</span></a>
              </li>
            </ul>
          </li> 
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-book fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="LIBRARY">LIBRARY</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="add_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Book">Add Book</span></a>
             </li>
              <li><a class="d-flex align-items-center" href="student_n_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Lend Book">Lend Book</span></a>
             </li>
             <li><a class="d-flex align-items-center" href="return_books"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Return Book">Return Book</span></a>
            </li>
           </ul>
         </li>

          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-bus fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCHOOL BUS"> SCHOOL BUS </span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="bus_route"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Bus">Manage Bus</span></a>
              </li>

               <li><a class="d-flex align-items-center" href="student_n_bus"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Student & Bus">Student & Bus</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="running_cost"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Bus Maintenance">Bus Maintenance</span></a>
              </li>
            </ul>
          </li> 

          <!--  <li class=" navigation-header text-truncate"><span data-i18n="EVENT & BLOG">EVENT & BLOG</span>
          </li>  -->
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-calendar fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="BLOGS &amp; EVENTS">BLOGS &amp; EVENTS</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="add_event"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Events">Add Events</span></a> </li>
                <li><a class="d-flex align-items-center" href="add_holidays"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Declare Holiday">Declare Holidays</span></a> </li>

               <li><a class="d-flex align-items-center" href="uploadblog"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n=" Add Blog Post"> Add Blog Post</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="add_gallery"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Gallery">Add Gallery </span></a>
                <li><a class="d-flex align-items-center" href="add_slider"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Add Home Slider">Add Home Slider</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="add_testimonial"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="People Testimonials">People Testimonials</span></a>
              </li>

                <li><a class="d-flex align-items-center" href="visitor_book"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Vistors Book">Vistors Book</span></a>
              </li>
            </ul>
          </li>
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-edit fa-1x" data-icon="pie-chart"></i><span class="menu-title text-truncate" data-i18n="SCHOOL EXAM">SCHOOL EXAM </span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="examquestion"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Exam Questions">Exam Questions</span></a>
          </li>
               <li><a class="d-flex align-items-center" href="javascript:void(0)"><i class="bx bx-calendar"></i><span class="menu-item text-truncate" data-i18n="Exam Timetable">Exam Timetable</span></a>
              </li>
            </ul>
          </li> 
          <!-- MSG -->
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-envelope fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="Messages">MESSAGES</span></a>
            <ul class="menu-content">
               <li><a class="d-flex align-items-center" href="javaScript:void(0)"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Send Message">Send </span></a> </li>
                 <li><a class="d-flex align-items-center" href="javaScript:void(0)"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Inbox"> Inbox</span></a> </li>
            </ul>
          </li> 
          <!-- MSG -->
       <!--  <li class=" navigation-header text-truncate"><span data-i18n="SETTINGS">SETTINGS</span>
          </li> -->
           <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-cogs fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="Settings">Application Settings</span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="app_settings"><i class="fa fa-cogs fa-1x" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="School Profile"> School Profile</span></a>
          </li>
          <li class=" nav-item"><a href="account-settings"><i class="fa fa-edit fa-1x" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Personal Profile">Personal Profile</span></a>
          </li>
                <li class=" nav-item"><a href="controlRoom"><i class="fa fa-cog fa-1x" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Role &amp; Permission">Role &amp; Permission</span></a>
          </li>
          <li class=" nav-item"><a href="mybackup"><i class="fa fa-database fa-1x" data-icon="help"></i><span class="menu-title text-truncate" data-i18n="Backup &amp; Restore"> Backup &amp; Restore</span></a>
          </li>
            </ul>
          </li>
         

              <li>
               <a onclick="return confirm('Are you sure to open a new tab for the Homepage?');" class="d-flex align-items-center" href="http://localhost/diamondlight/" target="_blank"><i class="fa fa-globe"></i>
                <span class="menu-item text-truncate"> <?php echo 'Visit Homepage'?></span></a>
              </li>
              <li>
                <a class="d-flex align-items-center" onclick=" return confirm('<?php echo $lang["logout-sure?"];?>');" href="logout?action=logout"><i class="fa fa-power-off"></i>
                <span class="menu-item text-truncate"> <?php echo $lang['Logout'] ?></span></a>
              </li>
        </ul>
      </div>
    </div>
