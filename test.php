<pre><?php


$tab = [
[2,1,1,1,2,2,2,2,2],
[1,1,2,2,0,2,1,2],
[2,2,2,2,2,1,1,1],
[1,1,1,1,2,3],
[2,2,2,2,2,2],
[1],
[1,1,1,1,1]
];

function show($tab){

	/*for($i =0; $i<count($tab); $i++){
		for($j =0; $j<count($tab[$i]); $j++){
			if(isset($tab[$i][$j])) echo $tab[$i][$j]." ";
		}
		echo "\n";
	}*/
	
	foreach($tab as $c){
		ksort($c);
	foreach($c as $r){
		echo $r." ";
	}
	echo "\n";
  }
	
}



function findZero($tab){
	for($i =0; $i<count($tab); $i++){
		for($j =0; $j<count($tab[$i]); $j++){
			if($tab[$i][$j] == 0){
				return [$i,$j];
			}
		}
	}
	return false;
}

function up(&$tab){
	$zero = findZero($tab);
	$x = $zero[0]; $y = $zero[1];
	$w=null;
	if(isset($tab[$x-1][$y])){
		$w = $tab[$x-1][$y];
	}
	$del=true;
	
	for($i=$x; $i<count($tab) -1; $i++){
		if(isset($tab[$i+1][$y])){
			$tab[$i][$y] = $tab[$i+1][$y];
			if($tab[$i][$y] == $w && $del == true){
				unset($tab[$i][$y]);
			} else {
				$del =false;
			}
		} else {
			unset($tab[$i][$y]);
			break;
		}
	}
	$tab[$x][$y] = 0;
	
	$del=true;
	for($i=$x-1; $i>=0; $i--){
			if($tab[$i][$y] == $w && $del == true){
				unset($tab[$i][$y]);
			} else {
				$del =false;
			}
	}
	$del=true;
	for($j=$y+1; $j<count($tab[$x]) -1; $j++){

			if($tab[$x][$j] == $w && $del == true){
				unset($tab[$x][$j]);
			} else {
				$del =false;
			}
	}
	$del=true;
	for($j=$y-1; $j>0; $j--){

			if($tab[$x][$j] == $w && $del == true){
				unset($tab[$x][$j]);
			} else {
				$del =false;
			}
	}
	ksort($tab);
//print_r($tab);
	/*for($i=$x; $i<count($tab); $i++){
		if(isset($tab[$i][$y]) && $tab[$i][$y] == $w){
			unset($tab[$i][$y]);
			//echo 'ok';
		} else {
		return false;
		}
		
		
		
	}*/
	
}



show($tab);
//print_r(findZero($tab));
echo "\n UP \n\n";
up($tab);
show($tab);
//print_r($tab);

	

?></pre>