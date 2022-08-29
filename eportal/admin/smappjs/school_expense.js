$(document).ready(function(){
    //when a del btn is clicked
    const delete_btn = $(".delete_btn");
    delete_btn.on("click",runMi);

    //when create expense form is submitted
  const createNew_expense_form = $("#createNew_expense_form");
  createNew_expense_form.on("submit",(event)=>{
  event.preventDefault();
   $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
   //send request
   $.post("../actions/actions",createNew_expense_form.serialize(),function(data){
    setTimeout(()=>{
      $("#server-result").html(data);
      $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
    },2000);
   })
  })


     })
     function runMi(){
      let is_true = confirm("Are you sure you want to delete this permanently!");
      if (is_true) {
alert("Yes Expense has been deleted");
window.location.reload();
      }else{
        return false;
      }
     }