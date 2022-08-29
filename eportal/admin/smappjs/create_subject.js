$(document).ready(function(){
      //when delete btn is clicked
      const deleteBtn = $(".delete_btn");
      deleteBtn.on("click", function(){
        let delete_id = $(this).data("id");
        let delete_action = $(this).data("action");
        //send delete request
       var is_true = confirm("Do you really want to delete this Subject? You cannot undo this action!");
       if (is_true) {
         $.post("../actions/delete_actions",{action:delete_action,subjectId:delete_id},function(response){
          setTimeout(()=>{
            $("#delete_response").html(response);
          },1000);
        })
       }else{
        return false;
       }
      })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $(document).on("click",".update_btn", function(){
        let subjectId = $(this).data("id");
        //send show update form request
        let action ='show_subject_update_modal';
        $.post("../actions/update_actions",{action:action,subjectId:subjectId}, function(result){
          $("#show_subject_details_div").html(result);
          $("#UpdateSubjectModal").modal("show");
        });

      });
      //when update form is submitted
       $("#update_subject_form_modal").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const update_subject_form_modal = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/update_actions",update_subject_form_modal,function(data){
          setTimeout(()=>{
        $(".__loadingBtn2__").html('Save Changes').attr("disabled",false);
        $("#result-response2").html(data);
          },500);
        })
        // self.location.reload();
      });


      $("#createSubjectForm").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const createSubjectForm = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",createSubjectForm,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#result-response").html(data);
          },500);
        })

      });
     })