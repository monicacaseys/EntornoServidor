"use strict";
document.addEventListener("DOMContentLoaded", () => {
  // función para cargar provincias desde la API
  function cargarProvincias() {
      fetch('https://www.el-tiempo.net/api/json/v2/provincias')
          .then(response => response.json())
          .then(data => {
              const selectProvincia = document.getElementById('provinciaSelect');
              data.provincias.forEach(provincia => {
                  const option = document.createElement('option');
                  option.text = provincia.NOMBRE_PROVINCIA;
                  option.value = provincia.CODPROV;
                  selectProvincia.add(option);
              });
          })
          .catch(error => console.error('Error al cargar provincias:', error));
  }

  // función para cargar municipios de una provincia seleccionada
  function cargarMunicipios(codigoProvincia) {
      fetch(`https://www.el-tiempo.net/api/json/v2/provincias/${codigoProvincia}/municipios`)
          .then(response => response.json())
          .then(data => {
              const selectMunicipio = document.getElementById('municipioSelect');
              selectMunicipio.innerHTML = ''; // Limpiar opciones anteriores
              data.municipios.forEach(municipio => {
                  const option = document.createElement('option');
                  option.text = municipio.NOMBRE;
                  option.value = municipio.CODIGOINE;
                  selectMunicipio.add(option);
              });
          })
          .catch(error => console.error('Error al cargar municipios:', error));
  }

  // función para consultar el clima 
  function consultarClima(codigoProvincia, idMunicipio) {
    Swal.fire({
        title: 'Consultando a la API del tiempo...',
        icon: 'info',
        timer: 1500, // Duración del alerta en milisegundos
        showConfirmButton: false,
        timerProgressBar: true
      });
      fetch(`https://www.el-tiempo.net/api/json/v2/provincias/${codigoProvincia}/municipios/${idMunicipio}`)
          .then(response => response.json())
          .then(data => {
              const temperatura = parseFloat(data.temperatura_actual.replace('ºC', ''));
              const infoClima = document.getElementById('climaInfo');
              infoClima.innerHTML = `<p>Temperatura actual: ${temperatura}°C</p>`;
              // Cambiar el color de fondo basado en la temperatura
              if (temperatura < 0) {
                  document.body.style.backgroundColor = 'white';
              } else if (temperatura >= 0 && temperatura < 15) {
                  document.body.style.backgroundColor = 'blue';
                  document.body.style.color = 'white';
              } else if (temperatura >= 15 && temperatura < 30) {
                  document.body.style.backgroundColor = 'orange';
              } else {
                  document.body.style.backgroundColor = 'red';
              }
          })
          .catch(error => console.error('Error al consultar el clima:', error));
  }

  //cargar municipios cuando se selecciona una provincia
  document.getElementById('provinciaSelect').addEventListener('change', function() {
      const codigoProvincia = this.value;
      cargarMunicipios(codigoProvincia);
  });

  // consultar el clima cuando se hace clic en el botón
  document.getElementById('consultarClimaBtn').addEventListener('click', function() {
      const codigoProvincia = document.getElementById('provinciaSelect').value;
      const idMunicipio = document.getElementById('municipioSelect').value.slice(0, 5);
      consultarClima(codigoProvincia, idMunicipio);
  });

  // cargar provincias al cargar la página
  cargarProvincias();
});



