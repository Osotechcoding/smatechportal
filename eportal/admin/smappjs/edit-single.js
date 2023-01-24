
$(document).ready(function(){
    //STUDENT FORM SUBMISSION METHOD
    const EditSingleResultForm = $("#EditSingleResultForm");
    EditSingleResultForm.on("submit", function(e){
    e.preventDefault();
    $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
    //send request 
    $.post("../actions/update_actions",EditSingleResultForm.serialize(),function(res_data){
    setTimeout(()=>{
    $(".__loadingBtn__").html('<span class="fa fa-cloud-upload"></span>SAVE CHANGES').attr("disabled",false);
    $("#server-response").html(res_data);
    },1000);
    })
    });
  })