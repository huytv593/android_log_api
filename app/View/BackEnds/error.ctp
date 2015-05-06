<script type="text/javascript">
    var count = 5;
    var redirect = "http://localhost/android_log";

    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            timer.innerHTML = "Back to homepage after "+count+" seconds.";
            setTimeout("countDown()", 1000);
        }else{
            window.location.href = redirect;
        }
    }
</script>
<span id="timer">
<script type="text/javascript">countDown();</script>
</span>