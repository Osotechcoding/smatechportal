$(document).ready(function(){
       //when new session modal is submitted
       const submit_New_Session_Form = $("#submit_New_Session_Form");
       submit_New_Session_Form.on("submit", function(evt){
        evt.preventDefault();
        var is_true = confirm ("Are you sure, You want to Navigate to New Academic Session "+ $("#new_session_dec").val()+ " You cannot undo this action!");
        if (is_true) {
          //alert("New Session Set Successfully");
          //send request
          $.post("../actions/actions",submit_New_Session_Form.serialize(),function(data){
            setTimeout(()=>{
              $("#server_result").html(data);
            },1000);
          })
        }else{
          return false;
        }
       });
    //update_academic_session_form
     //when update  session form is submitted
       const update_academic_session_form = $("#update_academic_session_form");
       update_academic_session_form.on("submit", function(event){
        event.preventDefault();
        var is_true_ = confirm ("Are you sure, You want to Update the Session Details? You cannot undo this action!");
        if (is_true_) {
           $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
          //send request
          $.post("../actions/update_actions",update_academic_session_form.serialize(),function(result){
            setTimeout(()=>{
             $(".__loadingBtn__").html('Update Session').attr("disabled",false);
              $("#server_result3").html(result);
            },1500);
          })
        }else{
          return false;
        }
       });

//simulation_Form
//when simulation form is submitted
const simulation_Form = $("#simulation_Form");
       simulation_Form.on("submit", function(evt){
        evt.preventDefault();
        var is_true = confirm ("Are you sure, You want to Navigate to "+ $("#navigate_to").val() + " Academic Session?");
        if (is_true) {
          //alert("New Session Set Successfully");
          //send request
          $.post("../actions/update_actions",simulation_Form.serialize(),function(data){
            setTimeout(()=>{
              $("#server_result2").html(data);
            },1000);
          })
        }else{
          return false;
        }
       });

      });