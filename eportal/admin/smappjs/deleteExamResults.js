 $(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_exam_btn = $(".delete_exam_btn");
      delete_exam_btn.on("click", function(){
        let Id = $(this).data("id");
        let action = $(this).data("action");
        let myTerm = $(this).data("term");
         let is_true = confirm("Are you Sure you want to Remove this Result, this action cannot be undo?");
      if (is_true) {
        $(".__loadingBtn__"+Id).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,rId:Id,term:myTerm},function(response){
          setTimeout(()=>{
            $(".__loadingBtn__"+Id).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
     })