 $(document).ready(function(){
        //STUDENT FORM SUBMISSION METHOD
        const NEWSTUDENTFORM = $("#create_new_student_form");
        NEWSTUDENTFORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
        $(".__loadingBtn4__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
        //send request 
        $.post("../actions/actions",NEWSTUDENTFORM.serialize(),function(res_data){
        setTimeout(()=>{
        $(".__loadingBtn4__").html('Submit').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(res_data);
        },1000);
        })
        });
      })