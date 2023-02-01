$(document).ready(function () {
    const EditParentForm = $("#EditParentForm");
    EditParentForm.on("submit", function(event){
  event.preventDefault();
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
  //send request 
  $.post("../actions/update_actions",EditParentForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
      $("#server-response").html(data);
    },1500);
  })
});;

});