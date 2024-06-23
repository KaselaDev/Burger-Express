
function graficar(datos=[],newLabel=[]){
	console.log(datos);
	 const ctx = document.getElementById('Estadistica');

            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: newLabel,
                datasets: [{
                  label: 'Cantidad de ventas',
                  data: datos,
                  backgroundColor: 'red',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
}