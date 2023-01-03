 $(document).ready(function(){
     //when del btn is active
      $(document).on("click",".del_pinBtn_", function(){
        let id = $(this).data("id");
        let table_name = $(this).data("table");
        let action = $(this).data("action");
        if (confirm("Are you sure, You want to delete this pin?")) {
          $.post("../actions/actions",{action:action,pinId:id,table_name:table_name},function(data){
             // console.log(data);
            setTimeout(()=>{
              $("#server-response").html(data);
            },500);
          });
        }else{
          return false;
        }
      });
      //ends
       $(".view_reg_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./regPin";
      },1000);
    })
    //exam pins
     $(".view_ex_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./examPin";
      },1000);
    })

      //Result pins
     $(".view_res_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./resPin";
      },1000);
    })
        //Wallet pins
     $(".view_wallet_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./walletPin";
      },1000);
    })
     })