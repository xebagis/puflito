function obtenerTodosLosUsuarios(fnCallBack)  {
    fetch('integrador/server.php/usuario')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log('data = ', data);
        fnCallBack(data);
    })
    .catch(function(err) {
        alert(err);
    });
}

function obtenerTodosLosEncuentros(fnCallBack) {
    fetch('integrador/server.php/encuentro')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log('data = ', data);
        fnCallBack(data);
    })
    .catch(function(err) {
        alert(err);
    });
}

function obtenerTodasLasInscripciones(fnCallBack) {
    fetch('integrador/server.php/registroUsuario')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log('data = ', data);
        fnCallBack(data);
    })
    .catch(function(err) {
        alert(err);
    });
}

function realizarRegistroUsuarioEncuentro(idUsuario, idEncuentro, fnCallBack) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    fetch('integrador/server.php/registroUsuario', {
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify({
            idUsuario,
            idEncuentro
        })
     })
     .then(function(response) {
        return response.json();
     })
     .then(function(data) {
        console.log('data = ', data);
        fnCallBack(data);
     })
     .catch(function(err) {
        alert(err);
     });
}

function realizarBorradoUsuarioEncuentro(idUsuario, idEncuentro, fnCallBack) {
    // delete usuario encuentro 
    let url = ['integrador', 'server.php', 'registroUsuario', idUsuario, idEncuentro].join('/')
    fetch(url, {
        method: 'DELETE',
        body: {
            idUsuario,
            idEncuentro
        }
     })
     .then(function(response) {
        return response.json();
     })
     .then(function(data) {
        console.log('data = ', data);
        fnCallBack(data);
     })
     .catch(function(err) {
        alert(err);
     });
}