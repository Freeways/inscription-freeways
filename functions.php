<?php

function sec($in){

			$in = mysql_real_escape_string($in);
			$in = addcslashes($in, '%_');
			$in=trim($in);
			$in=strip_tags($in);	
			return $in;
}

?>
