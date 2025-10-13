// js/main.js

// Load page into #content
function loadPage(page) {
    fetch(`views/${page}.html`)
        .then(res => {
            if (!res.ok) throw new Error("Page not found");
            return res.text();
        })
        .then(html => {
            document.getElementById("content").innerHTML = html;
            initPage(page);
        })
        .catch(err => {
            document.getElementById("content").innerHTML = `<h1>Error</h1><p>${err}</p>`;
        });
}

// Initialize charts or datatables after page load
function initPage(page) {
    if (page === "dashboard" || page === "charts") {
        const areaChart = document.getElementById("myAreaChart");
        if (areaChart) new Chart(areaChart, chartAreaConfig);

        const barChart = document.getElementById("myBarChart");
        if (barChart) new Chart(barChart, chartBarConfig);
    }

    if (page === "dashboard" || page === "tables") {
        const table = document.querySelector("#datatablesSimple");
        if (table) new simpleDatatables.DataTable("#datatablesSimple");
    }
}

// Example chart configs
const chartAreaConfig = {
    type: 'line',
    data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets: [{
            label: "Sales",
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            data: [100,120,90,140,170,130,160,180,200,220,210,230]
        }]
    },
    options: {
        scales: { xAxes:[{time:{unit:'month'},gridLines:{display:false},ticks:{maxTicksLimit:12}}],
                   yAxes:[{ticks:{min:0,max:250,maxTicksLimit:5},gridLines:{color:"rgba(0,0,0,.125)"}}] },
        legend:{display:false}
    }
};

const chartBarConfig = {
    type: 'bar',
    data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets:[{
            label:"Revenue",
            backgroundColor:"rgba(2,117,216,1)",
            borderColor:"rgba(2,117,216,1)",
            data:[150,180,160,190,210,200,220,230,250,270,260,280]
        }]
    },
    options: {
        scales:{xAxes:[{time:{unit:'month'},gridLines:{display:false},ticks:{maxTicksLimit:12}}],
                yAxes:[{ticks:{min:0,max:300,maxTicksLimit:6},gridLines:{color:"rgba(0,0,0,.125)"}}]},
        legend:{display:false}
    }
};

// Load default dashboard
document.addEventListener("DOMContentLoaded", () => loadPage("dashboard"));
