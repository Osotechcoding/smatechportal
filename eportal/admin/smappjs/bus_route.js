 $(document).ready(function(){
    const NEW_ROUTE_FORM = $("#newRouteForm");
    NEW_ROUTE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30""> Processing...').attr("disabled",true);
       $.post("../actions/actions",NEW_ROUTE_FORM.serialize(),function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Create').attr("disabled",false);
        $("#server-response").html(data);
          },500);
        })
    })
  })