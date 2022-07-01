function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function getTodayDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = String(yyyy + '-' + mm + '-' + dd);
    return today;
}

function substractDate(date, num_days) {
    let dt = new Date(date);
    dt.setDate(dt.getDate() - num_days);

    var dd = String(dt.getDate()).padStart(2, '0');
    var mm = String(dt.getMonth() + 1).padStart(2, '0');
    var yyyy = dt.getFullYear();

    dt = String(yyyy + '-' + mm + '-' + dd);
    return dt;
}

function getData(link) {
    const xmlhttp = new XMLHttpRequest();

    return new Promise(function (resolve, reject) {
        xmlhttp.onload = function () {
            if (this.readyState == 4 && this.status == 200) {
                resolve(JSON.parse(this.responseText));
            } else {
                reject("Error 500")
            }
        };
        xmlhttp.open("GET", link, true);
        xmlhttp.send();
    });
}

async function setDataOnChart(chart, getterdata) {
    const result = await getterdata;

    if(result.length === 0) {
        chart.canvas.style.display = "none";
        chart.canvas.nextSibling.nextSibling.classList.remove("disable");
    } else {
        result.forEach(x => {
            chart.data.labels.push(x.name);
            chart.data.datasets.forEach((dataset) => {
                dataset.data.push(x.num);
            });
        });
        chart.update();
    }
}

// FIRST CHART
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [],
        datasets: [{
            label: 'Top 5 courses with the largest number of students',
            data: [],
            backgroundColor: [
                '#e74c3c',
                '#2ecc71',
                '#3498db',
                "#f39c12",
                "#9b59b6"
            ],
            hoverOffset: 4
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: "#666"
                }
            }
        }
    }
});

// SECOND CHART
const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [],
        datasets: [{
            label: 'My First Dataset',
            data: [],
            backgroundColor: [
                '#e74c3c',
                '#e67e22',
                '#1abc9c'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: '#666'
                }
            }
        }
    }
});

// THIRD CHART
const ctx4 = document.getElementById('myChart4').getContext('2d');
const myChart4 = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Assignments the last 7 days',
            data: [],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {}
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

setDataOnChart(myChart4, getData("./controllers/get-assignment-per-date.php"));
setDataOnChart(myChart, getData("./controllers/get-ass-c.php"));
setDataOnChart(myChart2, getData("./controllers/get-student-gender.php"));

if(localStorage.getItem("dark-mode") == "true") {
    darkModeChart("verify");
};

document.querySelector("#dark-mode-2").addEventListener("click", darkModeChart);

function darkModeChart(check) {
    const x = myChart4.config.options.scales.x;
    const y = myChart4.config.options.scales.y;
    const verify = (localStorage.getItem("dark-mode") == "true" && check === "verify")? true: false;

    if (verify || localStorage.getItem("dark-mode") == "false" || localStorage.getItem("dark-mode") == undefined) {
        x.grid.borderColor = "white";
        y.grid.borderColor = "white";
        x.grid.color = "rgba(255,255,255,0.5)";
        y.grid.color = "rgba(255,255,255,0.5)";
        x.ticks.color = "white";
        y.ticks.color = "white";
        myChart.config.options.plugins.legend.labels.color = 'white';
        myChart2.config.options.plugins.legend.labels.color = 'white';
        myChart4.config.options.plugins.legend.labels.color = 'white';
    } else if (localStorage.getItem("dark-mode") == "true") {
        x.grid.borderColor = "rgba(0,0,0,0.1)";
        y.grid.borderColor = "rgba(0,0,0,0.1)";
        x.grid.color = "rgba(0,0,0,0.1)";
        y.grid.color = "rgba(0,0,0,0.1)";
        x.ticks.color = "#666";
        y.ticks.color = "#666";
        myChart.config.options.plugins.legend.labels.color = '#666';
        myChart2.config.options.plugins.legend.labels.color = '#666';
        myChart4.config.options.plugins.legend.labels.color = '#666';
    }

    myChart.update();
    myChart2.update();
    myChart4.update();
}