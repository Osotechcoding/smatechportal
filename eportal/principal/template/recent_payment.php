 <div class="col-xl-12 col-md-12 col-sm-12 col-12 dashboard-order-summary">
     <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center pb-50">
          <h4 class="card-title">Recent Payment</h4>
        </div>
        <div class="card-body p-0 pb-1">
          <div class="table-responsive">
            <table class="table table-borderless table-marketing-campaigns mb-0">
               <thead class="text-center">
              <tr>
                <th>Student</th>
                <th>Student Class</th>
                <th>Fee Component</th>
                <th>Amount</th>
                <th>Status</th>
                <!-- <th>View</th> -->
              </tr>
            </thead>
            <tbody class="text-center">
              <?php 
              $get_recent_payments = $Administration->get_recent_payment_records();
              if ($get_recent_payments) {
                foreach ($get_recent_payments as $RecentValue) { 
                  $student_data = $Student->get_student_data_byId($RecentValue->std_id);
                  ?>
                  <tr>
                <td><?php echo ucwords($student_data->full_name);?></td>
                <td><?php echo strtoupper($student_data->studentClass);?></td>
                <td><?php echo ucfirst($RecentValue->component_fee);?></td>
                <td>&#8358;<?php echo number_format($RecentValue->fee_paid,2);?></td>
                <td>
                  <?php if (intval($RecentValue->total_fee) === intval($RecentValue->fee_paid) && (intval($RecentValue->fee_due) ===0)) {
                    echo '<span class="badge badge-success badge-sm">Completed</span>';
                  } else{
                    echo '<span class="badge badge-warning badge-sm">Part Payment</span>';
                  }?>
                  </td>
               <!--  <td><a href="#"><span class="badge badge-success badge-sm">View</span></a></td> -->
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