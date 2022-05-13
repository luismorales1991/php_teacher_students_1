window.onload = function () {
    if (localStorage.getItem("dark-mode") == null) {
        localStorage.setItem("dark-mode", false);
    } else if (localStorage.getItem("dark-mode") == "true") {
        let logo = document.getElementById("switch-dark-mode-logo-1");

        if (logo.classList.contains("material-icons-outlined")) {
            // ON
            logo.classList.remove("material-icons-outlined");
            logo.classList.add("material-icons");
            localStorage.setItem("dark-mode", true);
        } else if (logo.classList.contains("material-icons")) {
            // OFF
            logo.classList.remove("material-icons");
            logo.classList.add("material-icons-outlined");
            localStorage.setItem("dark-mode", false);
        }
        darkMode();
    }
}

function darkMode() {
    let alldk = document.querySelectorAll(".a-dk");
    alldk.forEach(x => {
        x.classList.toggle("dark-mode");
    });
}

document.getElementById("switch-dark-mode-1").addEventListener("click", function () {
    let logo = document.getElementById("switch-dark-mode-logo-1");

    if (logo.classList.contains("material-icons-outlined")) {
        // ON
        logo.classList.remove("material-icons-outlined");
        logo.classList.add("material-icons");
        localStorage.setItem("dark-mode", true);
    } else if (logo.classList.contains("material-icons")) {
        // OFF
        logo.classList.remove("material-icons");
        logo.classList.add("material-icons-outlined");
        localStorage.setItem("dark-mode", false);
    }
    darkMode();
});

document.getElementById("info-button-1").addEventListener("click", function () {
    alert("Clicked!");
});