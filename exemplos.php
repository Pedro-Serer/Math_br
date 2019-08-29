<?php
  require_once "funcoes.php";

  /*Exemplos de uso*/
  echo "<b>Exponente de (1/2) com expoênte -2: </b><br>"."Resultado = ".exp_br((1/2), -2)."<br><br>";
  echo "<b>O lagaritimo de 60 é: </b><br>"."Resultado = ".log_br('X', 60, 'X')."<br><br>";
  echo "<b>O lagaritimo de 8 na base 2 é: </b><br>"."Resultado = ".log_br(2, 8, 'X')."<br><br>";
  echo "<b>O lagaritimo de 8 na base 30 é: </b><br>"."Resultado = ".log_br(30, 8, 'X')."<br><br>";
  echo "<b>O lagaritimando na base 2 com logaritimo igual a 8 é: </b><br>"."Resultado = ".log_br(2, 'X', 8)."<br><br>";
  echo "<b>O f(x) = 2x + 8 em que f(2) é: </b><br>"."Resultado = ".func_afim_br(2, 2, 8, 'X')."<br><br>";
  echo "<b>O retuntado de A em f(5) = a.(5) + 1000 em que f(5) = 250 é: </b><br>"."Resultado = ".func_afim_br(5, 'X', 1000, 250)."<br><br>";

?>
