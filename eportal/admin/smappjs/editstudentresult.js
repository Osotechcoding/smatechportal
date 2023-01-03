 $(document).ready(function(){
     const UPDATE_RESULT_FORM = $("#update_student_result_form");
     UPDATE_RESULT_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);

      $.post("../actions/update_actions",UPDATE_RESULT_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
     })
     })