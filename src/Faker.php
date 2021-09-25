<?php
/**
 * Ybazli/Faker package
 * @ybazli
 */

namespace Ybazli\Faker;

use Illuminate\Support\Str;

class Faker
{
    private $library;

    public function __construct()
    {
        //include library array
        $this->library = require __DIR__ . '/libs/library.php';
    }

    /**
     * return random data in object
     * $object is a name of index of library
     * @param string $key
     * @return string
     */
    private function getRandomKey(string $key): string
    {
        $array = $this->library[$key];

        return (string)$array[array_rand($array)];
    }

    /**
     * return a random first name
     * @return string
     */
    public function firstName(): string
    {
        return $this->getRandomKey('firstName');
    }

    /**
     * return a random last name
     * @return string
     */
    public function lastName(): string
    {
        return $this->getRandomKey('firstName') . ' ' . $this->getRandomKey('lastName');
    }

    /**
     * return a random email address .
     * it's a random and fake email address not ussable
     * gmail , yahoo , msn , hotmail domain
     * $count is length of email address string
     * if not set parameters to method auto return random between 6-10 length string
     *
     * @param int $count
     * @return string
     */
    public function email(int $count = 0): string
    {
        if (!$count) {
            $count = rand(6, 10);
        }

        $mail = strtolower(Str::random($count));

        return $mail . $this->getRandomKey('email');
    }

    /**
     * return a random of job title
     * @return string
     */
    public function jobTitle(): string
    {
        return $this->getRandomKey('jobTitle');
    }

    /**
     * return a random word
     * @return string
     */
    public function word(): string
    {
        return $this->getRandomKey('word');
    }

    /**
     * return a random sentence
     * @return string
     */
    public function sentence(): string
    {
        return $this->getRandomKey('sentence') . '.';
    }

    /**
     * return a random paragraph
     * @return string
     */
    public function paragraph(): string
    {
        return $this->getRandomKey('paragraph') . '.';
    }

    /**
     * * return a random mobile phone number
     * return random 10 length number with iranian mobile code like : 0912 , ...
     *
     * @param string $code
     * @return string
     */
    public function mobile(string $code = '+98'): string
    {
        $cityCode = $this->getRandomKey('mobile');

        return (string)$code . $cityCode . $this->generateRandomStringInteger(7);
    }

    /**
     * @param string $countryCode
     * @return string
     */
    public function telephone(string $countryCode = '0'): string
    {
        $cityCode = $this->getRandomKey('telephone');

        return (string)$countryCode . $cityCode . $this->generateRandomStringInteger(7);
    }

    /**
     * return random city of iran
     * @return string
     */
    public function city(): string
    {
        return $this->getRandomKey('city');
    }

    /**
     * random state of iran
     * @return string
     */
    public function state(): string
    {
        return $this->getRandomKey('state');
    }

    /**
     * return a random domain address .
     * $length is length of domain name
     * if not set parameter to method auto return random between 5-8 length string
     * TLD's are like com , net , ir , co , co.ir , ...
     * random web protocol http & https
     * @param int $length
     * @return string
     */
    public function domain(int $length = 0): string
    {
        if (!$length) {
            $length = rand(5, 8);
        }

        $domainName = strtolower(Str::random($length));

        return $this->getRandomKey('protocol') . '://' . $domainName . '.' . $this->getRandomKey('domain');
    }

    /**
     * 10 length random number
     * @return int
     */
    public function melliCode(): int
    {
        return $this->generateRandomStringInteger(10);
    }

    /**
     * return a random birthday date
     * year starting from 1333 / 1380
     * $sign to sign between year mouth year
     * default sign is '/'
     * return year/mouth/day
     * @param string $sign
     * @return string
     */
    public function birthday(string $sign = '/'): string
    {
        $year = rand(1333, 1380);
        $mouth = rand(1, 12);
        $day = rand(1, 30);

        return $year . $sign . $mouth . $sign . $day;
    }

    /**
     * random first name and last name together
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    /**
     * * you can use $min for minimum start age and max for maximum age
     * if $min and $max is null return random age between 18-50 years;
     * @param int $min
     * @param int $max
     * @return int
     */
    public function age(int $min = 18, int $max = 50): int
    {
        return rand($min, $max);
    }

    /**
     * random fake address
     * @return string
     */
    public function address(): string
    {
        return $this->getRandomKey('address');
    }

    /**
     * random company name
     * @return string
     */
    public function company(): string
    {
        return $this->getRandomKey('company');
    }

    /**
     * generate 24 length random number for ShabaCode
     * @return int
     */
    public function shabaCode(): int
    {
        return $this->generateRandomStringInteger(24);
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateRandomStringInteger(int $length = 20): string
    {
        $stringInteger = '';

        for ($i = 1; $i <= $length; $i++) {
            $num = rand(0, 9);

            $stringInteger .= $num;
        }

        return (string)$stringInteger;
    }
}
