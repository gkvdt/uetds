<?php

namespace App\Soap\Model;


class UetdsSurucuVizeBasvuruInput extends SoapModel
{


    public $tcKimlikNo;
    public $pasaportNo;
    public function __construct($tcKimlikNo,$pasaportNo)
    {
     $this->tcKimlikNo = $tcKimlikNo;
     $this->pasaportNo = $pasaportNo;
    }
}
