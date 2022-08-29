$(document).ready(function(){
      const ADD_STUDENT_OFFICE_FORM =$("#student_office_form");
      ADD_STUDENT_OFFICE_FORM.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/actions",ADD_STUDENT_OFFICE_FORM.serialize(),function(res){
        setTimeout(()=>{
          $(".__loadingBtn2__").html('Submit').attr("disabled",false);
          $("#server-response").html(res);
        },500);
      })
      });

      //when remove from office btn is clicked
      const remove_office_btn = $(".remove_student_from_office_btn");
      remove_office_btn.on("click", function(){
        let prefect_id = $(this).data("id");
        let action = $(this).data("action");
        let is_true = confirm("Are sure you want to Remove this Student from office?");
        if (is_true) {
          // send request
          $.post("../actions/delete_actions",{
            action:action,prefect_id:prefect_id},function(data){
            setTimeout(()=>{
              console.log(data);
              $("#server-response").html(data);
            },200);
          })
        }else{
          return false;
        } 
        
      });

      //update prefect
      //when remove from office btn is clicked
      const update_prefect_btn = $(".show_update_form_btn");
      update_prefect_btn.on("click", function(){
        let prefect = $(this).data("prefect");
        let action = $(this).data("action");
      $.post("../actions/update_actions",{
            action:action,prefect_id:prefect},function(result){
            setTimeout(()=>{
              $("#prefect_details_form").html(result);
              $("#updateStudentOfficeModal").modal("show");
            },200);
          })
      });

      //_update_student_offi_
       const _update_student_offi_ = $("#_update_student_offi_");
      _update_student_offi_.on("submit", function(e){
      e.preventDefault();
       $(".__loadingBtn5__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../actions/update_actions",_update_student_offi_.serialize(),function(res){
            setTimeout(()=>{
               $(".__loadingBtn5__").html('Save Changes').attr("disabled",false);
              $("#server-response").html(res);
            },1500);
          })
      });
    })