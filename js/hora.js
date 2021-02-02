var clock = document.getElementById('clock');


function relogio() {
    var time = new Date();
    var hours = time.getHours().toString();
    var minutes = time.getMinutes().toString();
    var seconds = time.getSeconds().toString();




    var clockStr = hours + ':' + minutes + ':' + seconds;


    clock.textContent = clockStr;

}

setInterval(relogio, 1000);


