 <div class="col-xl-12 col-12 dashboard-marketing-campaign">
      <div class="card marketing-campaigns">
        <div class="card-header d-flex justify-content-between align-items-center pb-1">
          <h4 class="card-title">(New Admission)</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="table-responsive">
          <!-- table start -->
          <button onclick="return window.location.href='./student_adm_portal';" type="button" class="btn btn-dark btn-pill btn-buy-now mb-2 ml-2">Admission Portal</button>
          <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
            <thead>
              <tr>
                <th>Passport</th>
                <th>FullName</th>
                <th>Admission Class</th>
                <th>Application Number</th>
                <th>Application Date</th>
               
              </tr>
            </thead>
            <tbody>
             <?php 
          $all_active_students = $Student->get_all_students_by_status("pending");
          if ($all_active_students) {
           foreach ($all_active_students as $students) {?>
            <tr>
             <td>
              <?php if ($students->stdPassport ==""||$students->stdPassport ==NULL): ?>
                <img src="../author.jpg" width="80" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
                <?php else: ?>
                  <img src="../schoolImages/students/<?php echo $students->stdPassport;?>" width="80" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
              <?php endif ?>
              </td>
          <td><?php echo ucwords($students->stdSurName." ".$students->stdFirstName." ".$students->stdMiddleName) ?></td>
          <td><?php echo strtoupper($students->studentClass)?></td>
          <td><?php echo strtoupper($students->stdRegNo)?></td>
          <td><?php echo date("F j, Y",strtotime($students->stdApplyDate))?></td>
         
        </tr>
          <?php }
          }
           ?>
             
            </tbody>
          </table>
          <!-- table ends -->
        </div>
      </div>
    </div>