 $(document).ready(function(){
    //when unregister btn is clicked
    const remove_sub_btn = $(".remove_sub_btn");
    remove_sub_btn.on("click", function(){
      let theId = $(this).data("id");
      let subject = $(this).data("value");
      let action = 'unregistered_exam_subject_now';
      var is_true = confirm("Are you Sure you really want to unregister this Subject?");
      if (is_true) {
        $(".__loadingBtn2__"+theId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request
        $.post("../actions/actions",{action:action,theId:theId,subId:subject},function(data){
          setTimeout(()=>{
            $(".__loadingBtn2__"+theId).html("<i class='far fa-trash-alt'></i> Unregister").attr("disabled",false);
            $("#server-response").html(data);
          },1000);
        });
      }else{
        return false;
      }
    })

      $(".osotechDatatable").DataTable();
      //when an update btn is clicked
      $("#subject_register_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__2").html('<img src="../assets/loaders/rolling_loader.svg" width="30">').attr("disabled",true);
        const subject_register_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",subject_register_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__2").html('Register').attr("disabled",false);
        $("#result-responseText").html(data);
          },1000);
        })

      });
     })