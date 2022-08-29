 $(document).ready(function(){
      $("#checkAll").on("click", function(){
        if ($(this).is(":checked")) {
          $(".checkItem").prop('checked', true);
        }else{
          $(".checkItem").prop('checked', false);
        }
      });

const STD_PROMOTION_FORM = $("#student_promotion_form");
     STD_PROMOTION_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);

      $.post("../actions/update_actions",STD_PROMOTION_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
     })

     });