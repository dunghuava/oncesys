var ctx = document.getElementById('tongDoanhThu').getContext('2d');

var data_1 = [];
$.ajax({
    type: "get",
    url: "api/b/get-thongke",
    success: function (response) {
        for (let i = 0; i < 12; i++) {
            if (response[i] == undefined) {
                data_1[i] = 0;
            } else {
                data_1[response[i].thang] = parseInt(response[i].chi_phi);
            }
        }
        data_1 = data_1.shift();
        draw_chart(data_1);
    }
});

function draw_chart(data) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Votes',
                data: data_1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
var ctx2 = document.getElementById('tongVatTu').getContext('2d');
var myChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Kính', 'Thuốc', 'Thủ thuật'],
        datasets: [{
            label: 'Votes',
            data: [120, 19, 30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});