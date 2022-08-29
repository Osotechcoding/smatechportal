  $(document).ready(function(){
    const RESULTFORM =$("#SingleStudentResult_form");
    RESULTFORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30""> Processing...').attr("disabled",true);
       $.post("../actions/actions",RESULTFORM.serialize(),function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Check Now').attr("disabled",false);
        $("#server-response").html(data);
          },500);
        })
    })
  })