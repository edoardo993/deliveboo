<template>
  <canvas ref="myChart" width="900px" height="250px"></canvas>
</template>

<script>

import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
export default {
  props: {
    label:  {
      type: Array
    },
    chartData:  {
      type: Array
    }
  },
  async mounted() {
    await new Chart(this.$refs.myChart, {
      type: 'bar',
      data: {
        labels: ['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'],
        datasets: [
        {
            label: 'DATAS',
            backgroundColor: 'rgba(144,238,144 , 0.9 )',
            data: [1,20,50,800,1000,100000,534,45,12,677,800,456],
        }
        ]
      },
      options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          suggestedMin:50,
          suggestedMax:500
        }
      }]
    }
    }
    });
  }
}
</script>
