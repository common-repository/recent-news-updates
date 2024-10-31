<?php

/* for get the X words from perticuler string */
function run_get_counted_word( $new_string, $str_chr_count = 140 ) {
    
    
    
  	$new_string_arr = explode( ' ', $new_string );
  	$return_str = '';
  	for( $i=0; $i < count($new_string_arr); $i++ ) {
  	
  		
  		if( strlen($return_str.' '.$new_string_arr[$i]) >= $str_chr_count ) {
  			break;
  		} else {
  			$return_str = $return_str.' '.$new_string_arr[$i];  		
  		}
  	}  	
  	
	return $return_str;
}