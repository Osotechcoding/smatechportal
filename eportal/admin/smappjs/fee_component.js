$(document).ready(function(){
     $(".osotechDatatable").DataTable();
     //when edit btn is clicked
     const edit_btn_compo = $(".edit_btn_compo");
     edit_btn_compo.on("click", function(){
      let compoId = $(this).data("id");
      let action = $(this).data("action");
      //send request
      $.ajax({
        url:"../actions/update_actions",
        type:"POST",
        data:{action:action,compoId:compoId},
        success:function(res){
          setTimeout(()=>{
        $("#show_component_details_div").html(res);
        $("#Update_Component_Fee_Modal_Form").modal("show");
        },500);
        }
      });
     })
     //when create component form is submitted
     const Component_Form_Fee = $("#Component_Form_Fee");
        Component_Form_Fee.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request
      $.post("../actions/actions",Component_Form_Fee.serialize(),function(data){
        setTimeout(()=>{
      $(".__loadingBtn__").html('Submit').attr("disabled",false);
       $("#Component_Form_Fee")[0].reset();
       $("#response").html(data);
        },1500);
      })
        });
 //when Update component form is submitted
        //Update_Component_Form_Fee
         const Update_Component_Form_Fee = $("#Update_Component_Form_Fee");
        Update_Component_Form_Fee.on("submit", function(event){
          event.preventDefault();
      $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
      //send request
      $.post("../actions/update_actions",Update_Component_Form_Fee.serialize(),function(data){
        setTimeout(()=>{
      $(".__loadingBtn2__").html('Submit').attr("disabled",false);
       $("#response2").html(data);
        },1500);
      })
        });
        //when a delete btn is clicked
      const  $delete_btn = $(".delete_btn");
      $delete_btn.on("click", function(){
         let Id = $(this).data("compo");
        let action = "delete_compo";
        //send request
       const is_true = confirm("Are you sure you want to execute this command? You CANNOT Undo this action!");
       if (is_true) {
         $.post("actions/delete_actions",{action:action,Id:Id},function(r){
         setTimeout(()=>{
           $("#osotech_res").html(r);
         // alert(r);
         },500);
        })
       }else{
        return false;
       }
      })
     })