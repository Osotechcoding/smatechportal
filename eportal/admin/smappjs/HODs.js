 $(document).ready(function(){
      const ASSIGN_OFFICE_FORM = $("#assign_office_Form");
      ASSIGN_OFFICE_FORM.on("submit", function(ev){
      ev.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         $.post("../actions/actions",ASSIGN_OFFICE_FORM.serialize(), function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
             $(".__loadingBtn2__").html('<span class="fa fa-paper-plane"></span>Assign Now').attr("disabled",false);
          },1000);
         })
      
      });
      //when an edit btn is clicked
      const update_my_post = $(".update_my_post");
      update_my_post.on("click", function(){
        let office_id = $(this).data('id');
        let action = $(this).data("action");
        $.post("../actions/update_actions",{action:action,office_id:office_id},function(result){
          $("#shodw_office_details_modal").html(result);
           $("#updateStaffOfficeModal").modal("show");
        });
       
      });

      //whenupdate form is submitted
       const UPDATE_OFFICE_FORM = $("#submit_update_staff_office_form");
      UPDATE_OFFICE_FORM.on("submit", function(ev){
      ev.preventDefault();
      $(".__loadingBtn5__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         $.post("../actions/update_actions",UPDATE_OFFICE_FORM.serialize(), function(data){
          setTimeout(()=>{
            $("#server-response").html(data);
             $(".__loadingBtn5__").html('<span class="fa fa-paper-plane"></span>Save Change').attr("disabled",false);
          },1000);
         })
      
      });
      
    })