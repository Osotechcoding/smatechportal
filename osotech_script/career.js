  $(document).ready(function() {
  $('#startCareerForm').on ("submit", function(e){
    e.preventDefault();
    //send request
    $.ajax({
    url:"Includes/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="./rolling_loader.svg" width="30"> Submitting...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit Application').attr("disabled",false);
        $("#server-response").html(data);
      },1500);
    }

  });
  })
    })