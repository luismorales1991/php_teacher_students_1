document.querySelectorAll(".show-password").forEach((x,i) => {
    x.addEventListener("click", function () {
        let thainput = document.querySelector("#show-password-" + i);
        let thaicon = document.querySelector("#show-password-icon-" + i);

        thaicon.classList.toggle("fa-eye");
        thaicon.classList.toggle("fa-eye-slash");


        if(thainput.getAttribute("type") == "password") {
            thainput.setAttribute("type","text");
        } else {
            thainput.setAttribute("type","password");
        }
        
    });
});

var cleave = new Cleave('#input-phone', {
    phone: true,
    phoneRegionCode: 'US'
});

document.getElementById("generate-phone-btn").addEventListener("click", function () {
    var partnumber = "";
    for (let i = 0; i < 9; i++) {
        partnumber += String(Math.floor(Math.random() * (10 - 0)) + 0);
        if(i==1 || i==4) {
            partnumber += " ";
        }
    }
    let newnumber = String(Math.floor(Math.random() * (10 - 1)) + 1) + partnumber;
    this.nextElementSibling.value = newnumber;
})