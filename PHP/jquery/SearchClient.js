$(document).ready(function() {
    $("#btn-cpf").click(function() {

        $("input[name='cpf']").append(function() {
            var $idCliente = $("input[name='idCliente']");
            var $idCarro = $("input[name='idCarro']");
            var $cliente = $("input[name='cliente']");
            var $placa = $("input[name='placa']");
            $.getJSON('SearchClient.php', {
                cpf: $(this).val()
            }, function(json) {
                $idCliente.val(json.idCliente);
                $idCarro.val(json.idCarro);
                $cliente.val(json.cliente);
                $placa.val(json.placa);
            });
        });
    });
});