<?php

namespace App\Country\Domain;
enum CountryCode
{
    case PL;
    case DE;
    case ES;
    case GB;

    public static function from(string $name){

        return constant("self::$name");
    }
}
