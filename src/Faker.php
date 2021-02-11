<?php
/**
 * Ybazli/Faker package
 * @ybazli
 */

namespace Ybazli\Faker;

use Illuminate\Support\Str;

class Faker
{
    /**
     * @var array
     */
    private $libs;

    /**
     * Faker constructor.
     */
    public function __construct()
    {
        //include librrary array
        $this->libs = require __DIR__ . '/libs/library.php';

        // custom helper include
        require_once 'helper.php';
    }

    /**
     * @param string $key
     * @return string
     */
    private function getRandomKey(string $key = ''): string
    {
        if(empty($key)){
            $item = array_rand($this->libs);
        }else{
            $item = $this->libs[$key];
        }

        return (string) $item;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->getRandomKey('firstName');
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        $firstName = $this->getRandomKey('firstName');
        $lastName = $this->getRandomKey('lastName');

        return $firstName . ' ' . $lastName;
    }

    /**
     * @param int $count
     * @return string
     */
    public function email(int $count = 0): string
    {
        if ($count) {
            $mail = strtolower(Str::random($count));
        } else {
            $mail = strtolower(Str::random(rand(6, 10)));
        }

        return  $mail . $this->getRandomKey('email');
    }

    /**
     * @return string
     */
    public function jobTitle(): string
    {
        return $this->getRandomKey('jobTitle');
    }

    /**
     * @return string
     */
    public function word()
    {
        return $this->getRandomKey('word');
    }

    /**
     * @return string
     */
    public function sentence(): string
    {
        return $this->getRandomKey('sentence') . '.';
    }

    /**
     * @return string
     */
    public function paragraph(): string
    {
        return $this->getRandomKey('paragraph') . '.';
    }

    /**
     * @return int
     */
    public function mobile(): string
    {
        $prefix = $this->getRandomKey('mobile');
        $phone = string('0' . $prefix . randomNumber(7));

        return (strlen($phone) !== 11 ? $phone . rand(1, 9) : $phone);
    }

    /**
     * @return string
     */
    public function telephone(): string
    {
        $prefix = $this->getRandomKey('tellphone');

        return string('0' . $prefix . randomNumber(7));
    }

    /**
     * @return string
     */
    public function city(): string
    {
        return $this->getRandomKey('city');
    }

    /**
     * @return string
     */
    public function state(): string
    {
        return $this->getRandomKey('state');
    }

    /**
     * @param int $length
     * @return string
     */
    public function domain(int $length = 0): string
    {
        if ($length) {
            $domainName = strtolower(Str::random($length));
        } else {
            $domainName = strtolower(Str::random(rand(5, 8)));
        }

        return $this->getRandomKey('protocol') . '://' . 'www.' . $domainName . '.' . $this->getRandomKey('domain');
    }

    /**
     * @return string
     */
    public function mellicode(): string
    {
        return (string) randomNumber(10);
    }

    /**
     * @param string $sign
     * @return string
     */
    public function birthday(string $sign = ''): string
    {
        $year = rand(1333, 1380);
        $month = rand(1, 12);
        $day = rand(1, 30);
        $date = "$year/$month/$day";
        if (!empty($sign)) {
            $date = str_replace('/', $date, $sign);
        }

        return $date;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        $firstName = $this->getRandomKey('firstName');

        $lastName = $this->getRandomKey('lastName');
        $lastName2 = $this->getRandomKey('firstName');

        return $firstName . ' ' . $lastName2 . ' ' . $lastName;
    }

    /**
     * @param int $min
     * @param int $max
     * @return int
     */
    public function age(int $min = 0, int $max = 0): int
    {
        if ($min && $max) {
            $age = rand($min, $max);
        } else {
            $age = rand(18, 50);
        }

        return $age;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->getRandomKey('address');
    }

    /**
     * @return string
     */
    public function company(): string
    {
        return $this->getRandomKey('company');
    }

    /**
     * @return string
     */
    public function shabaCode(): string
    {
        return (string) randomNumber(24);
    }
}
