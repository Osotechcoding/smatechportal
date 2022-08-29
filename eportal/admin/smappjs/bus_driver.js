  function previewFile(input){
        var file = $("#driverImage").get(0).files[0];

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

  $(document).ready(function (){

    //when delete btn is clicked
    const deleteDriverBtn = $(".delete_driver_btn");
    deleteDriverBtn.on("click", function (){
      let action = $(this).data("action"), driverId = $(this).data("id");
      //send request
      if (confirm("Are you sure to delete this Driver?")) {
        $.post("../actions/delete_actions",{action:action,driverId:driverId}, function(res){
          $(".myLoadingBtn_"+driverId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">');
          setTimeout(()=>{
            $("#server-response").html(res);
          },500);
        })
      }else{
        return false;
      }
    });


    //when submit update driver btn is clciked
      const EditedDriverModalForm = $("#editDriverModalForm");
      EditedDriverModalForm.on("submit", function(e){
        e.preventDefault();
         $(".__loadingBtn__driver_edit").html('<img src="../assets/loaders/rolling_loader.svg" width="30""> Processing...').attr("disabled",true);
       $.post("../actions/update_actions",EditedDriverModalForm.serialize(),function(response){
          setTimeout(()=>{
        $(".__loadingBtn__driver_edit").html('Save Changes').attr("disabled",false);
        $("#server-response").html(response);
          },500);
        })
      })
    //when view btn is clicked

    const edit_driver_btn = $(".edit_driver_btn");
      edit_driver_btn.on("click", function (){
         let $this = $(this);
        let name =$this.data("name"),address =$this.data("address"),email =$this.data("email"),phone = $this.data("phone")
        driverId = $this.data("id"),licensedNo =$this.data("licensed");
       // console.log(name+ " "+phone+' '+ email+' '+ address+' '+ licensedNo);
        $("#dname").val(name);
        $("#demail").val(email);
        $("#daddress").val(address);
        $("#dphone").val(phone);
        $("#dhiddenId").val(driverId);
        $("#mydriver_license").val(licensedNo);
        $("#EditbusDriverModal").modal("show");
      })
    //when submit driver form is clicked
     $("#addNewDriverModalForm").on("submit",function(event){
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