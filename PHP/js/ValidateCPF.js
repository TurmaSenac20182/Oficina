function limpa_formulário_cpf() {
    document.getElementById('IDCpf').value = ("");
}

function validaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;

    strCPF = preg_replace('/[^0-9]/', '', strCPF);
    
    //verificar se CPF contém  números repitidos ou se é vazio.


    if (strCPF == "00000000000" ||
        strCPF == '11111111111' ||
        strCPF == '22222222222' ||
        strCPF == '33333333333' ||
        strCPF == '44444444444' ||
        strCPF == '55555555555' ||
        strCPF == '66666666666' ||
        strCPF == '77777777777' ||
        strCPF == '88888888888' ||
        strCPF == '99999999999' ||
        strCPF == '') {
        return false;
    }


    // Verificar se o CPF contém 11 dígitos.

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;

    return true;
}

function mensagem() {

    var strCPF = document.getElementById("IDCpf").value;

    if (!validaCPF(strCPF)) {
        alert("Digite um CPF Válido!");
        limpa_formulário_cpf();
    }
}