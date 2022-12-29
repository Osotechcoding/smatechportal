$(document).ready(function(){
    let dateCompleted=$("#dateCompleted"),classCompleted=$("#classCompleted"),
    admittedClass = $("#admittedClass"),admittedDate=$("#admittedDate");

    $("#getTestyClass").on("change", function(){
    let TestyClass = $(this).val();
    let  admissionNumber = $('#admissionNumber').val();
    if(TestyClass !=""){
    //2021C263130001
    if(admissionNumber.trim() !="" && admissionNumber.trim().length > 0){
        //send request to get all the above info in db
        $.ajax({
            method:"POST",
            dataType:"JSON",
            url:"../actions/actions",
            data:{action:'fetch-graduated-student-details',
            admNo:admissionNumber,
            student_class:TestyClass
        },
            success:  function(response){
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
        alert("Enter the Student Admission Number to Continue");
        admittedClass.val('');
        dateCompleted.val('');
        classCompleted.val('');
        admittedDate.val('');
        TestyClass.val('');
        return false;
    }
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