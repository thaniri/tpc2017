<?php
/**
* This method rejects any inputs that have an injection
*
* @param $anInput
*
* @return boolean //true if injection found
*/

function validateServerSide($anInput){
    $anInput = trim($anInput);
    $truther = false;
    if(preg_match('/\b(ALTER|CREATE|DELETE|DROP|EXEC(UTE){0,1}|INSERT( +INTO){0,1}|MERGE|SELECT|UPDATE|UNION( +ALL){0,1})\b|<|>|^$/', $anInput)){
        $truther = true;
    }
    else{
        $truther = false;
    }
    return $truther;
}
?>