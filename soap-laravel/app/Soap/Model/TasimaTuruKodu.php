<?php
namespace App\Soap\Model;


class TasimaTuruKodu {

    public static $tehlikeli = 1;
    public static $diger = 2;

    public $kod;

    public function __construct($kod = 1)
    {
        $this->kod = $kod;        
    }




    public static function tehlikeli(){  return new TasimaTuruKodu(1);}
    public static function diger(){  return new TasimaTuruKodu(2);}



}