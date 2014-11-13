<?php
/**
 * aotu load file
 * @param string $file
 */
function autoload($file=''){
	if($file!=''){
		include_once($file);
	}
}

