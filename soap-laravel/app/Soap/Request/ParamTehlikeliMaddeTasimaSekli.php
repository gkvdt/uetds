<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\TehlikeliMaddeTasimaSekli;
use App\Soap\Model\WsUser;
use App\Soap\MySoapClient;
use SoapClient;

class ParamTehlikeliMaddeTasimaSekli
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $tehlikeliMaddeTasimaSekliListe = array();
    public function __construct(WsUser $user)
    {
        
        $req = new MySoapClient();
        $res = $req->paramTehlikeliMaddeTasimaSekli(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
        ));
        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;

        $this->tehlikeliMaddeTasimaSekliListe = $this->setArray($res->return->tehlikeliMaddeTasimaSekliListesi);


    }


    private function setArray($arr){
        $temp = array();
        foreach ($arr as $val) {
            array_push($temp,new TehlikeliMaddeTasimaSekli($val));
        }
        return $temp;
    }



}
