<?php
namespace App\Soap\Model;


class TasimaTuru {


    public $kodu;
    public $aciklama;

    public function __construct($args)
    {
        $this->kodu = $args->kodu;        
        $this->aciklama = $args->aciklama;        
    }




    public static function tehlikeli(){  return new TasimaTuruKodu(1);}
    public static function diger(){  return new TasimaTuruKodu(2);}



}