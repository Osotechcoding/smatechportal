<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<div class="row align-items-center">
<div class="col-sm-6">
 <div class="page-title">
My Classmates
</div>
</div>
<!-- <div class="col-sm-6 text-sm-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-outline-primary mr-2"><img src="assets/img/excel.png" alt=""><span class="ml-2">Excel</span></button>
<button class="btn btn-outline-danger mr-2"><img src="assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span></button>
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div> -->
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Name </th>
<th>Student ID</th>
<th>Class</th>
<th>Mobile</th>
<th>Date of Birth</th>
<!-- <th class="text-right">Action</th> -->
</tr>
</thead>
<tbody>
<?php 
$allClassMates = $Student->get_all_my_class_mates($student_data->studentClass);
if ($allClassMates) {
   foreach ($allClassMates as $ClassMate) {
       ?>
<tr>
<td>
<h2><a href="javascript:void(0);" class="avatar text-white"><?php if ($ClassMate->stdPassport ==NULL || $ClassMate->stdPassport == ""): ?>
    <img src="assets/img/author.jpg" width="60" alt="passport" style="border:2px solid grey;border-radius: 10px;" class="rounded-circle">
<?php else: ?>
    <img src="../schoolImages/students/<?php echo $ClassMate->stdPassport;?>" width="60" alt="passport" style="border:2px solid darkblue;border-radius: 10px;" class="rounded-circle">
<?php endif ?></a><a href="javascript:void(0);"><?php echo strtoupper($ClassMate->stdSurName." ".$ClassMate->stdFirstName);?> <span></span></a></h2>
</td>
<td><?php echo strtoupper($ClassMate->stdRegNo);?></td>
<td><?php echo strtoupper($ClassMate->studentClass);?></td>
<td><?php echo strtoupper($ClassMate->stdPhone);?></td>
<td><?php echo date("F j, Y",strtotime($ClassMate->stdDob));?></td>
<!-- <td class="text-right">
<a href="edit-student.html" class="btn btn-primary btn-sm mb-1">
<i class="far fa-edit"></i>
</a>

<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
<i class="far fa-trash-alt"></i>
</button>
</td> -->
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