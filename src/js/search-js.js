const search_input = document.querySelector("#search-input");
const search_filter = document.querySelectorAll(".search-filter");

function getSearchElements(filter) {
    let array = [];
    filter.forEach((x) => {
        let a = x.parentNode;

        while (a.nodeName !== "BODY") {
            if (a.classList.contains("search-element")) {
                array.push(a);
            }
            a = a.parentNode;
        }
    });

    return array;
}

function doSearch() {
    const typed = this.value.toUpperCase();
    let elements = getSearchElements(search_filter);
    let count = 0;

    search_filter.forEach((x, i) => {
        let names = x.innerHTML.toUpperCase();
        if(!names.includes(typed)) {
            elements[i].style.display = "none";
        } else {
            elements[i].style.display = "block";
            count++;
        }
    });

    if(document.body.contains(document.getElementById("not-found-banner"))) {
        if (count === 0) {
            document.getElementById("not-found-banner").style.display = "block";
        } else if (count > 0) {
            document.getElementById("not-found-banner").style.display = "none";
        }
        
    }
}

search_input.addEventListener("keyup", doSearch);

search_input.addEventListener("search", doSearch);
