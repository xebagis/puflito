
function refrescarInscripciones() {
    obtenerTodasLasInscripciones(datosDelServidor => {
        let renderizado = Mustache.render(
            $('#templateTablaPrincipal').html(), 
            { lista: datosDelServidor})
    
        console.log(renderizado)
    
        $('#tabUsuCursos').html(
            renderizado
        );
    })
}



function getInicial() {
    obtenerTodosLosUsuarios(datoDelServidor=>{
        $('#selUsuario').html(
            Mustache.render(
                $('#templateComboUsuarios').html(), 
                { lista: datoDelServidor})
        );
    });

    obtenerTodosLosEncuentros(datoDelServidor => {
        $('#selEncuentro').html(
            Mustache.render(
                $('#templateComboEncuentros').html(), 
                { lista: datoDelServidor})
        );
    })

    refrescarInscripciones()
}

function registrarUsuarioEvento() {
    
    realizarRegistroUsuarioEncuentro(
        $('#selUsuario')[0].value,
        $('#selEncuentro')[0].value,
        refrescarInscripciones
    )
}

$('#btnGet').click(getInicial);
$('#btnRegistrar').click(registrarUsuarioEvento);

$(document).on('click', '.js-borrar', function() {
    let ids = $(this)[0].id;
    let arrIds = ids.split('___');
    let idUsuario = arrIds[0];
    let idEncuentro = arrIds[1];
    realizarBorradoUsuarioEncuentro(idUsuario, idEncuentro, z => {
        refrescarInscripciones()
    })
})

setTimeout(getInicial, 200)