$(document).ready(function() {
  const nombreInput = $('#nombre');
  const datosSelect = $('#datos');
  const btnMostrar = $('#btn-mostrar');
  const btnCambiar = $('#btn-cambiar');
  const divResultados = $('#divResultados');
  const avatarContainer = $('#avatar-container');
  const resultadoDiv = $('#resultado');
  const reposContainer = $('#repos-container');
  const bioContainer = $('#bio-container');
  const antiguedadContainer = $('#antiguedad-container');
  const btnEmpezar = $('#empezar');

  // Ocultar el div de resultados al inicio
  divResultados.hide();

  // Función para mostrar la información del usuario
  function mostrarInformacionUsuario(usuario) {
      if (!usuario.name) {
          usuario.name = "Usuario sin Nombre";
      }
      resultadoDiv.html(`<p><strong>Nombre de Usuario:</strong> ${usuario.name}</p>`);
      if (usuario.avatar_url) {
          avatarContainer.html(`<img src="${usuario.avatar_url}" alt="Avatar">`);
      }
      if (usuario.public_repos) {
          reposContainer.html(`<p><strong>Repositorios Públicos:</strong> ${usuario.public_repos}</p>`);
      }
      if (usuario.bio) {
          bioContainer.html(`<p><strong>Biografía:</strong> ${usuario.bio}</p>`);
      }
      if (usuario.created_at) {
          const antiguedad = new Date() - new Date(usuario.created_at);
          const dias = Math.floor(antiguedad / (1000 * 60 * 60 * 24));
          antiguedadContainer.html(`<p><strong>Antigüedad en GitHub:</strong> ${dias} días</p>`);
      }
      // Mostrar el div de resultados y ocultar el div de ingresar datos
      divResultados.show();
      nombreInput.val('');
      datosSelect.prop('selectedIndex', 0);
  }

  // Función para ocultar el div de resultados y mostrar el div de ingresar datos
  function ocultarResultados() {
      divResultados.hide();
  }

  // Event listener para buscar datos al hacer clic en el botón Mostrar
  btnMostrar.on('click', function() {
      const nombre = nombreInput.val().trim();
      if (nombre !== '') {
          fetch(`https://api.github.com/users/${nombre}`)
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Usuario no encontrado');
                  }
                  return response.json();
              })
              .then(usuario => {
                  mostrarInformacionUsuario(usuario);
              })
              .catch(error => {
                  resultadoDiv.html(`<p>${error.message}</p>`);
                  avatarContainer.empty();
                  reposContainer.empty();
                  bioContainer.empty();
                  antiguedadContainer.empty();
              });
      } else {
          resultadoDiv.html('<p>Debe ingresar un nombre de usuario</p>');
          avatarContainer.empty();
          reposContainer.empty();
          bioContainer.empty();
          antiguedadContainer.empty();
      }
  });

  // Event listener para cambiar la forma de selección al hacer clic en el botón Cambiar
  btnCambiar.on('click', function() {
      nombreInput.prop('disabled', function(i, val) {
          return !val;
      });
      datosSelect.prop('disabled', function(i, val) {
          return !val;
      });
      btnMostrar.prop('disabled', function(i, val) {
          return !val;
      });
      btnCambiar.prop('disabled', function(i, val) {
          return !val;
      });
  });

  // Event listener para cargar datos de la base de datos cuando se selecciona una opción en el select
  datosSelect.on('change', function() {
      const seleccion = $(this).val();
      if (seleccion !== '') {
          fetch(`http://localhost/EntornoServidor/ajax/APIGit/usuarios.php?allUsuarios=true`)
              .then(response => response.json())
              .then(usuarios => {
                  const usuarioSeleccionado = usuarios.find(usuario => usuario.nombre === seleccion);
                  if (usuarioSeleccionado) {
                      // Llenar el resultado con los datos obtenidos del usuario seleccionado
                      mostrarInformacionUsuario(usuarioSeleccionado);
                  } else {
                      console.error('Usuario no encontrado en la base de datos');
                  }
              })
              .catch(error => console.error('Error fetching data:', error));
      }
  });

  // Event listener para volver a la selección de usuarios al hacer clic en el botón Empezar
  btnEmpezar.on('click', ocultarResultados);
});
