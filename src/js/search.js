const des = document.querySelectorAll(".course-description");
const view_more = document.querySelectorAll(".view-more");

function shrinkExpandText(descr) {
    descr.forEach(x => {
        const desc = x.innerHTML;
        let short_desc = desc.slice(0, 150);

        if (x.classList.contains("d-u-160")) {
            const view_button = x.parentNode.nextElementSibling.childNodes[3];

            if (view_button.classList.contains("active")) {
                const backup_text = view_button.previousSibling.previousSibling;
                x.innerHTML = backup_text.value;
            } else {
                if (short_desc.substring(short_desc.length - 1) == " ") short_desc = short_desc.substring(0, short_desc.length - 1);
                x.innerHTML = short_desc + "...";
            }
        }
    });
}

view_more.forEach(x => {
    x.addEventListener("click", function () {
        x.childNodes[1].classList.toggle("fa-angle-down");
        x.childNodes[1].classList.toggle("fa-angle-up");
        this.classList.toggle("active");
        shrinkExpandText(des);
    })
});

shrinkExpandText(des);