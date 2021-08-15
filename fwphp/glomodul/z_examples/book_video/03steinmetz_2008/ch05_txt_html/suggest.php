<?php

function suggest_spelling($string) {
    //suggest words for misspelled strings
    $dict_config = pspell_config_create('en', 'american');
    pspell_config_personal($dict_config, '/tmp/custom.pws');
    pspell_config_ignore($dict_config, 2); 
    pspell_config_mode($dict_config, PSPELL_FAST); 
    $dictionary = pspell_new_config($dict_config);

    // pspell_add_to_personal($dictionary, "doofburger");
    // pspell_save_wordlist($dictionary);

    $dictionary = pspell_new_config($dict_config);
	
    //Make sure we know whether we've suggested anything
    $suggested_replacement = false;

    //Now we've got it set up, break it up by words
    $string = explode(' ', $string); 
    foreach ($string as $key=>$value) {
        $value = trim(str_replace(',', '', $value));
        if ( (strlen($value) > 3) && (! pspell_check($dictionary, $value)) ) {
            //If we can't find a suggestion
            $suggestion = pspell_suggest($dictionary, $value); 
	      //Suggestions are case sensitive, so check first
            if (strtolower($suggestion[0]) != strtolower($value)) {
                $string[$key] = $suggestion[0]; 
                $suggested_replacement = true;
            }
        }
    }

    if ($suggested_replacement) {
        //We had a suggestion, so return the data
        return implode(' ', $string); 
    } else {
        return null;
    }
}

print suggest_spelling("doofburger");

print "\n";

?>
