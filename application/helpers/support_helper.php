<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function io_date_format($var,$format){

    if(trim($var)==''){

        $mydate = NULL;
    }
    else{

        $date   = date_create($var);
        $mydate = date_format($date,$format);
    }

    return $mydate;
}

function io_return_date($format,$value){

	$value 	= date_parse_from_format($format,$value);
	$idate 	= $value['year'].'/'.$value['month'].'/'.$value['day'];

	return $idate;
}

function io_random_string($length=10){

    $characters         = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength   = strlen($characters);    
    $randomString       = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}

function intPart($float){
    
    if ($float < -0.0000001)
        return ceil($float - 0.0000001);
    else
        return floor($float + 0.0000001);
}