//Este es un comentario de JS de una linea

/*Este es un comentario de 
varias 
lineas de codigo
*/

//variables
var nombre="Mari G";
var nombre2='Fer C';
let nombre3="Poppy";
let edad=20;
let estatura=1.80;
let logico=true;

//Mostrar contenido de variables 
console.log("Hola soy la consola y tu nombre es: "+nombre3); // atraves de consola
document.write("Hola soy la consola y tu nombre es: "+nombre3);
document.write("<hr><h2>Hola soy la consola y tu nombre es: "+nombre3+"</h2>");

//Alertas
//alert("Soy una alerta: "+nombre)

//Mostrar contenido getElementByID
let datos=document.getElementById("información");
datos.innerHTML="Hola soy un contenido de innerHTML<br>";
datos.innerHTML+="<hr><h2>Hola soy otro contenido de innerHTML</h2><hr>";
datos.innerHTML+="<hr><h2>Mi edad es: "+edad+"</h2><hr>";
datos.innerHTML+=`
    <hr>
    <h2>Mi edad es ${edad}</h2>
    <h2>Mi nombre es ${nombre}</h2>
    <hr>
`;


//Condiciones
if(edad>=18)
    datos.innerHTML+=`<hr><h2>Soy mayor de edad</h2>`;
else`<h2>Soy menor de edad</h2>`;


//Ciclos
for(let i=1;i<5;i++)
    {
        datos.innerHTML+=`<hr><h2>Soy el número ${1}</h2>`;
    }

let i=1;

while(i<=5)
    {
        datos.innerHTML+=`<hr><h2>Soy el número ${1}</h2>`;
    i++;
    }


i=1;
do
    {
        datos.innerHTML+=`<hr><h2>Soy el número ${1}</h2>`;
    i++;
    }while (i<=5)


//Funciones
//Funcion que reciben parmetros y no regresan valor
function suma1()
{
    let n1=2;
    let n2=3;
    let suma= n1+n2;
    datos.innerHTML+=`<hr><h2>La suma 1 es ${suma}</h2>`;
}
suma1();
    

//Funcion que no recibe parametro pero si regresa valor
function suma2()
{
    let n1=2;
    let n2=3;
    let suma= n1+n2;
    return suma;
}
let sum=suma2();
datos.innerHTML+=`<hr><h2>La suma 2 es ${sum}</h2>`;
    

//Funcion que reciben paramaetros y no regresan valor
function suma3(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma= n1+n2;
    return suma;
    datos.innerHTML+=`<hr><h2>La suma 3 es ${suma}</h2>`;
}
suma3(3,4);


//Funcion que si recibe paframetro y si recibe valor
function suma4(numero1,numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma= n1+n2;
    return suma;

}
sum=suma4(3,4);
datos.innerHTML+=`<hr><h2>La suma 4 es ${sum}</h2>`;


//Arreglos
let animales=[];
animales[0]="Perro";
animales[1]="Gallina";
animales[2]="Perico";

let animales2=["Leon", "Tigre","Elefante"];

for(let i=0;i<animales.length;i++)
{
    datos.innerHTML+=`<hr><h2>El animal es ${animales[i]}</h2>`;

}
animales2.forEach(element=>{
    datos.innerHTML+=`<hr><h2>El animal es ${element}</h2>`;
});