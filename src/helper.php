<?php
namespace Ybazli\Faker;

// string helper
if (!function_exists('string')) {
    function string($value)
    {
        return (string) $value;
    }
}
//get rand int
if (!function_exists('randomNumber')) {
    function randomNumber($length = 20, $int = false)
    {
        $numbers = "0123456789";

        $number = '';

        for ($i = 1; $i <= $length; $i++) {
            if ($i == 1) {
                $num = $numbers[rand(1, strlen($numbers) - 1)];
            } else {
                $num = $numbers[rand(0, strlen($numbers) - 1)];
            }

            $number .= $num;
        }

        if ($int) {
            return (integer) $number;
        }

        return string($number);
    }
}
