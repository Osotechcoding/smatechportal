  $(document).ready(function(){
      const view_btn_info = $(".view_payment_info_btn");
      view_btn_info.on("click", function(){
        view_btn_info.html("wait...").attr("disabled",true);
         let student_id = $(this).data("student");
      var href ="student_payment_info?std_regNo="+student_id;
      alert(student_id)
      setTimeout(()=>{
 view_btn_info.html("wait...").attr("disabled",false);
 window.location.assign(href);
    },500);
      })
     })