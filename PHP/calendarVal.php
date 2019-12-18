<?php
    require 'function.php';
    date_default_timezone_set("America/Sao_Paulo");

    //meses
    $jan = 31;
    $fev = 29;
    $mar = 31;
    $abr = 30;
    $mai = 31;
    $jun = 30;
    $jul = 31;
    $ago = 31;
    $set = 30;
    $out = 31;
    $nov = 30;
    $dez = 31;

    $meses = array();

    $meses[0] = $jan;
    $meses[1] = $fev;
    $meses[2] = $mar;
    $meses[3] = $abr;
    $meses[4] = $mai;
    $meses[5] = $jun;
    $meses[6] = $jul;
    $meses[7] = $ago;
    $meses[8] = $set;
    $meses[9] = $out;
    $meses[10] = $nov;
    $meses[11] = $dez;

    function getMes() {
        $mes = date('m');

        switch ($mes) {
            case 01:
                return "janeiro";
            break;
            case 02:
                return "fevereiro";
            break;
            case 03:
                return "março";
            break;
            case 04:
                return "abril";
            break;
            case 05:
                return "maio";
            break;
            case 06:
                return "junho";
            break;
            case 07:
                return "julho";
            break;
            case 08:
                return "agosto";
            break;
            case 09:
                return "setembro";
            break;
            case 10:
                return "outubro";
            break;
            case 11:
                return "novembro";
            break;
            case 12:
                return "dezembro";
            break;
        }
    }

?>
