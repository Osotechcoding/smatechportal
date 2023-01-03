$(document).ready(function(){
    const student_result_upload_form = $("#student_result_upload_form");
    student_result_upload_form.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
     //send to server
     $.post("../actions/actions",student_result_upload_form.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('UPLOAD NOW').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
    })
  })