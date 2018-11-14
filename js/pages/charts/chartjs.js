$(function () {
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;
        config = {
            type: 'bar',
            data: {
                labels: ["All Plans", "Active Plans", "Settled Plans", "Dafaulted Plans"],
                datasets: [{
                    label: "Current Term",
                    data: [all_plans, active_plans, settled_plans, defaulted_plans],
                    backgroundColor: '#1269ad'
                }, {
                        label: "Previous Term",
                        data: [11, 25, 27, 19],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    return config;
}