 $(document).ready(function(){
        //STAFF FORM SUBMISSION METHOD
        const NEWSTAFFFORM = $("#create_new_staff_form");
        NEWSTAFFFORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
        $(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/actions",NEWSTAFFFORM.serialize(),function(res_data){
        setTimeout(()=>{
        $(".__loadingBtn3__").html('Register Now').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(res_data);
        },1000);
        })
        })
      })