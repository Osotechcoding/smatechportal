$(document).ready(function () {
    const generateIdCardForm = $("#generateIdCardForm");
    generateIdCardForm.on("submit", function(event){
  event.preventDefault();
  //alert("Submitted");
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
  //send request 
  $.post("../actions/actions",generateIdCardForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Generate ID Card').attr("disabled",false);
      $("#server-response").html(data);
    },2500);
  })
});;

});