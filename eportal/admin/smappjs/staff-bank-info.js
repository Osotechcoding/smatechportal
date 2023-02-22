$(document).ready(function(){

       $("#addStaffBankDetailsForm").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
        const addStaffBankDetailsForms = $(this).serialize();
        $.post("../actions/actions",addStaffBankDetailsForms,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        // console.log(data);
        $("#server-response").html(data);
          },1500);
        });

      });
});