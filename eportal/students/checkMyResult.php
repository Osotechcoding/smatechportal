<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: Student Dashboard</title>
<?php include_once ("templates/HeaderLinks.php");?>
<style>
  ul li.emp{
    list-style: numbering;
    font-weight: 500;
    font-size: 1.5rem;
    line-height: inherit;
    align-items: left;
  }
</style>
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
	<div class="col-md-10 d-flex offset-1">
<div class="card flex-fill">
<div class="card-header">
<h4 class="card-title">Click here to Read Instruction on <button type="button" class="btn btn-info bnt-sm btn-round" data-toggle="modal" data-target="#resultInstruction">How to Check your Result</button></h4>
 </div>
<div class="card-body">
<form id="student_result_checker_form">

<div class="form-group row">
<label class="col-md-3 col-form-label">ADMISSION NUMBER</label>
<div class="col-md-9">
<input type="text" class="form-control" name="student_reg_number" value="<?php echo $student_data->stdRegNo;?>" readonly>
</div>
</div>
<div class="form-group row mb-3">
<label class="col-md-3 col-form-label">RESULT CLASS</label>
<div class="col-md-9">
<select name="result_class" id="result_class" class="custom-select form-control">
	<option value="" selected>Choose Result Class</option>
		<?php echo $Administration->get_classroom_InDropDown_list();?>
</select>
</div>
</div>
<div class="form-group row mb-3">
<label class="col-md-3 col-form-label">RESULT SESSION</label>
<div class="col-md-9">
<select name="result_session" id="result_session" class="custom-select form-control">
	<option value="" selected>Choose Result Session</option>
	<?php echo $Administration->get_all_session_lists();?>
</select>
</div>
</div>
<div class="form-group row mb-3">
<label class="col-md-3 col-form-label">RESULT TERM</label>
<div class="col-md-9">
<select name="result_term" id="result_term" class="custom-select form-control">
	<option value="" selected>Choose Result Term</option>
    <option value="1st Term">1st Term</option>
    <option value="2nd Term">2nd Term</option>
    <option value="3rd Term">3rd Term</option>
</select>
</div>
</div>
<div class="form-group row mb-3">
<label class="col-md-3 col-form-label"> CARD PIN</label>
<div class="col-md-9">
<input type="password" autocomplete="off" name="cardPin_" id="cardPin_" class="form-control" placeholder="***********">
</div>
</div>
<div class="form-group row mb-3">
<label class="col-md-3 col-form-label"> CARD SERIAL</label>
<div class="col-md-9">
<input type="text" autocomplete="off" name="cardSerial_" id="cardSerial_" class="form-control" placeholder="**********">
</div>
</div>
<div class="text-right mb-3">
<input type="hidden" name="action" value="_check_Student_Result_">
<button type="submit" class="btn btn-dark btn-lg __loadingBtn__">Check Result</button>
<button type="button" class="btn btn-danger btn-lg back_btn">Back</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal Instruction -->
<div id="resultInstruction" class="modal" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
 <div class="modal-header">
 	<h3 style="font-size: 1.5rem;">To check your result, Please, follow the instructions below:</h3>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div> 
<!-- <h4 class="text-uppercase text-center mb-2" style="align-items: center;">Instructions </h4> -->
<div class="modal-body">
	
<ul style="font-weight: bold;" class="text-danger">
  <em class="text-left">
  <li class="emp">Carefully scratch off the covered area of your scratch card to reveal your PIN No</li>
  <li class="emp">Enter Your Admission No in the space provided</li>
  <li class="emp">Choose Result Class from the list</li>
  <li class="emp">Choose Result Session from the list</li>
  <li class="emp">Choose Result Term from the list (1st,2nd or 3rd)</li>
  <li class="emp">Enter the PIN No in your scratch card correctly</li>
  <li class="emp">Enter your scratch card SERIAL No</li>
  <li class="emp">Finaly, Click on <b>check result</b> Button and wait for your result to display.</li>
  </em>
</ul>
<div class="modal-footer">
	<div class="m-t-20 text-center">
<button class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
</div>
</div>


</div>
</div>
</div>
</div>

<?php include_once ("templates/FooterScript.php");?>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".back_btn").on("click", function(){
			$(".back_btn").html("loading...");
			setTimeout(()=>{
				window.location.href='./';
			},500);
		});
		$("#student_result_checker_form").on("submit",function(event){
        $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request
        event.preventDefault();
        const checkMyResultForm = $(this).serialize();
        $.post("../actions/actions",checkMyResultForm,function(data){
        setTimeout(function(){
         $("#student_result_checker_form")[0].reset();
          $("#server-response").html(data);
          $(".__loadingBtn__").html('Check Result').attr("disabled",false);
        },1000);
        })

      });
	})
</script>
</body>
</html>