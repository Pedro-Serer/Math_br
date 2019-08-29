<?php
  /**
  * Funções matemáticas em puro PHP
  *
  * Funções criadas no intuito de ajudar no procedimento de operações matemáticas
  * mais complexas, como funções, logarítimos, P.A's, limites e etc. Para facilitar o uso das
  * mesmas, os parâmetros de cada uma delas são exatamente os autores para resolução
  * passo a passo aprendida no colegial.
  *
  * @author Pedro Serer <pedrotiserer@hotmail.com>
  *
  * @version 1.0.0
  *
  *
  * * Função exponencial
  * *
  * * @param int|int [Base, Expoente] Elemento base elevado ao expoente.
  * * @return int Retorna um inteiro da potência.
  *
  *
  * * Função tabela logaritimo
  * *
  * * @param int A entrada necessita ser um inteiros .
  * * @return int Retorna o somatório de todos os dados de entrada.
  *
  *
  * * Função de fatoração
  * *
  * * @param int A entrada é um inteiro incrementada de maneira recursiva.
  * * @return int[] O retorno é um array de inteiros de todos os fatores.
  *
  *
  * * Função logarítimica básica
  * *
  * * @param mixed|mixed|mixed [Base, Logaritimando, Logaritimo] Os dados de entrada podem ser do tipo char ou inteiro para interagir na função.
  * * @return mixed Retorna um tipo int se houver um cáculo válido ou um char caso não houver.
  *
  *
  * * Função afim
  * *
  * * @param mixed|mixed|mixed|mixed| [Incógnita, Coeficiênte angular, Coeficiênte Linear, Valor do domínio] Os dados de entrada podem ser do tipo char ou int.
  * * @return mixed Retorna um tipo int se houver um cáculo válido ou um char caso não houver.
  *
  *
  *
  */

  /*Função de exponenciação*/
  function exp_br($base, $expoente)
  {
    $res = $base;

    if($expoente < 0)
    {
      $expoente = $expoente * (-1);
      for ($i=1; $i < $expoente; $i++)
      {
        $res *= $base;
      }

      $res = 1 / $res;
    } else{
      for ($i=1; $i < $expoente; $i++)
      {
        $res *= $base;
      }
    }

    return $res;
  }

  /*Tabela dos logarítimos do 1 ao 11*/
  function tabela_log_br($fatores)
  {
    $resultado = 0;
    foreach($fatores as $lista)
    {
      switch($lista)
      {
        case 1:
          $res = 0;
          break;
        case 2:
          $res = 0.30;
          break;
        case 3:
          $res = 0.47;
          break;
        case 4:
          $res = 0.60;
          break;
        case 5:
          $res = 0.69;
          break;
        case 6:
          $res = 0.77;
          break;
        case 7:
          $res = 0.89;
          break;
        case 8:
          $res = 0.90;
          break;
        case 9:
          $res = 0.95;
          break;
        case 10:
          $res = 1;
          break;
        case 11:
          $res = 1.04;
          break;
      }

      $resultado += $res;
    }
    return $resultado;
  }

  /*Função que fatora um número*/
  function fatoracao($num)
  {
    if ($num < 2)
    {
      return [];
    }

    $numeros = array(2, 3, 4, 5, 6, 7, 8, 9);

    for ($i=0; $i < 8; $i++)
    {
      if ($num % $numeros[$i] == 0)
      {
        $fator = $numeros[$i];

        if ($num > 1)
        {
          $num = $num / $fator;

          $fatores = fatoracao($num);
          array_unshift($fatores, $fator);
          return $fatores;
        }
      }
    }
  }

  /*Função que calcula o lagaritimo*/
  function log_br($base, $logaritimando, $logaritimo)
  {
    if ((($base !== 'X') && (gettype($base) !== 'integer') && (gettype($x) !== 'double'))
      || (($logaritimo !== 'X') && (gettype($logaritimo) !== 'integer') && (gettype($x) !== 'double')
        || (($logaritimando !== 'X') && (gettype($logaritimando) !== 'integer') && (gettype($x) !== 'double'))))
    {
      return "Valor não permitido! Tente novamente...";

    } else{
        if (($base === 'X')) {
          $base = 10;
        }

        if (($logaritimando === 'X') && (gettype($base) === 'integer')) //Se não tiver logaritimando
        {

          if ($logaritimo == 0)
          {
            return 1;
          } else
            {
              $logaritimando = exp_br($base, $logaritimo);
              return $logaritimando;
            }

        } else if ($logaritimo === 'X' && $base == 10) // Se não tiver logarítimo e a base for igual a 10, posso descobrir o logaritimando
          {
            return tabela_log_br(fatoracao($logaritimando));

          } else if(($logaritimo === 'X') && (gettype($base) === 'integer')) //Se não tiver logarítimo e a base for diferente de 10.
            {
              $array = fatoracao($logaritimando);
              $i = 0;
              foreach ($array as $lista) {
                if ($lista == $base)
                {
                  $i++;
                } else
                  {
                    return "Impossível calcular, pois há fatores diferentes.";
                  }
              }
              return $i;
            }
    }
  }

  /*Função afim*/
  function func_afim_br($x, $a, $b, $fx){
    if ((($x !== 'X') && (gettype($x) !== 'integer') && (gettype($x) !== 'double'))
      || (($a !== 'X') && (gettype($a) !== 'integer') && (gettype($a) !== 'double')
        || (($b !== 'X') && (gettype($b) !== 'integer') && (gettype($b) !== 'double')))
          || (($fx !== 'X') && (gettype($fx) !== 'integer') && (gettype($fx) !== 'double')))
    {
      return "Valor não permitido! Tente novamente...";
    } else
    {
      if ((($a === 'X') && ($fx !== 'X')))
      {
        if ($fx < 0)
        {
          return (($b + $fx) / $x);
        } else
        {
          return (($fx - $b) / $x);
        }
      } else
      {
        return ($a * $x) + $b;
      }
    }
  }
?>
