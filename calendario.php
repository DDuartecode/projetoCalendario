<?php
	

	//conta quantos dias tem no mes
	//inicio função
	function diasMeses(){
		$retorno = array();

		for($i = 1; $i <= 12; $i++){
			$retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));

		}

		return $retorno;
	}
	//fim função
	///////////////////////////
	//inicio função
	function montaCalendario(){
		$daysWeek = array(
			'Sun',
			'Mon',
			'Tue',
			'Wed',
			'Thu',
			'Fri',
			'Sat'
		);

		$diasSemana = array(
			'Domingo',
			'Segunda',
			'Terça',
			'Quarta',
			'Quinta',
			'Sexta',
			'Sabado'
		);

		//cada kay=número refere-se a um mes=valor
		$arrayMes = array(
			1 => 'Janeiro',
			2 => 'Fevereiro',
			3 => 'Março',
			4 => 'Abril',
			5 => 'Maio',
			6 => 'Junho',
			7 => 'Julho',
			8 => 'Agosto',
			9 => 'Setembro',
			10 => 'Outubro',
			11 => 'Novembro',
			12 => 'Dezembro'
		);
		//////////////////////////////////////

		$diasMeses = diasMeses();
		$arrayRetorno = array();
		//busca qual o número respectivo ao mês
		for($i = 1; $i <= 12; $i++){
			$arrayRetorno[$i] = array();
		////////////////////////////////////////////////////////////////

			//busca qual o número respectivo ao dia do mês ex: 1°,2° dia 
			for ($n = 1; $n <= $diasMeses[$i]; $n++){
				 $dayMonth = gregoriantojd($i, $n, date('Y'));
			/////////////////////////////////////////////////////////////
			
				//retorna os 3 primeiros caracteres do dia ex: Sat-urday 
				 $weekMonth = substr(jddayofweek($dayMonth, 1),0,3);
				 if ($weekMonth == 'Mun') $weekMonth = 'Mon';

				 $arrayRetorno[$i][$n] = $weekMonth;
				/////////////////////////////////////////////////////////
			}

		}

		echo '<a href="#" id="volta">&<a href="#" id="vai">&raquo;</a>';
		echo '<table border="0" width="100%">';
		//cria o corpo da tabela do mes
		foreach ($arrayMes as $num => $mes) {
			echo '<tbody id="mes_'.$num.'"class="mes">'; // id para js
			echo '<tr><td colspan="7">'.$mes.'</td></tr><tr>';
		///////////////////////////////////////////////////////////////

			//imprime os dias da semana
			foreach($diasSemana as $i => $day){
				echo '<td>'.$day.'</td>';
			}
			echo '</tr><tr>';
			///////////////////////////////////////////////////////////

			//pula os dias que não pertecem ao mes
			$y = 0;
			foreach($arrayRetorno[$num] as $numero_dia => $dia){
				$y++;

				//se for o primeiro dia do mes
				if($numero_dia == 1){
					//busca o indice=numero_dia da palavra no array
					$qtd = array_search($dia, $daysWeek);
					for($i=1; $i <= $qtd; $i++){
						echo '<td></td>';
						$y+=1;
					}
				}
				echo '<td>'.$numero_dia.'</td>';
				if($y == 7){
					$y=0;
					echo '</tr><tr>';
				}
			/////////////////////////////////////////////////////////////

			}

			echo '</tr></tbody>';
		}
		echo '</table>';


	}
	//fim função

?>