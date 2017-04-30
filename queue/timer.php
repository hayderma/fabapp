


 <body>
<div id="divCounter"></div>


<script>
var hoursleft = 0;
var minutesleft = 0; //give minutes you wish
var secondsleft = 30; // give seconds you wish
var finishedtext = "Countdown finished!";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);

}

var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
}     
if(now >= end1) {     
    clearTimeout(interval);
  localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById("divCounter").innerHTML = finishedtext;
     
} else {
    var value =hours +":" +mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById("divCounter").innerHTML = value;
    //localStorage.clear();
}
}

var interval = setInterval(counter, 1000);
</script>
</body>

