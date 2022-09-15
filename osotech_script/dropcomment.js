
const blogCommentForm = $("#blogCommentForm");
blogCommentForm.on("submit", function(e){
	e.preventDefault();
	$(".__loadingBtn__").html('Pls wait...').attr("disabled",true);
	$.post("Includes/actions",blogCommentForm.serialize(), function(result) {
		setTimeout(()=>{
		$(".__loadingBtn__").html('Submit Comment').attr("disabled",false);;
		$("#server-response").html(result);
		},1500);
	})
})