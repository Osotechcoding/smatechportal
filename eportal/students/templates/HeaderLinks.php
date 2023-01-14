
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="assets/plugins/toastr/toatr.css">
<link rel="stylesheet" href="assets/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">

<link rel="stylesheet" href="assets/css/fullcalendar.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/morris/morris.css">

<link rel="stylesheet" href="assets/css/style.css">
<script type="text/javascript">
        window.onload = initClock;
        //  <span id='clockDisplay'>
        function initClock() {
            let now = new Date();
            let hr = now.getHours();
            let min = now.getMinutes();
            let sec = now.getSeconds();
            if (hr >= 12 && hr <= 24) {
                if (min < 10) min = "0" + min; // insert a leading zero
                if (sec < 10) sec = "0" + sec;
                document.getElementById('displayTime').innerHTML = hr + ":" + min + ":" + sec + " PM ";
                setTimeout('initClock()', 500);
            } else {
                if (min < 10) min = "0" + min; // insert a leading zero
                if (sec < 10) sec = "0" + sec;
                document.getElementById('displayTime').innerHTML = hr + ":" + min + ":" + sec + " AM ";
                setTimeout('initClock()', 500);
            }
        }
    </script> 

<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->