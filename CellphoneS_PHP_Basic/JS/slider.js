const arrSlideImg =[
    "slider1.webp",
    "slider2.webp",
    "slider3.webp",
    "slider4.webp",
];

var crIndex = 0;
var time;
function icRight(){
    crIndex++;
    if(crIndex >= arrSlideImg.length){
        crIndex = 0;
    }
    document.querySelector("#slideImg").src="./img/" + arrSlideImg[crIndex];
}

function icLeft(){
    if(crIndex <= 0){
        crIndex = arrSlideImg.length;
    }
    crIndex--;
    document.querySelector("#slideImg").src="./img/" + arrSlideImg[crIndex];
}

function slideAuto(){
    time = setInterval(icRight,2000);
}
slideAuto();

function slideStop(){
    clearInterval(time);
}

