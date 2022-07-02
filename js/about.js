const about_button = document.getElementById("info-button-1");
const info_div = document.getElementById("info-div");
const info_x_button = document.getElementById("info-x-button");
const info_video = document.getElementById("info-video");

about_button.addEventListener("click", toggleInfoDiv);
info_x_button.addEventListener("click", toggleInfoDiv);

function toggleInfoDiv() {
    if (info_div.classList.contains("active")) {
        info_div.style.top = "125%";
    } else {
        info_div.style.top = "0%";
    }
    info_div.classList.toggle("active");
}

resizeInfoVideo();
document.body.onresize = resizeInfoVideo;

function resizeInfoVideo() {
    if (document.body.offsetWidth < 660) {
        info_video.style.width = "100%";
        info_video.style.height = Number(info_video.offsetWidth * 0.5625) + "px";
    } else {
        info_video.style.width = "560px";
        info_video.style.height = "315px";
    }
}