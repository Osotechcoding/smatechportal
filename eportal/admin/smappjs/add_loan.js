
  $(document).ready(function(){
    //when the calculate btn is clicked
    const calculate_loan_btn = $(".calculate_laon_btn");
    calculate_loan_btn.on("click", function(){
      calculate_loan_btn.html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      setTimeout(()=>{
         calculate_loan_btn.html('<i class="fa fa-refresh"></i> Calculate').attr("disabled",false);
        osotechLoanCalculator();},2000);
    });

      const  LoanForm = $("#staff_loan_form");
     LoanForm.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send a request
      $.post("../actions/actions",LoanForm.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('<i class="fa fa-paper-plane"></i> Submit Loan').attr("disabled",false);
          $("#response-text").html(data);
        },1500);
      })

      });

//when edit loan btn is clicked
const update_loan_btn = $(".update_loan_btn");
update_loan_btn.on("click", function(){
  let myId = $(this).data("id");
  let action_now = $(this).data("action");
  // alert(myId);
  $.ajax({
    url:"../actions/update_actions",
    type:"POST",
    data:{action:action_now,myId:myId},
    dataType:"json",
    success:function(response){
      console.log(response);
      $("#myLoanId").val(response.loanId);
      $("#staff_name_").val(response.staffName);
      $("#amount_borrowed").val(response.totalPayment);
      $("#monthly").val(response.monthlyPayment);
      $("#user_due").val(response.due);
      $("#updateLoanStaffModal").modal("show");
    }
  });

})
//track payback amount
const monthly_returned = $("#monthly_returned");
monthly_returned .on("change", function(){
  let monthly_payment = $("#monthly").val();
  let paynow = $(this).val();
  if (paynow.length>0 || paynow!="") {
    //calculate
    let sumNow = parseFloat(monthly_payment -paynow);
    if (sumNow>0 || sumNow < 0) {
  $("#error-alert2").html('<?php echo $Alert->alert_msg("Please Enter your monthly payment correctly to proceed!")?>');
  $(".submit_update_loan_btn").attr("disabled",true);
    }else if (sumNow ===0 || sumNow==0) {
      $(".submit_update_loan_btn").attr("disabled",false);
      $("#monthly").val(sumNow);
      $("#error-alert2").html('');
    }
  }else
  return false;
})

  })
function osotechLoanCalculator(){
  const UIamount = $("#amount");
  const UIinterest = $("#interest");
  const UIyears = $("#years");
  const UImonthlyPayment = $("#monthly-payment");
  const UItotalPayment = $("#total-payment");
  const UItotalInterest = $("#total-interest");

   const principal = parseFloat(UIamount.val());
    const calculatedInterest = parseFloat(UIinterest.val())/100 / 12 ;
    const calculatedPayments = parseFloat(UIyears.val())*12;

     const x = Math.pow(1 + calculatedInterest,calculatedPayments);
    const monthly = (principal*x*calculatedInterest)/(x-1);

    if(principal < 0)
    {
      let msg_alert = `<span class="text-danger">Please Enter Positive Amount for Principal</span>`;
      $("#error-alert").html(msg_alert);
    }
    else if(calculatedInterest < 0)
    {
      msg_alert =`<span class="text-danger">Please Enter Positive Interest Rate</span>`;
      $("#error-alert").html(msg_alert);
    }
    else if(calculatedPayments  < 0)
    {
      msg_alert =`<span class="text-danger">Please Enter Positive Value</span>`;
      $("#error-alert").html(msg_alert);
    }
    else if(isFinite(monthly)){
        UImonthlyPayment.val(monthly.toFixed(2));
        UItotalPayment.val((monthly*calculatedPayments).toFixed(2));
        UItotalInterest.val(((monthly * calculatedPayments)-principal).toFixed(2));

    }else{
  msg_alert ='<span class="text-danger">Please check your number</span>';
      $("#error-alert").html(msg_alert);
    }
}