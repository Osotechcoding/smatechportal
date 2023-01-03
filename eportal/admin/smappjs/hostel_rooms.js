 $(document).ready(function(){
      //when add room btn is clicked
      $(document).on("click",".add_hostel_room_btn", function(){

        let hostel_id = $(this).data("id");
        let action = $(this).data("action");
        $("#hostelRoomModal").modal("show");
      });

      //when rooms form is submitted
      $("#NewHostelRoomsForm").on("submit", function(e){
        e.preventDefault();
        event.preventDefault();
        const NEW_HOSTEL_ROOM_FORM = $(this);
         $(".__loadingBtn__rooms").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
          //send request
          $.post("../actions/actions",NEW_HOSTEL_ROOM_FORM.serialize(),function(data){
            setTimeout(()=>{
             $(".__loadingBtn__rooms").html('Submit').attr("disabled",false);
              $("#server-response").html(data);
            },500);
          })
      });
     })