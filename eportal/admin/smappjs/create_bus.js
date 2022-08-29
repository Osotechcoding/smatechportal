function previewFile(input){
        var file = $("#vehicleImage").get(0).files[0];

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
    //when submit update driver btn is clciked
      const EditedSchoolModalForm = $("#editSchoolBusModalForm");
      EditedSchoolModalForm.on("submit", function(e){
        e.preventDefault();
         $(".__loadingBtn__bus_edit").html('<img src="../assets/loaders/rolling_loader.svg" width="30""> Processing...').attr("disabled",true);
       $.post("../actions/update_actions",EditedSchoolModalForm.serialize(),function(response){
          setTimeout(()=>{
        $(".__loadingBtn__bus_edit").html('Save Changes').attr("disabled",false);
        $("#server-response").html(response);
          },500);
        })
      })

    //when edit bus btn is clicked
    const EditBtnBus = $(".edit_btn");
      EditBtnBus.on("click", function (){
         let $this = $(this);
        let vname =$this.data("name"),vplate =$this.data("plate"),vcapacity =$this.data("capacity"),
        bcId = $this.data("id");
       // console.log(name+ " "+phone+' '+ email+' '+ address+' '+ licensedNo);
        $("#busName").val(vname);
        $("#busNumber").val(vplate);
        $("#busCapacity").val(vcapacity);
        $("#bushiddenId").val(bcId);
        $("#editSchoolBusModal").modal("show");
      })

    //when delete btn is clicked
    const deleteVehicleBtn = $(".delete_bu_btn");
    deleteVehicleBtn.on("click", function (){
      let action = $(this).data("action"), vehicleId = $(this).data("id");
      //send request
      if (confirm("Are you sure to delete this Vehicle?")) {
        $.post("../actions/delete_actions",{action:action,vehicleId:vehicleId}, function(res){
          $(".myLoadingBtn_"+vehicleId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">');
          setTimeout(()=>{
            $("#server-response").html(res);
          },500);
        })
      }else{
        return false;
      }
    })

    //when view btn is clicked
     $("#addNewBusModalForm").on("submit",function(event){
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
