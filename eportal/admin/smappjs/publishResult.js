$(document).ready(function(){
       const PUBLISHED_RESULT_FORM = $("#publishResultForm");
                PUBLISHED_RESULT_FORM.on("submit", function(event){
                event.preventDefault();
           if (confirm("Are you sure you want to execute this action?")) {
             $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
            //send request 
            $.post("../actions/actions",PUBLISHED_RESULT_FORM.serialize(),function(data){
                setTimeout(()=>{
                    $(".__loadingBtn__").html('<span class="fa fa-check-circle"></span> Publish Result Now').attr("disabled",false);
                    $("#server-response").html(data);
                },100);
            })
           }else return false;
        });
      })