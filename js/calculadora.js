//Variable global;
var operador = "";

function operadores(op)
{
	operador = op;
}

function igual()
{
	var valor1 = document.calculadora.operando1.value;
	var valor2 = document.calculadora.operando2.value;
	document.calculadora.resultado.value = eval(valor1+operador+valor2);
}

function numeros(num)
{
	if(operador == "")
	{
		//Guardamos el valor de operando1.
		var valor = document.calculadora.operando1.value;
		
		if(valor == "0")
		{
			document.calculadora.operando1.value = "";
		}
		
		document.calculadora.operando1.value = document.calculadora.operando1.value + num;
	}
	else //Para escribir en el operando2.
	{
		//Guardamos el valor de operando2.
		var valor = document.calculadora.operando2.value;
		
		if(valor == "0")
		{
			document.calculadora.operando2.value = "";
		}
		
		document.calculadora.operando2.value = document.calculadora.operando2.value + num;
	}
}