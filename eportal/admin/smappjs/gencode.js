 $(document).ready(function(){

        //
         const delete_oauthcode_btn = $(".delete_oauthcode_btn");
      delete_oauthcode_btn.on("click", function(){
        let codeId = $(this).data("id");
        let action = 'delete_oauth_code';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+codeId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Please wait...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,codeId:codeId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+codeId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })

        //
        const GENAUTHCODEFORM = $("#authcodegen_form");
        GENAUTHCODEFORM.on("submit", function (event) {
              event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request
      $.post("../actions/actions",GENAUTHCODEFORM.serialize(),function(response){
        setTimeout(()=>{
      $(".__loadingBtn__").html('Save Code').attr("disabled",false);
       $("#server-response").html(response);
        },500);
      })
        })
       })
    
	function generateSerial() {
    //ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz
    'use strict';
    
    var chars = '1234567890',
        
        serialLength = 5,
        
        randomSerial = "SMA",
        
        i,
        
        randomNumber;
    
    for (i = 0; i < serialLength; i = i + 1) {
        
        randomNumber = Math.floor(Math.random() * chars.length);
        
        randomSerial += chars.substring(randomNumber, randomNumber + 1);
        
    }
    
    document.getElementById('serial').innerHTML = randomSerial;
    document.getElementById('serialsave').value = randomSerial;
    
}