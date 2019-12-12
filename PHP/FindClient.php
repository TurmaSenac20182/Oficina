<?php
include('connection.php');

$conn = connection();
$campo = "%" . $_POST['campo'] . "%";
$campo2 = "%" . $_POST['campo'] . "%";
$campo3 = "%" . $_POST['campo'] . "%";

$query = $conn->prepare("select IDCliente, Cliente, CPF, Celular from VIEW_LISTA where Cliente like ? OR CPF like ? OR Celular like ?");
$query->bind_param('sss', $campo, $campo2, $campo3);
$query->execute();
$query->bind_result($idCliente, $cliente, $cpf, $celular);

?>
<div class="table100">
    <table>
        <thead>
            <tr class="table100-head">
                <!--<th class="column1">ID</th>-->
                <th class="column2">NOME</th>
                <th class="column3">CPF</th>
                <th class="column4">TELEFONE</th>
            </tr>
        </thead>
        <?php while ($query->fetch()) { ?>
            <tbody>
                <tr>
                    <!--<td class="column1"><button class="columnButton"><?= $idCliente ?></button></td>-->
                    <td class="column1"><button class="columnButton"><?= $cliente ?></button></td>
                    <td class="column1"><button class="columnButton"><?= $cpf ?></button></td>
                    <td class="column1"><button class="columnButton"><?= $celular ?></button></td>
                </tr>
            <?php } ?>
            </tbody>
</div>