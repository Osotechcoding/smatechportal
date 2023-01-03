$(document).ready(function(){
       $(".osotechDatatable").DataTable();

       //when edit btn is clicked
       const update_btn_allo = $(".update_btn_allo");
       update_btn_allo.on("click", function(){
      let allocate_id = $(this).data("id");
      let action = $(this).data("action");
      //send request
      $.post("../actions/update_actions",{action:action,allocate_id:allocate_id}, function(result){
        $("#show_allocated_details_div").html(result);
        $("#UpdateAllocFeeForm").modal("show");
      })
       })
      //when allocate form is submitted
     const allocation_form = $("#allocation_form");
        allocation_form.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request
      $.post("../actions/actions",allocation_form.serialize(),function(data){
        setTimeout(()=>{
      $(".__loadingBtn__").html('Submit').attr("disabled",false);
       $("#allocation_form")[0].reset();
       $("#response").html(data);
        },500);
      })
        });

          //when allocate form is submitted
     const update_allocated_form = $("#update_allocated_form");
        update_allocated_form.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request
      $.post("../actions/update_actions",update_allocated_form.serialize(),function(response){
        setTimeout(()=>{
      $(".__loadingBtn2__").html('Save Changes').attr("disabled",false);
       $("#myres").html(response);
        },500);
      })
        });
     })