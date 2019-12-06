<?php
$jobs = [
  $array = [
    "curso1" => "js",
    "curso2" => "php",
  ],
  $array1 = [
    "curso1",
    "curso2",
  ]
];

//ejercicio 1 de arrays
$arreglo = [

	"keyStr1" => "lado",
	0 => "ledo",
 "keyStr2" => "lido",
	1 => "lodo",
	2 => "ludo"

];

$paises = [
  "Venezuela" => [
                  "Maracay",
                  "Caracas",
                  "Valencia"
                ],
  "USA" => [
             "Washington",
             "San Diego",
             "Miami"
           ],
  "España" => [
                "Barcelona",
                "Madrid",
                "Valencia"
              ],
];

$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
rsort($valores);

//ejercicios de operadores
$numero1 = 32;
$numero2 = 3;
$result1 = $numero1 + $numero2;

$numero3 = 3;
$numero4 = 4;
$result2 = $numero3 * ($numero3 + $numero4);

$valor = 3;
if( ( $valor > 0 & $valor < 5) || ($valor > 10 & $valor < 15) )
{
  echo "hola";
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p><?php echo $arreglo["keyStr1"], ", " ,$arreglo[0], ", ", $arreglo["keyStr2"], ", ", $arreglo[1], ", ", $arreglo[2], "," ; ?>
    <br> decirlo al revés lo dudo. <br>
    <?php echo $arreglo[2], ", ", $arreglo[1], ", ", $arreglo["keyStr2"], ", ", $arreglo[0], ", ", $arreglo["keyStr1"], ","?>
    <br> ¡Qué trabajo me ha costado!
    </p>
    <p>
      <?php foreach ($paises as $key => $value) {
        // code...
        echo "$key :  $value[0], $value[1], $value[2]"
      ?>
      <br>
    <?php } ?>
    </p>
    <p>
      <?php
        echo "los 3 numeros mas altos son: $valores[0], $valores[1], $valores[2] ";
        echo "<br>";
        echo "los 3 numeros mas bajos son: $valores[12], $valores[13], $valores[14]";
       ?>
    </p>
    <p>
      <?php echo $result1;
      echo "<br>";
      echo $result2; ?>
    </p>
  </body>
</html>
