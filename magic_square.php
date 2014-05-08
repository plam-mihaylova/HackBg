<?php

function magic_square($matrix = array()) {
	$rows = count($matrix);
	$sum = array('v' => array(), 'h' => array(), 'd' => array(0, 0));
	
	if($rows == 0) {
		return FALSE;
	}
	
	foreach($matrix as $k => $row) {
		if($rows != count($row)) {
			return FALSE;
		}
		
		$sum['d'][0] += $matrix[$k][$k];
		$sum['d'][1] += $matrix[($rows - $k - 1)][$k];
		
		$sum['h'][$k] = 0;
		foreach($row as $i => $num) {
			$sum['h'][$k] += $num;
			if(!isset($sum['v'][$i])) {
				$sum['v'][$i] = 0;
			}
			$sum['v'][$i] += $num;
		}
	}
	
	$num = 0;
	
	foreach($sum as $s) {
		foreach($s as $n) {
			if($num == 0) {
				$num = $n;
			}
			
			if($num != $n) {
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

echo magic_square([[1,2,3], [4,5,6], [7,8,9]]) ? 'True' : 'False', '<br>';
echo magic_square([[4,9,2], [3,5,7], [8,1,6]]) ? 'True' : 'False', '<br>';
echo magic_square([[7,12,1,14], [2,13,8,11], [16,3,10,5], [9,6,15,4]]) ? 'True' : 'False', '<br>';
echo magic_square([[23, 28, 21], [22, 24, 26], [27, 20, 25]]) ? 'True' : 'False', '<br>';
echo magic_square([[16, 23, 17], [78, 32, 21], [17, 16, 15]]) ? 'True' : 'False', '<br>';
echo magic_square([[2,2,2], [2,2,2], [2,2,2]]) ? 'True' : 'False', '<br>'; // MY EXAMPLE MATRIX
