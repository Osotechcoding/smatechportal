$(document).ready(function(){
    //disable and enable slider btn action 
    $('.disable_slider_btn').on('click', function(){
    let slider_id = $(this).data('id');
    let action = $(this).data('action');
    $(".__enable_loadingBtn__"+slider_id).html('<img src="../assets/loaders/rolling_loader.svg" width="15">').attr("disabled",true);
    $.post("../actions/actions",{slider_id:slider_id,
    action:action},function(data){
    setTimeout(()=>{
      $(".__enable_loadingBtn__"+slider_id).html("Disable").attr("disabled",false);
    $("#server-response").html(data);
    },1000);
    })
    });
    //disable and enable module btn action 
    $('.enable_slider_btn').on('click', function(){
    let slider_id = $(this).data('id');
    let action = $(this).data('action');
    $(".__enable_loadingBtn__"+slider_id).html('<img src="../assets/loaders/rolling_loader.svg" width="15">').attr("disabled",true);
    $.post("../actions/actions",{slider_id:slider_id,
    action:action},function(data){
    setTimeout(()=>{
      $(".__enable_loadingBtn__"+slider_id).html("Enable").attr("disabled",false);
    $("#server-response").html(data);
    },1000);
    });
        });
      //when the delete gallery btn is clicked
      const delete_slider_btn = $(".delete_slider_btn");
      delete_slider_btn.on("click", function(){
        let Id = $(this).data("id");
        let action = 'delete_slider';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+Id).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Please wait...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,tId:Id},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+Id).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#addNewSliderModalForm").on("submit",function(event){
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
        //$("#addNewGalleryModalForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     });


function previewFile(input){
        var file = $("#sliderImage").get(0).files[0];
 
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