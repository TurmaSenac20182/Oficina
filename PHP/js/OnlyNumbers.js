function OnlyNumbers(num) {
    var er = /[^0-9-]/;
    er.lastIndex = 0;

    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

function OnlyNumbersTel(num) {
    var er = /[^0-9 -]/;
    er.lastIndex = 0;

    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

function OnlyNumbersCpfRG(num) {
    var er = /[^0-9. -]/;
    er.lastIndex = 0;

    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}