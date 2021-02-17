<?php
class PanValidateHelper
{
    
    
    /*
    
    for example : AAAAA9999A
    
        * First five characters are letters (A-Z),
        * Next 4 numerics (0-9),
        * last character letter (A-Z)
        
        The fourth(4th) character of the PAN must be one of the following, depending on the type of assessee:
        
        C — Company
        P — Person
        H — Hindu Undivided Family (HUF)
        F — Firm
        A — Association of Persons (AOP)
        T — AOP (Trust)
        B — Body of Individuals (BOI)
        L — Local Authority
        J — Artificial Juridical Person
        G — Govt

        fifth(5th) character of the PAN is the first character in the surname of the person
        
     */
    
    
    public static function isPanValid($panNumber) {
        $value = strtoupper($panNumber);
        $pattern = '/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/';
       
        $result = preg_match($pattern, $value);
        if ($result) {
            $findme = ucfirst(substr($value, 3, 1));
            $mystring = 'CPHFATBLJG';
            $pos = strpos($mystring, $findme);
            if ($pos === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
