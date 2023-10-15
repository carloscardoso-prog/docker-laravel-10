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

$("#cep").blur(function(){
    var cep = $(this).val().replace(/\D/g, '');
    if(cep != "") {
        var validaCep = /^[0-9]{8}$/;
        if(validaCep.test(cep)) {
            $("#logradouro").val(" ");
            $("#bairro").val(" ");
            $("#cidade").val(" ");
            $("#uf").val(" ");
        }
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados){
            if (!("erro" in dados)) {
                $("#logradouro").val(dados.logradouro.toUpperCase());
                $("#bairro").val(dados.bairro.toUpperCase());
                $("#cidade").val(dados.cidade.toUpperCase());
                $("#uf").val(dados.uf.toUpperCase());
            }
            else {
                alert("CEP não encontrado de forma automatizada, digite manualmente seu endereço ou tente novamente.")
            }
        });
    }
});