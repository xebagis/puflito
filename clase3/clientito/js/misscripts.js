function ejemploGet(fnCallBack) {
    fetch('integrador/server.php/usuario')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            console.log('data = ', data);
            fnCallBack(data);
        })
        .catch(function(err) {
            console.error(err);
        });
}

function ejemploPostFormulario() {
    fetch('http://localhost:8080/mi', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin':'*'
        },
        body: 'a=1&b=2'
        })
        .then(function(response) {
            console.log('response =', response);
            return response.json();
        })
        .then(function(data) {
            console.log('data = ', data);
        })
        .catch(function(err) {
            console.error(err);
        });
}

function ejemploPostObject(objEnviar) {
    fetch('http://localhost:8080/clifrec', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin':'*'
        },
        body: JSON.stringify(objEnviar)
        })
        .then(function(response) {
            if (response.status === 201) {
                alert('Se agrego correctamente');
            }
        })
        .catch(function(err) {
            console.error(err);
        });
}


{
    $('#btnGet').click(()=>{
        ejemploGet(datoDelServidor=>{
            alert(datoDelServidor);

            $('#selPruebas').html(
                Mustache.render(
                    $('#registrosCombo').html(), 
                    { lista: datoDelServidor})
            );
        });
    });
}
