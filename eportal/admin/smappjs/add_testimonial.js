$(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_testi = $(".delete_testi_btn");
      delete_testi.on("click", function(){
        let tId = $(this).data("id");
        let action = 'delete_testi';
         let is_true = confirm("Are you Sure you want to Remove this Testimonial?");
      if (is_true) {
        $(".__loadingBtn2__"+tId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,testiId:tId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+tId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#addNewTestimonialModalForm").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit').attr("disabled",false);
        //$("#addNewGalleryModalForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     })

    function previewFile(input){
        var file = $("#tImage").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                //$("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
