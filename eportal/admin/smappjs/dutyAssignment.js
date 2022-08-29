$(document).ready(function(){
      const  RosterForm = $("#RosterForm");
     RosterForm.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send a request 
      $.post("../actions/actions",RosterForm.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('<i class="bx bx-paper-plane"></i> Submit').attr("disabled",false);
          $("#response").html(data);
        },1500);
      })

      });

     // END of Submit
     // Start of Delete action
const delete_btn = $(".delete_btn");
delete_btn.on("click", function(){
  let dutyId = $(this).data("id");
  let action = $(this).data("action");
  let is_true = confirm("Are you sure you wanto permanently remove this Duty?");
  if (is_true) {
$.post("../actions/delete_actions",{action:action,dutyId:dutyId}, function(res){
    setTimeout(()=>{
      $("#response2").html(res);
    },500);
  })
  }else{
    return false;
  }
})
     // End of delete action 

     // Start of Read Info 
      const view_btn = $(".view_btn");
  view_btn.on("click", function(){
     let instruction = $(this).data("value");
     //let title = $(this).data("title");
      $("#duty_details").html(instruction);
      //$("#subTitle").html(title);
    $("#ReadInstructModal").modal("show");
  })
     // End of Read Info 
      
    })