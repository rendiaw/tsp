<?php
ini_set("error_reporting", E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Genetic Algorithm : TSP </title>
	<style>
		body {
			text-align: center;
			margin: 0px; padding: 0px;
		}
		body, td, th, input {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 11px;
		}
		h1 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 15px;
			text-align: center;
		}
		.cityCell {
			width: 60px;
		}
		.input {
			background-color: #CCFFFF;
			border: 1px solid #ccc;
			padding: 1px;
			margin: 1px;
		}
		#container {
			margin: 0 auto 0 auto; padding: 10px;
			width: 520px;
			text-align: left;
			border-left: 2px solid #333;
			border-right: 2px solid #333;
			border-bottom: 2px solid #333;
		}
		form {
			margin: 0px; padding: 0px;
		}
		.debug td {
			padding: 0 2px 0 2px;
		}
	</style>
</head>
<body>
	<div id="container">
		<h1>Genetic Algorithm : TSP : PHP Implementation by Thomas Hunter</h1>
		<form method="post">
			<table width="500" border="0" cellspacing="2" cellpadding="0" style='border: 1px solid #999;' align="center">
				<tr>
					<td><strong>Cities</strong></td>
					<td align="center" class='cityCell'>City A</td>
					<td align="center" class='cityCell'>City B</td>
					<td align="center" class='cityCell'>City C</td>
					<td align="center" class='cityCell'>City D</td>
					<td align="center" class='cityCell'>City E</td>
					<td align="center" class='cityCell'>City F</td>
					<td align="center" class='cityCell'>City G</td>
				</tr>
				<tr>
					<td>City A</td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="1_2" type="text" class="input" id="textfield" size="4" maxlength="4" value="12" />
					</div></td>
					<td><div align="center">
						<input name="1_3" type="text" class="input" id="textfield2" size="4" maxlength="4" value="4" />
					</div></td>
					<td><div align="center">
						<input name="1_4" type="text" class="input" id="textfield3" size="4" maxlength="4" value="6" />
					</div></td>
					<td><div align="center">
						<input name="1_5" type="text" class="input" id="textfield4" size="4" maxlength="4" value="10" />
					</div></td>
					<td><div align="center">
						<input name="1_6" type="text" class="input" id="textfield5" size="4" maxlength="4" value="6" />
					</div></td>
					<td><div align="center">
						<input name="1_7" type="text" class="input" id="textfield6" size="4" maxlength="4" value="8" />
					</div></td>
				</tr>
				<tr>
					<td>City B</td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="2_3" type="text" class="input" id="textfield7" size="4" maxlength="4" value="11" />
					</div></td>
					<td><div align="center">
						<input name="2_4" type="text" class="input" id="textfield8" size="4" maxlength="4" value="5" />
					</div></td>
					<td><div align="center">
						<input name="2_5" type="text" class="input" id="textfield9" size="4" maxlength="4" value="7" />
					</div></td>
					<td><div align="center">
						<input name="2_6" type="text" class="input" id="textfield10" size="4" maxlength="4" value="3" />
					</div></td>
					<td><div align="center">
						<input name="2_7" type="text" class="input" id="textfield11" size="4" maxlength="4" value="14" />
					</div></td>
				</tr>
				<tr>
					<td>City C</td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="3_4" type="text" class="input" id="textfield12" size="4" maxlength="4" value="16" />
					</div></td>
					<td><div align="center">
						<input name="3_5" type="text" class="input" id="textfield13" size="4" maxlength="4" value="18" />
					</div></td>
					<td><div align="center">
						<input name="3_6" type="text" class="input" id="textfield14" size="4" maxlength="4" value="6" />
					</div></td>
					<td><div align="center">
						<input name="3_7" type="text" class="input" id="textfield15" size="4" maxlength="4" value="4" />
					</div></td>
				</tr>
				<tr>
					<td>City D</td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="4_5" type="text" class="input" id="textfield16" size="4" maxlength="4" value="11" />
					</div></td>
					<td><div align="center">
						<input name="4_6" type="text" class="input" id="textfield17" size="4" maxlength="4" value="8" />
					</div></td>
					<td><div align="center">
						<input name="4_7" type="text" class="input" id="textfield18" size="4" maxlength="4" value="9" />
					</div></td>
				</tr>
				<tr>
					<td>City E</td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="5_6" type="text" class="input" id="textfield19" size="4" maxlength="4" value="4" />
					</div></td>
					<td><div align="center">
						<input name="5_7" type="text" class="input" id="textfield20" size="4" maxlength="4" value="13" />
					</div></td>
				</tr>
				<tr>
					<td>City F</td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
					<td><div align="center">
						<input name="6_7" type="text" class="input" id="textfield21" size="4" maxlength="4" value="17" />
					</div></td>
				</tr>
				<tr>
					<td>City G</td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td><div align="center"></div></td>
					<td bgcolor="#CC3333"><div align="center">0</div></td>
				</tr>
			</table>
			<br />
			<br />
			<table border="0" cellspacing="2" cellpadding="0" style='border: 1px solid #999;' align="center">
				<tr>
					<td>Population</td>
					<td align="right"><input name="POPULATION" type="text" class="input" id="POPULATION" value="6" size="5" maxlength="5" /></td>
				</tr>
				<tr>
					<td>Generations</td>
					<td align="right"><input name="GENERATIONS" type="text" class="input" id="GENERATIONS" value="1" size="5" maxlength="5" /></td>
				</tr>
				<tr>
					<td>Elitism</td>
					<td align="right"><input name="ELITISM" type="text" class="input" id="ELITISM" value="5" size="5" maxlength="2" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="button" id="button" value="Calculate Shortest Route" /></td>
				</tr>
			</table>
		</form>


