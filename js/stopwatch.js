var timeBegan = null
    , timeStopped = null
    , stoppedDuration = 0
    , started = null;

var displayStopwatch;	
	
function start() {
    if (timeBegan === null) {
        timeBegan = new Date();
    }

    if (timeStopped !== null) {
        stoppedDuration += (new Date() - timeStopped);
    }
    console.log(stoppedDuration);

    started = setInterval(clockRunning, 10);	
}

function stop() {
    timeStopped = new Date();
    clearInterval(started);
}
 
function reset() {
    clearInterval(started);
    stoppedDuration = 0;
    timeBegan = null;
    timeStopped = null;
    displayStopwatch = "0.000";
}

function clockRunning(){
    var currentTime = new Date()
        , timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
        , hour = timeElapsed.getUTCHours()
        , min = timeElapsed.getUTCMinutes()
        , sec = timeElapsed.getUTCSeconds()
        , ms = timeElapsed.getUTCMilliseconds();

    //displayStopwatch = (sec > 9 ? sec : "0" + sec) + "." + (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
    displayStopwatch = (sec > 9 ? sec : sec) + "." + (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
        // (hour > 9 ? hour : "0" + hour) + ":" + 
        // (min > 9 ? min : "0" + min) + ":" +        
        
};