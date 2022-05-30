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

function generateRandomTitle() {
    var title = "";

    let part1 = [
        "Full HTML & CSS",
        "Algebra for dummies",
        "Basics of chemistry",

        "Course of Java",
        "Basics of bakery",
        "Epicurean philosophy",

        "Understanding the WWII",
        "Research techniques",
        "Spanish A2",
        
        "French B2",
        "How to draw an almost-perfect face",
        "How to cook a turkey",

        "How to sell anything",
        "Basics skills for computer jobs",
        "Basics of Raspberry Pi 4"
    ]

    const genRanHex = size => [...Array(size)].map(() => Math.floor(Math.random() * 16).toString(16)).join('');
    let part2 = (genRanHex(7)).toUpperCase() +" - ";

    var title = part2 + (part1[Math.floor(Math.random() * (part1.length))]);
    return title;
}

function generateRandomNumber1() {
    return (Math.floor(Math.random() * (30 - 1 + 1)));
}

function generateRandomDescription() {
    let sentences = [
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus vulputate nunc id ornare. Praesent a sollicitudin lorem. Aenean ut gravida leo.",
        "Vestibulum ligula arcu, pretium sit amet arcu sit amet, lacinia iaculis dui. Suspendisse ultricies hendrerit erat et consequat. Vestibulum nisi nibh egestas.",
        "Mauris non risus porttitor, varius nunc a, blandit ligula. Nullam eget ligula vel sem gravida tincidunt. Fusce vestibulum nec arcu vitae feugiat.",

        "Fusce finibus molestie massa in congue. Curabitur porttitor tincidunt ipsum, et pretium orci sodales sit amet. Vestibulum nisi nibh, egestas eu libero sed. ",
        "Ut vel mi vitae augue accumsan laoreet. Curabitur pharetra fermentum dapibus. Quisque sodales eget nisl vel blandit. Vestibulum nisi nibh, egestas eu libero.",
        "Proin rhoncus, ligula sit amet venenatis venenatis, mi neque imperdiet ex, tristique sollicitudin lorem metus nec tellus. Cras feugiat porttitor blandit.",

        "Nam eu pharetra nulla, vitae commodo dolor. Sed ac erat cursus felis ornare placerat. Mauris id dolor lorem. Vestibulum nisi nibh, egestas eu libero sed.",
        "Vivamus purus urna, aliquet sit amet scelerisque sit amet, malesuada nec purus. Nam scelerisque, nulla eu ultrices facilisis, ante ante viverra nulla.",
        "Nam ut ex sed arcu congue pharetra at id nisi. Sed vel molestie massa. Aliquam a ligula nunc. Donec ac lobortis felis. Vestibulum nisi nibh, egestas eu libero.",

        "Proin tempor orci a turpis dapibus, quis bibendum urna pellentesque. Vestibulum nisi nibh, egestas eu libero sed, efficitur sagittis metus. Vestibulum nisi nibh.",
        "Phasellus eget magna vel ipsum dignissim condimentum. Duis vel urna est. Duis dapibus est ut erat commodo sodales. Vestibulum nisi nibh, egestas eu libero sed.",
        "Nunc ut tincidunt diam, id porttitor magna. Etiam ut gravida leo. Vestibulum nisi nibh, egestas eu libero sed, efficitur sagittis metus. Donec congue fermentum.",

        "Sed sollicitudin non nisl ac placerat. Maecenas euismod porttitor nulla eu dapibus. Vestibulum nisi nibh, egestas eu libero sed, efficitur sagittis metus. ",
        "Vestibulum vel volutpat nisi, eget consequat lacus. In ipsum magna, ultrices sed dapibus vel, hendrerit in est. Vestibulum nisi nibh, egestas eu libero sed.",
        "Curabitur et malesuada massa, nec bibendum eros. Ut iaculis est odio, a condimentum nisi pulvinar vitae. Aenean vitae est in arcu semper posuere."
    ]

    return sentences[Math.floor(Math.random() * (sentences.length))]
}

document.getElementById("generate-0").addEventListener("click", function() {
    this.nextElementSibling.value = generateRandomTitle();
});

document.getElementById("generate-1").addEventListener("click", function() {
    this.parentElement.nextElementSibling.value = generateRandomNumber1();
});

document.getElementById("generate-2").addEventListener("click", function() {
    this.nextElementSibling.value = generateRandomDescription();
});