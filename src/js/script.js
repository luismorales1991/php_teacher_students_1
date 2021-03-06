const table_item = document.querySelectorAll(".edit-table-item");
const x_button = document.querySelectorAll(".x-button");
const grade_number = document.querySelectorAll(".grade-number");
const student_table_name = document.querySelectorAll(".student-table-name");

function toggleNoScrollBody() {
    document.body.classList.toggle("no-scroll");
}

window.onload = function () {
    if (localStorage.getItem("dark-mode") == null) {
        localStorage.setItem("dark-mode", false);
    } else if (localStorage.getItem("dark-mode") == "true") {
        darkMode();
    }
}

x_button.forEach(x => {
    x.addEventListener("click", function () {
        toggleNoScrollBody()
        let formdiv = x.parentElement.parentElement;
        let overlaydiv = x.parentElement.parentElement.parentElement.parentElement;
        formdiv.classList.toggle("active");
        overlaydiv.classList.toggle("overlay-disappearing");
        setTimeout(function () {
            overlaydiv.classList.toggle("disable");
            overlaydiv.classList.toggle("overlay-disappearing");
        }, 200);
    });
});

grade_number.forEach(x => {
    toggleNoScrollBody();
    x.addEventListener("click", function () {
        document.querySelector("#modal-name-1").innerHTML = previousSiblingByClassName(x.parentElement, "student-name-case").children[0].innerHTML;
        document.querySelector("#modal-id").value = previousSiblingByClassName(x.parentElement, "assignment-id").value;

        if (x.classList.contains("u1")) {
            document.querySelector("#modal-unit").innerHTML = "I";
            document.querySelector("#modal-unit-data").value = "1";
        }

        if (x.classList.contains("u2")) {
            document.querySelector("#modal-unit").innerHTML = "II";
            document.querySelector("#modal-unit-data").value = "2";
        }

        if (x.classList.contains("u3")) {
            document.querySelector("#modal-unit").innerHTML = "III";
            document.querySelector("#modal-unit-data").value = "3";
        }

        if (x.classList.contains("u4")) {
            document.querySelector("#modal-unit").innerHTML = "IV";
            document.querySelector("#modal-unit-data").value = "4";
        }

        if(isNaN(x.innerHTML)) {
            document.getElementById("remove-grade-button").style.display = "none";
        } else {
            document.getElementById("remove-grade-button").style.display = "inline-block";
        }

        document.getElementById("overlay-modal").classList.toggle("disable");
        document.getElementById("edit-grade").classList.toggle("active");
        document.getElementById("input-change-grade").value = Number(x.innerHTML);
        document.getElementById("input-change-grade").select();
    });
});

function darkMode() {
    let alldk = document.querySelectorAll(".a-dk");
    alldk.forEach(x => {
        x.classList.toggle("dark-mode");
    });
}

document.getElementById("dark-mode-2").addEventListener("click", function () {
    if (localStorage.getItem("dark-mode") == "true") {
        localStorage.setItem("dark-mode", false);
    } else if (localStorage.getItem("dark-mode") == "false") {
        localStorage.setItem("dark-mode", true)
    }
    darkMode();
});

student_table_name.forEach(x => {
    x.addEventListener("click", function () {
        document.querySelector("#modal-id-2").value = x.parentNode.nextSibling.nextSibling.value;
        document.getElementById("overlay-modal-student").classList.toggle("disable");
        toggleNoScrollBody();
        document.getElementById("edit-student").classList.toggle("active");
    });
});

document.getElementById("btn-bars-1").addEventListener("click", function () {
    document.getElementById("vertical-main-menu").classList.toggle("enable-b-1");
    document.getElementById("vertical-overlay").classList.toggle("disable");
    toggleNoScrollBody()
});

document.getElementById("x-button-vertical-menu").addEventListener("click", function () {
    document.getElementById("vertical-main-menu").classList.toggle("enable-b-1");
    document.getElementById("vertical-overlay").classList.toggle("disable");
    toggleNoScrollBody()
});


function previousSiblingByClassName(ele, className) {
    var el = ele;
    while (el = el.previousSibling) {
        if (el.classList != undefined && el.classList.contains(className)) {
            return el;
        }
    };
    return el;
}