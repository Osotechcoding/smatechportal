<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo __SCHOOL_NAME__; ?> :: Subjects List</title>

<?php include_once ("templates/HeaderLinks.php");?>
</head>
<body>
<div class="main-wrapper">
<!-- NAV BAR HEADER -->
<?php include("templates/navBarMenu.php") ?>
<!-- NAV BAR HEADER ENDS -->
<!-- SIDE BAR HEADER -->
<?php include("templates/studentSideBar.php") ?>
<!-- SIDE BAR HEADER ENDS -->
<div class="page-wrapper">
<div class="content container-fluid">
<!-- GREETING INFO -->
<?php include("templates/greetingInfo.php");?>
<!-- GREETING INFO ENDS -->
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12">
	<div class="text-center"><h3 id="server-response" class="server-response"></h3></div>
</div>

</div>
<div class="content-page">
<h3 class="mt-3 text-center mb-3 text-warning">LIST OF SUBJECTS OFFERED IN <?php echo $student_data->studentClass;?> FOR <?php echo strtoupper($activeSess->session_desc_name);?> ACADEMIC SESSION</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable text-center">
<thead class="thead-light">
<tr>
<th>S/N</th>
<th>Subject Desc</th>
<th>Registered at</th>
</tr>
</thead>
<tbody>
	<?php 
$regiestered_subejcts = $Student->all_my_registered_exam_subejcts($student_data->studentClass);
if ($regiestered_subejcts) {
	$cnt =0;
	foreach ($regiestered_subejcts as $allSubject) {
		$cnt++;
		?>
	<tr>
<td><?php echo $cnt;?></td>
<td><?php echo strtoupper($allSubject->subject_name);?></td>
<td><?php echo date("l jS F, Y",strtotime($allSubject->created_at));?></td>
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
</div>
</div>

<?php include_once ("templates/FooterScript.php");?>
<script>
	$(document).ready(function(){
		// my_toastr("success","Welcome to SMApp Version 1.0.1");
		$(".select2").select2();

		//when unregister btn is clicked
		const remove_sub_btn = $(".remove_sub_btn");
		remove_sub_btn.on("click", function(){
			
			let theId =$(this).data("id");
			let stuId =$(this).data("value");
			let action ='unregistered_exam_subject_now';
			var is_true = confirm("Are you Sure you really want to unregister this Subject?");
			if (is_true) {
				$(".__loadingBtn__"+theId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
				//send request 
				$.post("../actions/actions",{action:action,theId:theId,stuId:stuId},function(data){
					setTimeout(()=>{
						$(".__loadingBtn__"+theId).html("<i class='far fa-trash-alt'></i> Unregister").attr("disabled",false);
						$(".server-response").html(data);
					},1500);
				});
			}else{
				return false;
			}
		})
		//when a register subject btn is clicked 
		const ExamSubejctRegForm =$("#ExamSubejctRegForm");
		ExamSubejctRegForm.on("submit", (event)=>{
			event.preventDefault();
			 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...');
			//send to server
			$.post("../actions/actions",ExamSubejctRegForm.serialize(),(res)=>{
				setTimeout(()=>{
					$("#server-response").html(res);
					 $(".__loadingBtn__").html('Submit Classnote');
				},2000);
			});
		})
	});

	/*function my_toastr(info="info",msg,title="SMApp Says"){
	toastr.error(msg,title,{showMethod:"slideDown",hideMethod:"fadeOut",timeOut:5000,progressBar:!0});
	}*/
</script>
</body>
</html>