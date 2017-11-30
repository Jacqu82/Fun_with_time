function counting() {
    var present = new Date();

    var hour = present.getHours();
    if (hour < 10) {
        hour = "0" + hour;
    }
    var minute = present.getMinutes();
    if (minute < 10) {
        minute = "0" + minute;
    }
    var second = present.getSeconds();
    if (second < 10) {
        second = "0" + second;
    }
    document.getElementById("clock").innerHTML = hour + ":" + minute + ":" + second;
    setTimeout("counting()", 1000);
}