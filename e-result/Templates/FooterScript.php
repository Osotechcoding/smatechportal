<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- local devlopement -->
 <script src="assets/js/jquery-3.6.0.min.js" charset="utf-8"></script>
<script src="assets/js/bootstrap.bundle.min.js" charset="utf-8"></script> 
<script>
    //disable right click on mouse
    $(document).on("contextmenu", function(e) { return !1 });
     document.onkeydown = function(e) {
    if (e.ctrlKey &&
        (e.keyCode === 85 )) {
    alert("Not allowed!");
    return false;
    }
};
</script>
