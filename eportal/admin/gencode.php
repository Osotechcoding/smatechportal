<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Smatech Accesssibility Code Generator</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/dataTableHeaderLink.php";?>
   <style>

		/* General */

/*button, code {display: block;margin: 30px auto}*/

/* Code */

code {
  display: block;
    background-color: antiquewhite;
    color: dimgrey;
    height: 100px;
    width: auto;
    margin: 30px auto;
    text-align: center;
    line-height: 100px;
    font-size: 40px;
    font-weight: bold;
    border-left: 15px solid olivedrab
}

	</style>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Generate OAuth
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-barcode fa-1x"></span> Generate OAuth </h3>
  </div>
    </div>
    <div class="text-center"><h2>Generate OAuth Code For Schools</h2></div>
   <div class="col-md-12 col-12">
      <div class="card">
       
        <div class="card-body">
        	 <code id="serial">**********</code>
          <form class="form form-vertical" id="authcodegen_form">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="schoolname">SCHOOL NAME</label>
                    <input type="text" autocomplete="off" class="form-control form-control-lg" name="schoolname"
                      placeholder="XYZ Schools">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="termcode">TERM</label>
                      <select name="termcode" id="termcode" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="sessioncode">SESSION</label>
                    <input type="text" autocomplete="off" class="form-control form-control-lg" name="sessioncode" placeholder="2021/2022">
                  </div>
                   <input type="hidden" id="serialsave" class="form-control" name="code" readonly>
                    <input type="hidden" class="form-control" name="action" value="genOAuthCode" readonly>
                </div>
                <button id="generate" type="button" class="btn btn-success btn-lg btn-round" onclick="generateSerial()">Generate</button>
                 
                <button class="btn btn-dark btn-lg ml-3 __loadingBtn__" type="submit" style="float: right;">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--  -->
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>School Name</th>
          <th>Session</th>
          <th>Term</th>
          <th>Code</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <?php 
                $all_Code = $Admin->getAllOauthCode();
                if ($all_Code) {
                  $cnt=0;
                  foreach ($all_Code as $Codes) {
                    $cnt++;
                    ?>
          <tr>
            <td><?php echo $cnt;?> </td>
            <td><?php echo ucwords($Codes->school_name);?></td>
            <td><?php echo ucwords($Codes->active_ses);?></td>
          <td><?php echo ucwords($Codes->term);?></td>
          <td><?php echo ucwords($Codes->oauth_code);?></td>
          <td><?php echo date("M j, Y",strtotime($Codes->created_at));?></td>
         <td> <button type="button" class="btn btn-danger btn-md delete_oauthcode_btn __loadingBtn2__<?php echo $Codes->id;?>" data-id="<?php echo $Codes->id;?>">Delete</button> </td>
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
    <!-- content goes here -->
        </div>
      </div>
    </div>

    <!-- END: Content-->
    </div>


   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/DataTableFooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
     <script>
       $(document).ready(function(){

        //
         const delete_oauthcode_btn = $(".delete_oauthcode_btn");
      delete_oauthcode_btn.on("click", function(){
        let codeId = $(this).data("id");
        let action = 'delete_oauth_code';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+codeId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,codeId:codeId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+codeId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })

        //
        const GENAUTHCODEFORM = $("#authcodegen_form");
        GENAUTHCODEFORM.on("submit", function (event) {
              event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request
      $.post("../actions/actions",GENAUTHCODEFORM.serialize(),function(response){
        setTimeout(()=>{
      $(".__loadingBtn__").html('Save Code').attr("disabled",false);
       $("#server-response").html(response);
        },500);
      })
        })
       })
     </script>
     <script>
	function generateSerial() {
    
    'use strict';
    
    var chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
        
        serialLength = 10,
        
        randomSerial = "",
        
        i,
        
        randomNumber;
    
    for (i = 0; i < serialLength; i = i + 1) {
        
        randomNumber = Math.floor(Math.random() * chars.length);
        
        randomSerial += chars.substring(randomNumber, randomNumber + 1);
        
    }
    
    document.getElementById('serial').innerHTML = randomSerial;
    document.getElementById('serialsave').value = randomSerial;
    
}
</script>
  </body>
  <!-- END: Body-->
</html>