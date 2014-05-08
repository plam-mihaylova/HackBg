<?php

function reduce_file_path($path = '') {
	$current = array();

	$path = trim($path, '/');
	
	if(!preg_match('/\//', $path)) {
		return '/' . str_replace(array('..', '.'), '', $path);
	}
	
	$current = explode('/', $path);
	
	foreach($current as $k => $v) {
		if(empty($v)) {
			unset($current[$k]);
		}
	
		if(preg_match('/\./', $v)) {
			unset($current[$k]);
		}
		
		if(preg_match('/\.\./', $v)) {
			unset($current[($k - 1)]);
			unset($current[$k]);
		}
	}
	
	return '/' . implode('/', $current);
}

echo reduce_file_path('/') . '<br>';
echo reduce_file_path('/sry/') . '<br>';
echo reduce_file_path('/srv/../') . '<br>';
echo reduce_file_path('/srv/www/htdocs/wtf/') . '<br>';
echo reduce_file_path('/srv/www/htdocs/wtf') . '<br>';
echo reduce_file_path('/srv/./././././') . '<br>';
echo reduce_file_path('/etc//wtf/') . '<br>';
echo reduce_file_path('/etc/../etc/../etc/../') . '<br>';
echo reduce_file_path('//////////////') . '<br>';
echo reduce_file_path('/../') . '<br>';
