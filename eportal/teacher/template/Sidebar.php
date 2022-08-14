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
          <li class="navigation-header text-truncate"><span data-i18n="MANAGEMENT">MANAGEMENT</span>
          </li>
           <li><a class="d-flex align-items-center" href="upload_lecture"><i class="bx bx-video-plus"></i><span class="menu-item text-truncate" data-i18n="Online Classroom">Online Classroom</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="student_assignment"><i class="bx bx-edit-alt"></i><span class="menu-item text-truncate" data-i18n="Online Classroom">Online Assignment</span></a>
              </li>
               <li><a class="d-flex align-items-center" href="markstudentass"><i class="bx bx-edit-alt"></i><span class="menu-item text-truncate" data-i18n="Online Classroom">Mark Assignment</span></a>
              </li>
          <!-- RESULT -->
          <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-bar-chart fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="Manage Results">REPORT SHEET</span></a>
            <ul class="menu-content">
           <li class=" nav-item"><a href="examinationquestion"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Exam Question">Submit Questions</span></a>
          </li>
          <li class="nav-item"><a href="result_uploading"><i class="fa fa-upload fa-1x"></i><span class="menu-title text-truncate" data-i18n="Upload Result">Upload Results</span></a>
          </li>
           <li class=" nav-item"><a href="view_uploaded_result"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Result">View Results</span></a>
          </li>
          <li class=" nav-item"><a href="editResult"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Update Result">Update Result</span></a>
         </li>
           <!-- RESULT COMMENT SECTION -->
          <?php if ($staff_data->staffRole =="Class Teacher"): ?>
            
             <li class="nav-item"><a href="class_teacher_comment"><i class="fa fa-upload fa-1x"></i><span class="menu-title text-truncate" data-i18n="Result Comments"> Result Comments</span></a>
          </li>
           <li class="nav-item"><a href="view_uploaded_comment"><i class="fa fa-comment fa-1x"></i><span class="menu-title text-truncate" data-i18n="Result Comments"> View Comments</span></a>
          </li>
           <li class=" nav-item"><a href="uploading_behavior"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Result">Upload Affective</span></a>
          </li>
          <li class=" nav-item"><a href="view_cognitive"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Result">View Affective</span></a>
          </li>
          <li class=" nav-item"><a href="psycho"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="Psychomotor"> Psychomotor</span></a>
         </li>
         <li class=" nav-item"><a href="viewpsychomotor"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Psychomotor">View Psychomotor</span></a>
         </li>
         
          <?php endif ?>
         <!-- RESULT COMMENT SECTION -->
          
            </ul>
          </li>
          <!-- RESULT ENDS -->
          <!-- STUDENT -->
           <!-- SUBJECT REGISTRATION -->
          <?php if ($staff_data->staffRole ==="Class Teacher"): ?>
              <li class="nav-item"><a href="registerStudentSubject"><i class="fa fa-book fa-1x"></i><span class="menu-title text-truncate" data-i18n="Subjects Offered"> Subjects Offered</span></a>
          </li> 
           <li><a class="d-flex align-items-center" href="mystudents"><i class="fa fa-graduation-cap"></i><span class="menu-item text-truncate" data-i18n="Students">Students</span></a>
              </li>
           <li class="nav-item"><a href="javaScript:void(0)"><i class="fa fa-check-square-o fa-1x" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="Attendance"> Attendance</span></a>
            <ul class="menu-content">
          <!-- student_attendance -->
           <li class="nav-item"><a href="student_attendance"><i class="fa fa-edit fa-1x"></i><span class="menu-title text-truncate" data-i18n="Mark Attendance">Mark Attendance</span></a>
          </li>
           <li class="nav-item"><a href="view_student_attendance"><i class="fa fa-eye fa-1x"></i><span class="menu-title text-truncate" data-i18n="View Attendance">View Attendance </span></a>
          </li>
            </ul>
          </li>
          <?php endif ?>
          <!-- SUBJECT REGISTRATION -->

          <!-- STUDENT ENDS -->
          <li class=" nav-item"><a href="javaScript:void(0)"><i class="fa fa-calendar fa-1x" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="blog & event"> EVENTS</span></a>
            <ul class="menu-content">
               <li class=" nav-item"><a href="duty"><i class="fa fa-briefcase fa-1x"></i><span class="menu-title text-truncate" data-i18n="Assign Duty">My Duties</span></a>
          </li>
               <li><a class="d-flex align-items-center" href="add_event"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Event">School Events</span></a> </li>
                <li><a class="d-flex align-items-center" href="add_holidays"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Manage Holiday">Holidays</span></a> </li>
            </ul>
          </li>
          <li><a class="d-flex align-items-center" href="account-settings"><i class="fa fa-cogs"></i><span class="menu-item text-truncate" data-i18n="Virtual Lecture">Edit Profile</span></a>
              </li>
              <li>
                <a class="d-flex align-items-center" onclick=" return confirm('<?php echo $lang["logout-sure?"];?>');" href="logout?action=logout"><i class="fa fa-power-off"></i>
              <span class="menu-item text-truncate"> <?php echo $lang['Logout'] ?></span></a>

              </li>
              <li>
                <a class="d-flex align-items-center" href="../../" target="_blank"><i class="fa fa-globe"></i>
                <span class="menu-item text-truncate"> <?php echo 'Visit Website' ?></span></a>

              </li>
        </ul>
      </div>
    </div>
