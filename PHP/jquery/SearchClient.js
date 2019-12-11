$(document).ready(function() {
    $("#btn-cpf").click(function() {

        $("input[name='cpf']").append(function() {
            var $idCliente = $("input[name='idCliente']");
            var $cliente = $("input[name='cliente']");
            var $placa = $("input[name='placa']");
            $.getJSON('SearchClient.php', {
                cpf: $(this).val()
            }, function(json) {
                $idCliente.val(json.idCliente);
                $cliente.val(json.cliente);
                $placa.val(json.placa);
            });
        });
    });
});