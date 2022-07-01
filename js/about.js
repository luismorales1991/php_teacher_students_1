const about_button = document.getElementById("info-button-1");
const info_div = document.getElementById("info-div");
const info_x_button = document.getElementById("info-x-button");

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
// const about_button = document.getElementById("about-button");