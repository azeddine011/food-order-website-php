//chart script

const labels = ["Jan", "Feb", "Mar", "Apr", "May",
"Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
const data = {
  labels: labels,
  datasets: [{
    label: 'this is name',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: true,
    borderColor: 'rgb(100, 200, 1)',
    backgroundColor:'rgb(75, 192, 192)',
    stacked: true,
    tension: 0.1
  }]
};

var options = {
    maintainAspectRatio: false,
    plugins:{
        legend:{
            display:false
        }
    },
    scales: {
      y: {
        ticks:{
            display:false
        },
        stacked: true,
        grid: {
          display: false,
        //   drawTicks:false,
        }
      },
      x: {
        
        grid: {
          display: false
        }
      }
    }
  };


const config = {
    type: 'line',
    options:options,
    data: data  
};


const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );