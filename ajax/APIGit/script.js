$(document).ready(function () {
    //recoger los datos del dom y guardarlos en variables
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
    const pedirDatos = $('#pedirDatos')

    // ocultar el div de resultados al inicio
    divResultados.hide();

    // mostrar la información del usuario al dar un nombre
    function mostrarInformacionUsuario(usuario) {
        if (!usuario.name) {
            usuario.name = "Usuario sin Nombre";
        }
        resultadoDiv.html(`<p><strong>Nombre de Usuario:</strong> ${usuario.name}</p>`);
        if (usuario.avatar_url) {
            avatarContainer.html(`<img src="${usuario.avatar_url}" alt="Avatar">`);
        }
        //mostrar el listado de los repos
        mostrarRepositorios(usuario.name);

        if (usuario.bio) {
            bioContainer.html(`<p><strong>Biografía:</strong> ${usuario.bio}</p>`);
        } else {
            bioContainer.html(`<p><strong>Biografía:</strong> No especifica</p>`);
        }
        if (usuario.created_at) {
            const antiguedad = new Date() - new Date(usuario.created_at);
            const dias = Math.floor(antiguedad / (1000 * 60 * 60 * 24));
            antiguedadContainer.html(`<p><strong>Antigüedad en GitHub:</strong> ${dias} días</p>`);
        }
        // Mostrar el div de resultados y ocultar el div de ingresar datos

        nombreInput.val('');

        mostrarResultados();
    }

    function mostrarRepositorios(nombreUsu) {
        nombreUsu = nombreInput.val().trim();
        fetch(`https://api.github.com/users/${nombreUsu}/repos`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener repositorios del usuario');
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data) && data.length > 0) {
                    const repositorios = data.map(repo => repo.name);
                    const listaRepositorios = repositorios.map(nombre => `<li>${nombre}</li>`).join('');
                    reposContainer.html(`<p><strong>Repositorios Públicos:</strong></p><ul>${listaRepositorios}</ul>`);
                } else {
                    reposContainer.html(`<p><strong>Repositorios Públicos:</strong> No tiene repositorios públicos</p>`);
                }
            })
            .catch(error => {
                console.error('Error obteniendo repositorios:', error);
                reposContainer.html(`<p>Error obteniendo repositorios: ${error.message}</p>`);
            });
    }

    // ocultar el div de resultados y mostrar el div de ingresar datos
    function ocultarResultados() {
        divResultados.hide();
        pedirDatos.show();
    }
    // ocultar el div de ingresar datos y mostrar el div de resultados
    function mostrarResultados() {
        divResultados.show();
        pedirDatos.hide();
    }


    //buscar datos al hacer clic en el botón Mostrar
    btnMostrar.on('click', function () {
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

    // al cambiar forma de selecion desabilidtar botones
    btnCambiar.on('click', function () {
        nombreInput.prop('disabled', true);
        datosSelect.prop('disabled', false);
        btnMostrar.prop('disabled', true);
        btnCambiar.prop('disabled', true); 
        cargarNombresUsuarios();
    });

   
    datosSelect.on('change', function () {
        const seleccion = $(this).val();
        if (seleccion !== '') {
            fetch(`php/usuarios.php?allUsuarios=true`)
                .then(response => response.json())
                .then(usuarios => {
                    const usuarioSeleccionado = usuarios.find(usuario => usuario.nombre === seleccion);
                    console.log(seleccion);
                    if (usuarioSeleccionado) {
            // llamamos a la funcion para mostrar la info del usuario cada vez que se cambie el usuario
                        mostrarUsuariosBaseDatos(seleccion);
                    } else {
                        console.error('Usuario no encontrado en la base de datos');
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    });


    // cargar los nombres de usuarios desde el servidor
    function cargarNombresUsuarios() {
        $.get('php/usuarios.php', { allUsuarios: 'true' })
            .done(function (usuarios) {
                datosSelect.empty();

                // añadir nombres de usuarios al select
                usuarios.forEach(function (usuario) {
                    datosSelect.append(`<option value="${usuario.nombre}">${usuario.nombre}</option>`);
                });

            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                console.log(jqXHR.responseText);
            });
    }

    //mostrar los datos del usuario selecionado del select
    function mostrarUsuariosBaseDatos(nombreSeleccionado) {
        $.get('php/usuarios.php', { allUsuarios: 'true' })
            .done(function (usuarios) {
                const usuarioSeleccionado = usuarios.find(function (usuario) {
                    return usuario.nombre === nombreSeleccionado;
                });

                if (usuarioSeleccionado) {
                    resultadoDiv.html(`<h2>${usuarioSeleccionado.nombre}</h2>`);
                    if (usuarioSeleccionado.apellido) {
                        reposContainer.html(`<p>Apellido: ${usuarioSeleccionado.apellido}</p>`);
                    } else {
                        reposContainer.empty();
                    }
                    if (usuarioSeleccionado.ciudad) {
                        antiguedadContainer.html(`<p>Es de la ciudad: ${usuarioSeleccionado.ciudad}</p>`);
                    } else {
                        antiguedadContainer.empty();
                    }
                } else {
                    console.error('Usuario no encontrado en la base de datos');
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                console.log(jqXHR.responseText);
            });

        mostrarResultados();
    }

    //al pulsar volver se oculta resultados y se muestra pedir datos
    btnEmpezar.on('click', ocultarResultados);

});
