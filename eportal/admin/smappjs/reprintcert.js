$(document).ready(function () {
    const rePrintCertificateForm = $("#rePrintCertificateForm");
    rePrintCertificateForm.on("submit", function(event){
  event.preventDefault();
  //alert("Submitted");
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
  //send request 
  $.post("../actions/actions",rePrintCertificateForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Re-Print Certificate').attr("disabled",false);
      $("#server-response").html(data);
    },2500);
  })
});;

});