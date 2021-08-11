<?php

namespace App\Soap;

use Exception;
use SoapClient;

class SoapConnection
{

    private static $con = null;

    public static function getConnection($authData)
    {
        if (!self::$con) {

            self::$con = self::makeConnection($authData);
        }
        return self::$con;
    }


    private static function makeConnection($authData)
    {
        try {
            new SoapClient(Config::getApiUri());
            return new SoapClient(Config::getApiUri(), $authData);
        } catch (Exception $e) {
            return self::makeConnection($authData);
        }
    }
}
