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