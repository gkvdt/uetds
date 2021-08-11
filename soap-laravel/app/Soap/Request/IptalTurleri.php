<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\Ip;
use App\Soap\Model\IptalTuru;
use App\Soap\Model\WsUser;
use App\Soap\MySoapClient;
use SoapClient;

class IptalTurleri
{

    public $iptalTurleriListesi = array();
    public function __construct(WsUser $user)
    {
       
        $req = new MySoapClient();
        
        $res = $req->iptalTurleri(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
        ));
        $this->iptalTurleriListesi = $this->setArray($res->return->iptalTuruListesi);
    }

    private function setArray($arr){
        $temp = array();
        foreach ($arr as $val) {
            array_push($temp,new IptalTuru($val));
        }
        return $temp;
    }

}
