<?php 

class Helper{
    
    //Add methods here
    
    public function passwordsMatch($pw1, $pw2){
        if ($pw1 == $pw2)
            return true;
        else
            return false;
    }
    
    public function isValidLength($str, $min = 8, $max = 20){
        if (strlen($str) < $min || strlen($str) > $max)
            return false;
        else
            return true;
    }
    
    public function isEmpty($postValues){
        
        foreach ($postValues as $value){
            if ($value == '')
                return true;
        }
        
        return false;
        
    }
    
    public function isSecure($pw){
        
        if (preg_match("~[A-Z]+~", $pw) && preg_match("~[a-z]+~", $pw) && preg_match("~[0-9]+~", $pw))
            return true;
        else
            return false;
        
    }

    public function keepValues($val, $type, $attr=''){
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo $val;
                break;
            case 'select':
                if ($val == $attr)
                    echo 'selected';
                break;
            default:
                echo '';
        }

    }
}