
$(document).ready(function () {
    const updatePaymentListForm = $("#updatePaymentListForm");
    updatePaymentListForm.on("submit", function(event){
  event.preventDefault();
  //alert("Submitted");
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
  //send request 
  $.post("../actions/update_actions",updatePaymentListForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Update Payment').attr("disabled",false);
      $("#server-response").html(data);
    },2500);
  })
});;

});