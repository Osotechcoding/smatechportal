$(document).ready(function(){
    $(".view_reg_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./regPin";
      },500);
    })
   
      //Result pins 
     $(".view_res_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./resPin";
      },500);
    })
    $("#osotechPinGenForm").on("submit", function(event){
      event.preventDefault();
       $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      const osotechPinGenForm = $(this).serialize();
      $.post("../actions/actions",osotechPinGenForm,function(d){
       // console.log(d);
        setTimeout(()=>{
           $(".__loadingBtn__").html('Generate').attr("disabled",false);
          $("#server-response").html(d);
          $("#osotechPinGenForm")[0].reset();
        },1500)
      })
   
    })
  })