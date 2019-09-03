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
  */


  /**
  *  Função exponencial
  *
  * * @param int|int [Base, Expoente] Elemento base elevado ao expoente.
  * * @return int Retorna um inteiro da potência.
  *
  */

  function exp_br($base, $expoente)
  {
        return bcpow($base,$expoente);
  }

  /**
  *  Tabela dos logarítimos do 1 ao 11
  *
  * * @param int A entrada necessita ser um inteiros .
  * * @return int Retorna o somatório de todos os dados de entrada.
  *
  */

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

  /**
  *  Função que fatora um número
  *
  * * @param int A entrada é um inteiro incrementada de maneira recursiva.
  * * @return int[] O retorno é um array de inteiros de todos os fatores.
  *
  */

  function fatoracao($num)
  {
    if ($num < 2)
    {
      return [];
    }

    for ($i=2; $i <= $num; $i++)
    {
      if ($num % $i == 0)
      {
        $fator = $i;

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

  /**
  *  Função logarítimica básica
  *
  * * @param mixed|mixed|mixed [Base, Logaritimando, Logaritimo] Os dados de entrada podem ser do tipo char ou int para interagir na função.
  * * @return mixed Retorna um tipo int se houver um cáculo válido ou um char caso não houver.
  *
  */

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

  /**
  *  Função afim
  *
  * * @param mixed|mixed|mixed|mixed| [Incógnita, Coeficiênte angular, Coeficiênte Linear, Valor do domínio] Os dados de entrada podem ser do tipo char ou int.
  * * @return mixed Retorna um tipo int se houver um cáculo válido ou um char caso não houver.
  *
  */

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

  /**
  * Função que calcula o teorema de pitágoras
  *
  * * @param int|int [b², c²] b e c são catetos oposto e adjacente.
  * * @return int o retorno é um int contendo o valor de a².
  *
  */

  function pitagoras_br($b, $c)
  {
    return (exp_br($b, 2)) + (exp_br($c, 2));
  }

  /**
  * Função que calcula raiz quadrada
  *
  * * @param int Um número do tipo int maior que zero
  * * @return int Int da raiz do número de entrada
  *
  */

  function sqrt_br($num)
  {
    return bcsqrt($num);
  }

  /**
  * Função da equação do segundo grau
  *
  * * @param int|int|int [ax², b, c] Todos do tipo int
  * * @return int[] Retorna um array com os valores de x1 e x2
  *
  */

  function segundo_grau_br($a, $b, $c)
  {
    $delta = ($b * $b) - (4 *
      ($a * $c)
    );

    $x1 = (-$b +
      sqrt_br($delta)) / (2 * $a);
    $x2 = (-$b -
      sqrt_br($delta)) / (2 * $a);

    return [$x1, $x2];
  }
?>
