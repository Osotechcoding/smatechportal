$(document).ready(()=>{
    //when a del btn is clicked
    const delete_btn = $(".delete_btn");
    delete_btn.on("click",runMi);

    //when create expense form is submitted
  const createNew_expense_form = $("#createNew_expense_form");
  createNew_expense_form.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/actions",createNew_expense_form.serialize(),(data)=>{
    console.log(data);
    setTimeout(()=>{
      $("#server-response").html(data);
      $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
    },1000);
   })
  })


     })
     function runMi(){
        isTrue = confirm("Are you sure, You want to delete this record Permananetly?");
    if(isTrue){
let action = $(this).data("action");
let actionId = $(this).data("id");
$(".loadingBtn___"+actionId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
//send delete request
$.post("../actions/delete_actions",{action:action,expId:actionId},(res)=>{
setTimeout(() => {
  $("#server-response").html(res);
}, 500);
})
    }else{
      return;
    }
     }