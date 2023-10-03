function deleteRegistroPaginacao(rotaUrl, idDoRegistro){
    // console.log(rotaUrl);
    // console.log(idDoRegistro);S
    if(confirm('Deseja remover o produto de ID ' + idDoRegistro)){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idDoRegistro
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Carregando',
                    timeout: 2000
                });
            }
        }).done(function(data){
            $.unblockUI();

            if(data.success == true){
                window.location.reload();
            }else{
                alert("Não foi possível remover os dados.");
            }
        }).fail(function (data) {
            $.unblockUI();
            alert("Não foi possível buscar os dados");
        });
    }
}

$('#mascara-valor').mask('#.##0,00', {reverse: true});