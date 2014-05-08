<?php

function goldbach($num = 0) {
	$prime = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
	$diff = array();
	$nums = array();
	
	if($num <= 0) {
		return '';
	}
	
	$i = 0;
	foreach($prime as $k => $v) {
		$diff[$k] = $num - $v;
		
		if(in_array($diff[$k], $prime) && (!in_array($v, $diff) || $v == $diff[$k])) {
			$nums[$i][] = $v;
			$nums[$i][] = $diff[$k];
			
			$i++;
		}
	}
	
	foreach($nums as &$value) {
		$value = implode(', ', $value);
	}
	
	return '[(' . implode('), (', $nums) . ')]';
}

echo goldbach(4), '<br>';
echo goldbach(6), '<br>';
echo goldbach(8), '<br>';
echo goldbach(10), '<br>';
echo goldbach(100), '<br>';
echo goldbach(50); // MY EXAMPLE
