
        $(document).ready(function(){
        
        //update_school_administrator_form
        const UPDATE_ADMINISTRATOR_FORM = $("#update_school_administrator_form");
        UPDATE_ADMINISTRATOR_FORM.on("submit", function(evt){
        evt.preventDefault();
        //myResponseText3
        $(".__loadingBtn13__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/update_actions",UPDATE_ADMINISTRATOR_FORM.serialize(),function(res_data){
        setTimeout(()=>{
        $(".__loadingBtn13__").html('Save Changes').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(res_data);
        },1000);
        })
        });
        //submit_school_profile_form
        const UPDATE_SCHOOL_PROFILE_FORM = $("#submit_school_profile_form");
        UPDATE_SCHOOL_PROFILE_FORM.on("submit", function(vt){
        vt.preventDefault();
        //myResponseText3
        $(".__loadingBtn33__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/update_actions",UPDATE_SCHOOL_PROFILE_FORM.serialize(),function(re_data){
        setTimeout(()=>{
        $(".__loadingBtn33__").html('Save Changes').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(re_data);
        },1000);
        })
        });

        //update_school_social_link_form

        const UPDATE_SOCIAL_LINK_FORM = $("#update_school_social_link_form");
        UPDATE_SOCIAL_LINK_FORM.on("submit", function(myevent){
        myevent.preventDefault();
        //myResponseText3
        $(".__loadingBtn35__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/update_actions",UPDATE_SOCIAL_LINK_FORM.serialize(),function(re_data){
        setTimeout(()=>{
        $(".__loadingBtn35__").html('Save Changes').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(re_data);
        },1000);
        })
        });

        //update_school_social_link_form
        $("#upload-school-logo-form").on("submit",function(event){
        event.preventDefault();
        $.ajax({
        url:"../actions/update_actions",
        type:"POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend(){
        $(".__loadingBtn10__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
        },
        success:function(data){
        setTimeout(()=>{
        $(".__loadingBtn10__").html('Upload').attr("disabled",false);
        $("#upload-school-logo-form")[0].reset();
        $("#server-response").html(data);
        //alert(data);
        },800);
        }

        });
        })

        })
       
        function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
        var reader = new FileReader();

        reader.onload = function(){
        $("#previewImg").attr("src", reader.result);
        // $("#imagename").html(file.name);
        $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
        }

        reader.readAsDataURL(file);
        }
        }