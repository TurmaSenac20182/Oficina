<?php
include('connection.php');

function data($data)
{
    return date("d/m/Y", strtotime($data));
}

$conn = connection();
$campo = "%" . $_POST['campo'] . "%";
$campo2 = "%" . $_POST['campo'] . "%";
$campo3 = "%" . $_POST['campo'] . "%";

$query = $conn->prepare("select idOS, idCliente, idCarro, Funcionário, Nome_Cliente, Data_de_Entrada from VIEW_OS where Funcionário like ? OR Nome_Cliente like ? OR Data_de_Entrada like ?");
$query->bind_param('sss', $campo, $campo2, $campo3);
$query->execute();
$query->bind_result($idOs, $idCliente, $idCarro, $funcionario, $cliente, $data);

?>

<div class="table100">
    <table>
        <thead>
            <tr class="table100-head">
                <th class="column1">ID</th>
                <th class="column2">Funcionario</th>
                <th class="column3">Cliente</th>
                <th class="column3">Data</th>
            </tr>
        </thead>
        <?php while ($query->fetch()) { ?>
            <tbody>
                <tr>
                    <td class="column1"><a clas="select-item" href="FormOs2.php"><button class="columnButton"><?= $idOs ?></button></a></td>
                    <td class="column1"><a class="select-item" href="FormOs2.php"><button class="columnButton"><?= $funcionario ?></button></a></td>
                    <td class="column1"><a class="select-item" href="FormOs2.php"><button class="columnButton"><?= $cliente ?></button></a></td>
                    <td class="column1"><a class="select-item" href="FormOs2.php"><button class="columnButton"><?= data($data) ?></button></a></td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
</div>