<?php


function pickRandom() {
	$choices = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
	shuffle($choices);
	return implode('',$choices);
}

function convertLetter_toNumber($char) {
	if ($char == 'A')
		return 1;
	else if ($char == 'B')
		return 2;
	else if ($char == 'C')
		return 3;
	else if ($char == 'D')
		return 4;
	else if ($char == 'E')
		return 5;
	else if ($char == 'F')
		return 6;
	else if ($char == 'G')
		return 7;
	else
		die("WHOOPS");
}


if (!empty($_POST)) {
	
	define('NODE_COUNT', 7);	
	$population = $_POST['POPULATION'] + 0;
	if ($population > 999) 
		$population = 999;
	$generations = $_POST['GENERATIONS'] + 0;
	$elitism = $_POST['ELITISM'] + 0;
	$names = array();
	$distances = array();
	$initialPopulation = array();
	$currentPopulation = array();

	for ($i = 1; $i <= NODE_COUNT; $i++) {
		$names[$i] = $_POST['name'.$i];
	}
	
	# RANDOM KROMOSOM :
	for($i = 1; $i <= $population; $i++) {
		$initialPopulation[$i] = pickRandom();
	}

	# INISIALISASI JARAK BERDASARKAN INPUT :
	for ($i = 1; $i <= NODE_COUNT; $i++) {
		for ($j = 1; $j <= NODE_COUNT; $j++) {
			if (isset($_POST[$i . '_' . $j]))
				$distances[$i][$j] = $_POST[$i . '_' . $j];
			else if (isset($_POST[$j . '_' . $i]))
				$distances[$i][$j] = $_POST[$j . '_' . $i];
			else
			$distances[$i][$j] = 0;

/*
			# OPTIONAL DISPLAY :
			$choices = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
			echo $choices[$i-1].$choices[$j-1].' = '.$distances[$i][$j].'<br>';
*/
		}
	}



	for ($k = 1; $k <= $generations; $k++) {
		echo "<div><strong>Generation $k</strong></div>\n";
		
		# Rating population (I do some weird math to figure out their goodness level, not sure if it is good).
		echo "<pre>";
		$a = 0;
		$no = 1;

		$distanceSum = 0;
		$biggest = 0;
		foreach ($initialPopulation AS $entity) {
			$currentPopulation[$a]['kromosom'] = $entity;

			$kromosom[$a] = $currentPopulation[$a]['kromosom'];

			echo '<br>';
			echo 'Kromosom '.($no).' = '.$kromosom[$a].'<br>';

			$letters = str_split($kromosom[$a]);

			$inLetter = '';
			$inNumber = '';

			$fitness[$no] = 0;

			for ($i = 0; $i < NODE_COUNT - 1; $i++) {
				# total FITNESS untuk looping 0 - i-1; 
				$fitness[$no] += $distances[convertLetter_toNumber($letters[$i])][convertLetter_toNumber($letters[$i+1])];

				# menampilkan proses dalam tertulis; 
				$inLetter .= $letters[$i].$letters[$i+1].' + ';
				$inNumber .= $distances[convertLetter_toNumber($letters[$i])][convertLetter_toNumber($letters[$i+1])].' + ';
			}

			# menampilkan info jarak dan menambahkan ke total FITNESS untuk jarak terakhir->pertama atau [i][0]; 
			$inLetter .= $letters[$i].$letters[0];
			$inNumber .= $distances[convertLetter_toNumber($letters[$i])][convertLetter_toNumber($letters[0])];

			$fitness[$no] += $distances[convertLetter_toNumber($letters[$i])][convertLetter_toNumber($letters[0])];

			echo 'Fitness '.$no.' <br>';
			echo $inLetter.'<br>';
			echo $inNumber.' = '.$fitness[$no].'<br>';

			$no++;
		}
		

		# SELEKSI KROMOSOM 		
			echo '<br>SELEKSI KROMOSOM<br>';

			$seleksi = 0;
			for($i=1; $i< NODE_COUNT;$i++){
				$Q[$i] = 1/$fitness[$i];

				$seleksi += $Q[$i];

				echo round($Q[$i], 3).'<br>';
			}
			 

			echo 'SELEKSI TOTAL = '.round($seleksi, 3).'<br>';

		# PROBABILITAS 		
			echo '<br>PROBABILITAS<br>';

			$prob = 0;
			for($i=1; $i< NODE_COUNT;$i++){
				$P[$i] = $Q[$i]/$seleksi;

				echo round($P[$i], 3).'<br>';
			}
			 

		# PROBABILITAS KUMULATIF		
			echo '<br>PROBABILITAS KUMULATIF<br>';
			$probKumulatif = 0;
			for($i=1; $i< NODE_COUNT;$i++){
				$C[$i] = $P[$i]+$probKumulatif;

				$probKumulatif += $P[$i];

				echo round($C[$i], 3).'<br>';
			}

		# ROULLETE WHEEL
			# BUAT RANDOM 0 - 1		
			echo '<br>ROULLETE WHEEL<br>';
			echo '==================<br>';


			for($i=1; $i< NODE_COUNT;$i++){
				$random[$i] = (mt_rand(1, 1000))/1000;

				echo 'RANDOM '.$i.' = '. $random[$i].'<br>';
			}

			#KROMOSOM BARU
			echo '<br>Kromosom Baru<br>';
			for($i=1; $i< NODE_COUNT;$i++){

				$j = 1;
				for($j=1; $j< NODE_COUNT;$j++){
					if($random[$i] < $C[$j]){
						$newC[$i] = $initialPopulation[$j];
						$j = NODE_COUNT;
					}
				}
				echo 'KROMOSOM BARU '.$i.' = '. $newC[$i].'<br>';
			}


		# CROSS OVER
			echo '<br>CROSS OVER<br>';
			echo '==================<br>';

			$Pc = 0.25;

			echo 'Pc = 0.25 <br>';
			echo 'RANDOM CROSS OVER : <br>';
			for($i=1; $i< NODE_COUNT;$i++){
				$Rc[$i] = (mt_rand(1, 1000))/1000;

				echo 'Rc '.$i.' = '. $Rc[$i].'<br>';
			}

			echo 'Rc < Pc , maka : <br>';

			$jmlRc = 0;
			$nomorC = 1;
			for($i=1; $i< NODE_COUNT;$i++){
				if($Rc[$i] < $Pc){
					$Rcx[$i] = $i;

					$RCr[$nomorC] = $newC[$i];
					echo 'Rc terpilih = Rc'. $i.'<br>';
					$jmlRc++;
					$nomorC++;
				}
			}

			echo 'jumlah Rc terpilih = '. $jmlRc.'<br>';
			
			echo 'Bangkitkan R acak sebanyak '.$jmlRc.'  untuk CUT POINT: <br>';
			for($i=1; $i<= $jmlRc; $i++){
				$Racak[$i] = (mt_rand(1, $jmlRc));

				echo 'Racak ke-'.$i.' = '. $Racak[$i].'<br>';
			}

			echo '<br>';
			echo 'MEMASANGKAN KROMOSOM : <br>';
			
			$no_newCr = 1;
			for($i=1; $i<=$jmlRc;$i++){
				if($i<$jmlRc){

					
					$kromosom1 = $RCr[$i]; 
					$kromosom2 = $RCr[($i+1)]; 

				}
				else{
					
					$kromosom1 = $RCr[$i]; 
					$kromosom2 = $RCr[1]; 
				}



				$slicekromosom1 = substr($kromosom1, -(7-$Racak[$i]));
				$slicekromosom2 = substr($kromosom2, -(7-$Racak[$i]));

				$newkromosom1 = substr($kromosom1, 0, -(7-$Racak[$i])) . $slicekromosom2;
				$newkromosom2 = substr($kromosom2, 0, -(7-$Racak[$i])) . $slicekromosom1;


				$newCr[$no_newCr] = $newkromosom1;
				$newCr[$no_newCr+1] = $newkromosom2;

				$no_newCr = $no_newCr+2;

				echo '<br>';
				echo 'Pasangan Kromosom ke-'.$i.' = '.$Racak[$i].' = '. $kromosom1 .'  ><  '. $kromosom2 .' ==>  '. $newkromosom1 .' '.$newkromosom2.'<br>';

			}

	#mutasi 
			


			echo '<br>===========================================================<br>';
	}


}
?>

