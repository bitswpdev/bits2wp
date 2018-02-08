(function ($) {

    $(document).ready(function () {
        var ctx = document.getElementById("viewsChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: page_views.type,
            data: {
                labels: JSON.parse(page_views.dates),
                datasets: [{
                    label: 'Views',
                    data: JSON.parse(page_views.counts),
                    backgroundColor: page_views.backgroundColor,
                    borderColor: page_views.borderColor,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        barPercentage: 0.9
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                    }]
                },
                tooltips: {
                    displayColors: false
                },
                legend: {
                    display: false
                },
            }
        });
    });
})(jQuery);