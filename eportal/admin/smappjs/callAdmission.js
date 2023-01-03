
       $(document).ready(function ()
       {
        //when a Read Note btn is clicked
         const view_btn = $(".view_note_btn");
  view_btn.on("click", function(){
     let admdetails = $(this).data("info");
      $("#view_aNote").html(admdetails);
    $("#admissionDetailsModal").modal("show");
  })


     const NEWADMISSION_FORM = $('#declareAdmissionForm');
     NEWADMISSION_FORM.on("submit", function (event) 
     {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
        const NEWADMISSION_FORM = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",NEWADMISSION_FORM,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit').attr("disabled",false);
        $("#server-response").html(data);
          },500);
        })
     })
     //portal close action 
     const close_portal = $(".declear_open_close_btn");
     close_portal.on("click", function (){
      let is_true = confirm("Are you sure?");
      if (is_true) {
        //send a request to server
        let portal_action = $(this).data('action');
        let mid = $(this).data('id');
        let action = "update_portal";
        $.post("../actions/update_actions",{action:action,id:mid,portal_action:portal_action}, function(data_res){
          setTimeout(()=>{
            $("#server-response").html(data_res);
          },500);
        })
      }
     })
//when delete bt is clicked
const delete_btn = $(".delete_adm_portal_btn");
delete_btn.on("click", function(){
  confirmDelete = f=confirm("Are you sure you want ot delete this Announcement?");
  if (confirmDelete) {
    let action ='delete_call_for_admission';
    let admId = $(this).data('id');
    //send request 
    $.post("../actions/delete_actions",{action:action,admid:admId}, function(res){
      setTimeout(()=>{
        $("#server-response").html(res);
      },200);
    })
  }
})
       })
     