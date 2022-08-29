$(document).ready(function(){
            //disable and enable module btn action 
            $(document).on('click','.disable_module', function(){
            let module_id = $(this).data('id');
            let action = $(this).data('action');
            $.post("../actions/actions",{module_id:module_id,
            action:action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })
            });
            //disable and enable module btn action 
            $(document).on('click','.enable_module', function(){
            let module_id = $(this).data('id');
            let action = $(this).data('action');
            //alert(action);
            //do ajax call 
            $.post("../actions/actions",{module_id:module_id,
            action:action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })

                });
            //enable and disable all login
            //diable all module 
            $(".all-disable").on('click', function(){

            let module_name = $(this).data('module');
            let module_action = $(this).data('action');

            $.post("../actions/actions",{module_name:module_name,
            action:module_action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            })
            });
            //Enable all Modules

            //diable all module 
            $(".all-enable").on('click', function(){

            let module_name = $(this).data('module');
            let module_action = $(this).data('action');

            $.post("../actions/actions",{module_name:module_name,
            action:module_action},function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            },1000);
            });
            })

            })