$(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_exam = $(".delete_exam_btn");
      delete_exam.on("click", function(){
        let examid = $(this).data("id");
        let action = 'delete_exam';
         let is_true = confirm("Are you Sure you want to Remove this Question?");
      if (is_true) {
        $(".__loadingBtn2__"+examid).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
        //send request
        $.post("../actions/delete_actions",{action:action,examid:examid},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+examid).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#examQuestionModalForm").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit').attr("disabled",false);

        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     })