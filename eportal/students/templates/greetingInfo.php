<div class="page-header">
  <div class="row">
    <div class="col-md-6">
      <h3 class="text-muted-light mb-0"><i class="fa fa-user"></i>Name:<b class="text-info">
          <?php echo ucwords($student_data->full_name); ?> </b></h3>
      <h3 class="text-muted-light mb-1"><i class="fa fa-pen"></i> <b>Present Class :
          <?php echo strtoupper($student_data->studentClass); ?></b></h3>
      <h3 class="text-muted-light mb-1"><i class="fa fa-user-secret"></i> <b>Teacher :
          <?php
                    $classTeacher = $Administration->get_class_teacher($student_data->studentClass);
                    if ($classTeacher) {
                        if ($classTeacher->staffGender == "Male") {
                            $t = "Mr. ";
                        } else {
                            $t = "Mrs. ";
                        }
                        echo $t . strtoupper($classTeacher->firstName);
                    } else {
                        echo '<span class="badge badge-danger badge-md">No Class Teacher Yet</span>';
                    } ?></b></h3>
      <h3 class="text-muted-light mb-1"><b><i class="fa fa-briefcase"></i> Session:
          <?php echo $activeSess->session_desc_name; ?> &raquo; <?php echo $activeSess->term_desc; ?></b></h3>
      <h3 class="text-muted-light mb-1"><i class="fa fa-graduation-cap"></i> <b>Year of Admission
          :<?php echo date("M, Y", strtotime($student_data->stdApplyDate)); ?></b></h3>
      <h3 class="text-muted-light mb-1"><i class="fa fa-calendar-alt"></i> <span>
          <?php echo date("l jS F, Y"); ?>: <small id="displayTime" class="badge badge-danger"></small></span></h3>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <img src="<?php echo  $Passport;?>" width="150" alt="passport"
        style="border:2px solid darkblue;border-radius: 10px;" class="float-right p-0 mb-0 mr-2">
      <div class="clearfix"></div>
    </div>
  </div>
</div>