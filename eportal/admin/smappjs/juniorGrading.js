 $(document).ready(function(){
//when a link btn is click
const pry_grading_btn = $(".pry_grading_btn");

const junior_grading_btn = $(".junior_grading_btn");
const senior_grading_btn = $(".senior_grading_btn");
//primary school grading link action
pry_grading_btn.on("click", ()=>{
  pry_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./pryGrading");
  },500);
});

//Junior school grading link action
junior_grading_btn.on("click",()=>{
  junior_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./juniorGrading");
  },500);
});
//Junior school grading link action
senior_grading_btn.on("click", ()=>{
  senior_grading_btn.html("Please wait...");
  setTimeout(()=>{
window.location.assign("./rgrading");
  },500);
});

//when update btn is clicked

$(".update_grade_btn").on("click",function(){
  let grade_id = $(this).data("id"),score_from = $(this).data("score"), score_to =$ (this).data("mark"),grade =$(this).data("grade"), remark = $(this).data("remark");
  //let show update modal now
  $("#grading_id").val(grade_id);
  $("#score_from").val(score_from);
  $("#score_to").val(score_to);
  $("#mark_grade").val(grade);
  $("#remark").val(remark);
  $("#GradingUpdateForm").modal("show");
});
    //when the form is submtted
  const update_grading_form = $("#update_grading_form");
  update_grading_form.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/update_actions",update_grading_form.serialize(),function(data){
    setTimeout(()=>{
      $("#server-result").html(data);
      $(".__loadingBtn__").html('Update Grading').attr("disabled",false);
    },2000);
   })
  })

  })