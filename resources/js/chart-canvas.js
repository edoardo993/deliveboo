require('./bootstrap');


// per installarlo da linea comando: npm install chart.js

// poi <canvas id="myChart"></canvas> prima dello script per renderizzarlo ( in HTML )

// usare una di queste diciture per prendere l’id del div contenitore del diagramma:

// - var ctx = document.getElementById('myChart');
// - var ctx = document.getElementById('myChart').getContext('2d');
// - var ctx = $('#myChart');
// - var ctx = 'myChart';

// usare import Chart from 'chart.js/auto'; in app.js per utilizzarlo senza CDN

// per impostare una width/height a piacere nostro nel canvas, comporre lo stile nel div padre del canvas,
// mettendo la classe chart-container con all'interno lo style (ex: <div class="chart-container" style="height:40vh; width:80vw">)

import Chart from 'chart.js/auto';

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    // nel type si possono usare queste chiavi: line, bar, radar, doughnut, polar, bubble e scatter
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
                'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Totale Ordini',
            data: [120, 190, 300, 50, 200, 300, 400, 130, 70, 90, 100, 140],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(134, 159, 47, 0.2)',
                'rgba(236, 159, 25, 0.2)',
                'rgba(174, 159, 39, 0.2)',
                'rgba(25, 159, 42, 0.2)',
                'rgba(212, 159, 17, 0.2)',
                'rgba(28, 159, 23, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                suggestedMin: 50,
                suggestedMax: 500
            }
        }
    }
});
