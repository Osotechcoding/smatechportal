
$(document).ready(function(){
    //STUDENT FORM SUBMISSION METHOD
    const singleResultForm = $("#singleResultForm");
    singleResultForm.on("submit", function(e){
    e.preventDefault();
    $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
    //send request 
    $.post("../actions/actions",singleResultForm.serialize(),function(res_data){
    setTimeout(()=>{
    $(".__loadingBtn__").html('<span class="fa fa-cloud-upload"></span> UPLOAD').attr("disabled",false);
    $("#server-response").html(res_data);
    },1000);
    })
    });
  })