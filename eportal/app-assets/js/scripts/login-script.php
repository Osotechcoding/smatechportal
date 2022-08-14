 <script>
    $(document).ready(function(){
    $("#login-Form").on("submit", function(event){
    event.preventDefault();
    alert("<?php echo $lang['login_error1'];?>");
            });
        })
    </script>