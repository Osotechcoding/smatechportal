$(document).ready(function(){
    let dateCompleted=$("#dateCompleted"),classCompleted=$("#classCompleted"),
    admittedClass=$("#admittedClass"),admittedDate=$("#admittedDate");
    $('#admissionNumber').on("change", function(){
let regNo = $(this).val();
if(regNo.length > 0 || regNo !=""){
    //send request to get all the above info in db
    $.ajax({
        method:"POST",
        dataType:"JSON",
        url:"../actions/actions",
        data:{action:'fetch-graduated-student-details',admNo:regNo},
        success:  function(response){
            console.log(response);
            setTimeout(() => {
                if(response){
                    admittedClass.val(response.admitted_class);
                    dateCompleted.val(response.completed_date);
                    classCompleted.val(response.studentClass);
                    admittedDate.val(response.stdApplyDate);
                }
            }, 300);
        },
       
      }); 
}else{
    admittedClass.val('');
    dateCompleted.val('');
    classCompleted.val('');
    admittedDate.val('');
}
    });

    //when generate testimonial btn is clicked
    $("#StudentTestimonialForm").on("submit", function(e){
        e.preventDefault();
        const GENERATE_TESTIMONIAL = $(this).serialize();
        $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          //send request
          $.post("../actions/actions",GENERATE_TESTIMONIAL,function(result){
            setTimeout(()=>{
             $(".__loadingBtn__").html('GENERATE TESTIMONIAL').attr("disabled",false);
              $("#server-response").html(result);
            },1500);
          })
    });
});