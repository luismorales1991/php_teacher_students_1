if (document.body.contains(document.getElementById("input-phone"))) {
    var cleave = new Cleave('#input-phone', {
        phone: true,
        phoneRegionCode: 'US'
    });
}

if (document.body.contains(document.getElementById("change-banner-button"))) {
    document.getElementById("change-banner-button").addEventListener("click", function () {
        document.getElementById("change-banner-icon").classList.toggle("fa-angle-down");
        document.getElementById("change-banner-icon").classList.toggle("fa-angle-up");
        
        document.getElementById("change-banner-button").classList.toggle("active");
        let panel = document.getElementById("change-banner-button").nextElementSibling;
        panel.classList.toggle("active");
    });
}