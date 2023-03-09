<?php
session_start();


function Message(){
    if(isset($_SESSION["ErrorMessage"])){
      if (is_array($_SESSION['ErrorMessage'])) $_SESSION['ErrorMessage'] = '' ;
       $Output="<div class=\"alert alert-danger\">" ;
       $Output.=htmlentities($_SESSION["ErrorMessage"]);
       $Output.="</div>";
       $_SESSION["ErrorMessage"]=null;
       return $Output;
        
        
    }
}


function SuccessMessage(){
    if(isset($_SESSION['SuccessMessage'])){
       if (is_array($_SESSION['SuccessMessage'])) $_SESSION['SuccessMessage'] = '' ;
            //echo '<pre><b>ses_suc_msg=</b>='; print_r($_SESSION['SuccessMessage']); echo '</pre>';
       $Output="<div class=\"alert alert-success\">" ;
       $Output.=htmlentities($_SESSION['SuccessMessage']);
       $Output.="</div>";
       $_SESSION['SuccessMessage']=null;
       return $Output;
        
        
    }
}

