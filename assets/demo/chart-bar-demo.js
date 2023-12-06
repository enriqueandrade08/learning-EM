// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


var datos;
var formData = new FormData();
formData.append('tipo', 1);

fetch('controller/InscritoGraficoController.php', {
  method: 'POST',
  body: formData
})
  .then(function (response) {
    return response.json(); // Parsea la respuesta como JSON
  })
  .then(function (body) {
    // console.log(body);
    datos = body;

    // Actualiza el gráfico con los datos obtenidos
    actualizarGrafico(datos);
  });

function actualizarGrafico(datos) {
  // Bar Chart Example
  var ctx = document.getElementById("myBarChart");
  var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: datos.map(item => item.nombre), // Usa el nombre del curso como etiquetas
      datasets: [{
        label: "Cantidad",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: datos.map(item => item.cant), // Usa la cantidad como datos
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'month'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 6
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            // max: 15000,  // Puedes eliminar esto si deseas que se ajuste automáticamente
            maxTicksLimit: 5
          },
          gridLines: {
            display: true
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
}