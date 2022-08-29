
     $(document).ready(function(){
      //when add room btn is clicked
      $(document).on("click",".add_hostel_room_btn", function(){
        let hostel_id = $(this).data("id");
        let action = $(this).data("action");
        $("#hostelRoomModal").modal("show");
      });

      $("#NewHostelForm").on("submit", function(event){
        event.preventDefault();
        const NEW_HOSTEL_FORM = $(this);
         $(".__loadingBtn__hostel").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          //send request
          $.post("../actions/actions",NEW_HOSTEL_FORM.serialize(),function(result){
            setTimeout(()=>{
             $(".__loadingBtn__hostel").html('Submit').attr("disabled",false);
              $("#server-response").html(result);
            },500);
          })
      });
//hostel enable diable btn action
      const enable_btn = $(".hostel_enable_disable_btn");
      enable_btn.on("click", function(){
         let myEnableAction = $(this).data('action');
          let hostel_id = $(this).data('id');
          let action = "hostel_enable_disable_action";
        if (confirm(`Are you sure you wanto to ${myEnableAction.toUpperCase()} this Hostel?`)) {
          //send request
          $.post('../actions/update_actions',{action:action,myEnableAction:myEnableAction,hosId:hostel_id}, function(data){
            $("#server-response").html(data);
          });
        }else{
          return;
        }
      })
     })
  