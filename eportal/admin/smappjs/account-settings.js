  $(document).ready(function(){
    const UPDATEPWDFORM = $("#password-update-form");
    UPDATEPWDFORM.on("submit", function(event){
      event.preventDefault();
      //alert("Submitted");
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",UPDATEPWDFORM.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
          $("#server-response").html(data);
        },500);
      })
    });

    //end
    //when resend confirmation btn is clicked
    const resendCodeBtn = $(".resend-btn");
    resendCodeBtn.on("click", function(){
        $(".resend-btn").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...');
        //evt.preventDefault();
        //alert("yes confirmation code was sent successfully");
        const staffName = $(this).data('name');
        const staffEmail = $(this).data('email');
        const staffCode = $(this).data('code');
        const staffId = $(this).data('id');
        const action = $(this).data('action');
       // alert(staffName+ " "+staffEmail+ " "+staffCode+" "+staffId+" "+action);
        const myData = {
            action:action,
            staffName:staffName,
            staffEmail:staffEmail,
            staffCode:staffCode,
            staffId:staffId
        }
        //send to ../actions/actions
        $.post("../actions/actions",myData,function(result){
            setTimeout(()=>{
                 $(".resend-btn").html('Resend Confirmation');
            $("#resendResponse").html(result);
            },500);
        })
    })

    //update bank info form submission actions
    const UPDATE_BANK_FROM = $("#staff-update-bank-info");
    UPDATE_BANK_FROM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",UPDATE_BANK_FROM.serialize(),function(res_data){
        setTimeout(()=>{
          $(".__loadingBtn3__").html('Save Changes').attr("disabled",false);
          $("#myResponseText3").html(res_data);
        },500);
      })
    })

    //upload photo start
    const UPLOADPHOTOFORM = $("#upload_avatar_photo_form");
    UPLOADPHOTOFORM.on("click", function(e){
      e.preventDefault();
     
    })

//update profile info
const MY_PROFILE_UPDATE_FORM = $("#admin_profile_update_form");
    MY_PROFILE_UPDATE_FORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn38__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request 
      $.post("../actions/update_actions",MY_PROFILE_UPDATE_FORM.serialize(),function(re_data){
        setTimeout(()=>{
          $(".__loadingBtn38__").html('Save Changes').attr("disabled",false);
          $("#server-response").html(re_data);
        },500);
      })
    })
//when add message user submit btn is clicked
$("#internalMessagingForm").on("submit", function(e){
  e.preventDefault();
  alert("Yes Form submitted")
});
  })