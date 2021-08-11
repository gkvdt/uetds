<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\WsUser;
use App\Soap\MySoapClient;
use SoapClient;

class AracMuayeneSorgula
{



    public $muayeneGecerlilikTarihi;
    public $sonucKodu;
    public $sonucMesaji;

    public function __construct(WsUser $user, $plaka)
    {
        $req = new MySoapClient();
        $res = $req->aracMuayeneSorgula(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
            'plaka' => $plaka
        ));
        $this->muayeneGecerlilikTarihi = $res->return->muayeneGecerlilikTarihi;
        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;
    }
}
