$(document).ready(function() {
	 const delete_feedback_btn = $(".delete_feedback_btn");
      delete_feedback_btn.on("click", function(){
        let Id = $(this).data("id");
        let action = 'delete_feedback';
         let is_true = confirm("Are you Sure you want to delete this Feedback?");
      if (is_true) {
        $(".__loadingBtn2__"+Id).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Please wait...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,fbId:Id},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+Id).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
})