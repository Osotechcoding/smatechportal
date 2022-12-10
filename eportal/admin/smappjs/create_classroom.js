
     $(document).ready(function(){
      //when delete btn is clicked
      const deleteBtn = $(".delete_btn");
      deleteBtn.on("click", function(){
        let delete_id = $(this).data("id");
        let delete_action = $(this).data("action");
        //send delete request
       var is_true = confirm("Do you really want to delete this Classroom?, You cannot undo this action!");
       if (is_true) {
         $.post("../actions/delete_actions",{action:delete_action,grade:delete_id},function(response){
          setTimeout(()=>{
            $("#server-response").html(response);
          },1000);
        })
       }else{
        return false;
       }
      });

      //synchronize teacher action
      const synchronizeTeacher = $(".sync_btn");
      synchronizeTeacher.on("click", function(){
        $("#synchronizeStaffModalForm").modal('show');
      })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $(document).on("click",".update_btn", function(){
        let grade_id = $(this).data("id");
        //send show update form request
        let action ='show_classroom_update_modal';
        $.post("../actions/update_actions",{action:action,grade_id:grade_id}, function(result){
          $("#show_classroom_details_div").html(result);
          $("#classUpdateModal").modal("show");
        });

      });
      //when update form is submitted
       $("#update_classroom_form_modal").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const update_classroom_form_modal = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/update_actions",update_classroom_form_modal,function(data){
          setTimeout(()=>{
        $(".__loadingBtn2__").html('Save Changes').attr("disabled",false);
        $("#server-response").html(data);
          },500);
        })
        // self.location.reload();
      });


      $("#add_ClassModal_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const add_ClassModal_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",add_ClassModal_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#server-response").html(data);
          },2000);
        })
        // self.location.reload();
      });
     })