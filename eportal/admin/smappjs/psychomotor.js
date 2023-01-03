 $(document).ready(function(){
        const PSYCHOMOTOR_DOMAIN_FORM = $("#submit_psychomotorDomain_form");
        PSYCHOMOTOR_DOMAIN_FORM.on("submit", function(event){
          event.preventDefault();
          $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
     //send to server
     $.post("../actions/actions",PSYCHOMOTOR_DOMAIN_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('UPLOAD NOW').attr("disabled",false);
         console.log(data);
         $("#server-response").html(data);
      },2000);
     })
        });

       });