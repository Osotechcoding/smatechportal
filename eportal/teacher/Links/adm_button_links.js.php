<script>
     $(document).ready(function(){
      //when student adm btn is clicked starts
      $(document).on("click",".adm_btn_student",()=>{
         $(".adm_btn_student").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Please wait...');
        setTimeout(function(){
          window.location.assign("student_adm_portal");
        },1000);
      });
       //when student adm btn is clicked ends
        //when parent adm btn is clicked starts
      $(document).on("click",".adm_btn_parent",()=>{
         $(".adm_btn_parent").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Please wait...');
        setTimeout(function(){
          window.location.assign("parent_adm_portal");
        },1000);
      });
       //when parent adm btn is clicked ends

       //when staff adm btn is clicked starts
      $(document).on("click",".adm_btn_staff",()=>{
         $(".adm_btn_staff").html('<img src="assets/loaders/rolling_loader.svg" width="30">Please wait...');
        setTimeout(function(){
          window.location.assign("staff_adm_portal");
        },1000);
      });
       //when staff adm btn is clicked ends

       //when call for adm btn is clicked starts
      $(document).on("click",".adm_btn_call",()=>{
         $(".adm_btn_call").html('<img src="assets/loaders/rolling_loader.svg" width="30">Please wait...');
        setTimeout(function(){

          window.location.assign("callAdmission");
        },1000);
      });
       //when call for adm btn is clicked ends
     })
   </script>