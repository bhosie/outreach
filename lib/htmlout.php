<?php
//
//Ensures proper html output
//
//

	//passes &text through htmlspecialchars()
	function html($text){
		return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
	}
	
	//shortcut to above function, because we're lazy.
	function htmlout($text){
		echo html($text);
	}
		

?>
