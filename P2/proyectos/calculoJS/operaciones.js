function operacion() {

    //BUENA PRÁCTICA Se puede asignar una por una, o de un mismo let poner todas y en los de abajo solo se borra let "let n1,n2...;"
    let n1 = parseInt(document.getElementById("n1").value);
    let n2 = parseInt(document.getElementById("n2").value);
    let tipoope = document.getElementById("tipo").value;
    
    let ope;
    let operacionTexto;
    
    
    switch(tipoope) {
        case "suma":
            ope = n1 + n2;
            operacionTexto = `${n1} + ${n2}`;
            break;
        case "resta":
            ope = n1 - n2;
            operacionTexto = `${n1} - ${n2}`;
            break;
        case "multiplicacion":
            ope = n1 * n2;
            operacionTexto = `${n1} * ${n2}`;
            break;
        case "division":
            ope = n1 / n2;
            operacionTexto = `${n1} / ${n2}`;
            break;
        default:
            ope = "Operación no válida";
            operacionTexto = "";
    }
    
    let resultado = document.getElementById("resultado");
    if (ope !== "Operación no válida") {
        resultado.innerHTML = `<h2>${operacionTexto} = ${ope}</h2>`;
    } 
    else {
            alert ("Ingrese números por favor");
    }
}

function isNumber (n)
{
    return !isNan(ParseInt(n) && ifFinite(n))
}
