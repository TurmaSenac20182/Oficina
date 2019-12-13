<?php
session_start();
/*
    if (!isset($_SESSION["usuario"]) || !isset($_SESSION["email"]) && !isset($_SESSION["senha"])) {
        header("Location: index.php");
    }*/
?>

<!doctype html>
<html lang="pt-br">
<?php require "function.php";
$dados = retriveAllCli(); ?>

<head>
    <meta charset="utf-8">
    <title>Marzo mecânica</title>
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/HomePage.css" />
    <link rel="stylesheet" type="text/css" href="css/calendar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />

    <style>
        #calendario {
            position: relative;
            width: 80%;
            margin: 0px auto;
        }

        .teste {
            width: 108%;
        }
    </style>

    <!-- script de tradução -->
    <script src='fullcalendar/lang/pt-br.js'></script>

    <script>
        $(document).ready(function() {

            //CARREGA CALENDÁRIO E EVENTOS DO BANCO
            $('#calendario').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2016-01-12',
                editable: true,
                eventLimit: true,
                events: 'eventos.php',
                eventColor: '#dd6777'
            });
            //CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function() {
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_evento.php",
                    data: dados,
                    success: function(data) {
                        if (data == "1") {
                            alert("Cadastrado com sucesso! ");
                            //atualiza a página!
                            location.reload();
                        } else {
                            alert("Houve algum problema.. ");
                        }
                    }
                });
                return false;
            });
        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand"><img src="images/LogoB2.png" width="60px" height="45px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="FormClient.php"><i class="fas fa-user-plus fa-md"></i> Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FormOs.php"><i class="fas fa-paste fa-md"></i> Novo Serviço</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fab fa-searchengin fa-md"></i> Consultas</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="ListClient.php">Clientes</a>
                        <a class="dropdown-item" href="ListOs.php">Ordens de serviço</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="ContainerClass">
        <div class="container-fluid">

            <div class="container">
                <?php if (isset($_SESSION["cadastro_realizado"])) : ?>
                    <?php $usuario_cadastrado = $_SESSION["cadastro_realizado"]; ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center; margin-top: 10px;">
                        <strong><?php echo $usuario_cadastrado; ?></strong>!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php unset($_SESSION["cadastro_realizado"]); ?>
                    </div>
                <?php endif ?>

                <?php if (isset($_SESSION["os_realizada"])) : ?>
                    <?php $servico_cadastrado = $_SESSION["os_realizada"]; ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center; margin-top: 10px;">
                        <strong><?php echo $servico_cadastrado; ?></strong>!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php unset($_SESSION["os_realizada"]); ?>
                    </div>
                <?php endif ?>
            </div>
            <!--<div id='calendario'>
            <br />
            <form id="novo_evento" action="./php/cadastrarEvento.php" method="post">
                Nome do Evento: <input type="text" name="nome" required /><br /><br />
                Data do Evento: <input type="date" name="data" required /><br /><br />
                <button type="submit"> Cadastrar novo evento </button>
            </form>
        </div>-->

            <div class="calendar-container">
                <div class="calendar-header">
                    <h1>
                        November
                        <button>▾</button>
                    </h1>
                    <p>2018</p>
                </div>
                <div class="calendar">
                    <span class="day-name">Domingo</span>
                    <span class="day-name">Segunda</span>
                    <span class="day-name">Terça</span>
                    <span class="day-name">Quarta</span>
                    <span class="day-name">Quinta</span>
                    <span class="day-name">Sexta</span>
                    <span class="day-name">Sábado</span>


                    <div class="day day--disabled">30</div>
                    <div class="day day--disabled">31</div>
                    <div class="day"><a data-toggle="modal" data-target="#addServico" onclick="darAData(this.innerHTML);">1</a></div>
                    <div class="day"><a data-toggle="modal" data-target="#addServico" onclick="darAData(this.innerHTML);">2</a></div>
                    <div class="day">3</div>
                    <div class="day">4</div>
                    <div class="day">5</div>
                    <div class="day">6</div>
                    <div class="day">7</div>
                    <div class="day">8</div>
                    <div class="day">9</div>
                    <div class="day">10</div>
                    <div class="day">11</div>
                    <div class="day">12</div>
                    <div class="day">13</div>
                    <div class="day">14</div>
                    <div class="day">15</div>
                    <div class="day">16</div>
                    <div class="day">17</div>
                    <div class="day">18</div>
                    <div class="day">19</div>
                    <div class="day">20</div>
                    <div class="day">21</div>
                    <div class="day">22</div>
                    <div class="day">23</div>
                    <div class="day">24</div>
                    <div class="day">25</div>
                    <div class="day">26</div>
                    <div class="day">27</div>
                    <div class="day">28</div>
                    <div class="day">29</div>
                    <div class="day">30</div>
                    <div class="day">31</div>
                    <div class="day day--disabled">1</div>
                    <div class="day day--disabled">2</div>
                    <!--<section class="task task--warning">Projects</section>
          <section class="task task--danger">Design Sprint</section>
          <section class="task task--primary">Product Checkup 1
            <div class="task__detail">
              <h2>Product Checkup 1</h2>
              <p>15-17th November</p>
            </div>
          </section>
          <section class="task task--info">Product Checkup 2</section>-->
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="addServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Celular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dados as $lista) { ?>
                                        <tr>
                                            <th scope="row"><button class="teste btn btn-light btn-lg btn-block"><?= $lista['IDCliente'] ?></button></th>
                                            <td><button class="teste btn btn-light btn-lg btn-block"><?= $lista['Cliente'] ?></button></td>
                                            <td><button class="teste btn btn-light btn-lg btn-block"><?= $lista['Celular'] ?></button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>