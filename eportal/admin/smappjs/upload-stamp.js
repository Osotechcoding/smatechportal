$(document).ready(function(){

   //update_school_social_link_form
        $("#uploadSchoolStampForm").on("submit",function(evt){
          evt.preventDefault();
        $.ajax({
        url:"../actions/update_actions",
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
        $(".__loadingBtn__").html('Upload').attr("disabled",false);
          //$("#uploadSchoolStampForm")[0].reset();
         // console.log(data);
        $("#server-response").html(data);
        },1000);
        }
        });
        })
        });

        function previewFileStamp(input){
        const mfile = $("input[type=file]").get(0).files[0];
        if(mfile){
        const reader = new FileReader();
        reader.onload = function(){
        $("#previewStamp").attr("src", reader.result);
        // $("#imagename").html(file.name);
        $("#StampSize").html((mfile.size/1024).toFixed(2) +"KB");
        }
        reader.readAsDataURL(mfile);
        }
        }

      function previewFileSignature(input){
        const file = $("#sign").get(0).files[0];
        if(file){
        const reader = new FileReader();
        reader.onload = function(){
        $("#previewSignature").attr("src", reader.result);
        $("#SignatureSize").html((file.size/1024).toFixed(2) +"KB");
        }

        reader.readAsDataURL(file);
        }
        }