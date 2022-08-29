$(document).ready(function(){
        const student_update_form = $("#student_update_form");
        student_update_form.on("submit", function(event){
          event.preventDefault();
         // alert("Yes");
           $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
           $.post("../actions/update_actions",student_update_form.serialize(),function(data){
            setTimeout(()=>{
              $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
              $("#server-response").html(data);
            },500);
           });
        })
       })