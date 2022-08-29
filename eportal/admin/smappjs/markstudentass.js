 $(document).ready(function(){
//when update btn is clicked
$(".award_mark_btn").on("click",function(){
  let assId = $(this).data("id");
  let stdRegNo = $(this).data("student");
  let subject = $(this).data("subject");
  let teacher = $(this).data("teacher");
  let student_Class = $(this).data("studentclass");
  //let show update modal now
  $("#assIdd").val(assId);
  $("#Tteacher").val(teacher);
  $("#student_Class").val(student_Class);
  $("#Ssubject").val(subject);
  $("#student-reg-No").val(stdRegNo);
  $("#awardmarkForm").modal("show");
});
    //when the form is submtted
  const awardAssMarkForm = $("#awardAssMarkForm");
  awardAssMarkForm.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/update_actions",awardAssMarkForm.serialize(),function(data){
    setTimeout(()=>{
      $("#server-response").html(data);
      $(".__loadingBtn__").html('Submit').attr("disabled",false);
    },1000);
   })
  })

  })