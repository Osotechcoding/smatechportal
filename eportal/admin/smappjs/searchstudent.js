$(document).ready(function(){
      const go_back_home_btn = $(".go_back_home_btn");
      go_back_home_btn.on("click", function(){
        go_back_home_btn.html("wait...").attr("disabled",true);
      var href ="./ab_students";
      setTimeout(()=>{
 go_back_home_btn.html("wait...").attr("disabled",false);
 window.location.href=href;
},1000);
      })
     })