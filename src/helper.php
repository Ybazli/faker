<?php 
namespace Ybazli\Faker;


// string helper	
if (!function_exists('string')) {
    function string($value)
    {
        return (string)$value;
    }
}
//get rand int
if(! function_exists('randomNumber')){
    function randomNumber($length = 20, $int = false)
    {
        $numbers = "0123456789";

        $number  = '';

        for($i = 1;$i <= $length;$i++){
            $num = $numbers[rand(0,strlen($numbers) - 1)];
            
            if($num == 0 && $i == 1){
                $i = 1;
                continue;
            }

            $number .= $num ;
        }

        if($int){
            return (integer)$number;
        }

        return string($number);
    }
}