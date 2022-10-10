
      $(document).ready(function(){
         //when view payment history btn is clicked
        $(document).on("click",".vsbp_btn", function(){
          let st_id = $(this).attr("id");
          href2 ="student_bus_payment_history?student_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href2+st_id;
         },500);
        });
        //ends

        $("#routeDescName").on("change", function(){
          let routeId = $(this).val();
         // console.log(routeId)
          if (routeId.length > 0 || routeId!="") {
            let action ="fetch_route_details";
       let myurl = "../actions/actions";
       let myRouteData ={routeId:routeId,action:action};
       $.ajax({
        url:myurl,
        type:"POST",
        data:myRouteData,
        dataType:'JSON',
        success:function (result){
           if (result) {
          $("#busStopsCovered").val(result.bus_stops);
          //$("#routeChargePerTerm").val(result.route_price);
          $("#routeDriverName").val(result.driver_name);
          $("#routeVehicleCapacity").val(result.vehicle_desc);
        }else{
            $("#busStopsCovered").val('');
            //$("#routeChargePerTerm").val('');
            $("#routeDriverName").val('');
            $("#routeVehicleCapacity").val('');
        }
        }
       });
     }else{
        $("#busStopsCovered").val('');
        //$("#routeChargePerTerm").val('');
        $("#routeDriverName").val('');
        $("#routeVehicleCapacity").val('');
     }
        });

      })