$(document).ready(function () {
    const CreateParentForm = $("#CreateParentForm");
    CreateParentForm.on("submit", function(event){
  event.preventDefault();
  //alert("Submitted");
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
  //send request 
  $.post("../actions/actions",CreateParentForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Register').attr("disabled",false);
      $("#server-response").html(data);
    },2500);
  })
});;

});