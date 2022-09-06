  $(document).ready(function() {
  const feedBAckMesageForm = $('#feedBAckMesageForm');
  feedBAckMesageForm.on ("submit", function(e){
    e.preventDefault();
    //send request
    $(".__loadingBtn__").html('<img src="./rolling_loader.svg" width="30"> Sending...');
    $.post("Includes/actions",feedBAckMesageForm.serialize(),function($data){
        setTimeout(()=>{
        	$(".__loadingBtn__").html('Send Message');
           $("#server-response").html($data)
        },1500)
    })
  })
    })