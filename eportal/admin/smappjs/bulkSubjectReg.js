$(document).ready(function(){
      // $("#checkAll").on("click", function(){
      //   if ($(this).is(":checked")) {
      //     $(".checkItem").prop('checked', true);
      //   }else{
      //     $(".checkItem").prop('checked', false);
      //   }
      // });

const BULK_SUBJECT_FORM = $("#bulk_subject_form");
     BULK_SUBJECT_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);

      $.post("../actions/actions",BULK_SUBJECT_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
     })

     });