<?php

namespace App\Soap\Model;

class WsUser extends SoapModel{

    public $kullaniciAdi;
    public $sifre;


    public function __construct($kullaniciAdi,$sifre)
    {
        $this->kullaniciAdi = $kullaniciAdi;
        $this->sifre  = $sifre;

    }


}


