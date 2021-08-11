<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\Sefer;
use App\Soap\Model\SeferBilgileri;
use App\Soap\Model\SeferBilgileriInput;
use App\Soap\Model\TasimaTuruKodu;
use App\Soap\Model\TehlikeliMaddeTasimaSekli;
use App\Soap\Model\UetdsEsyaSonuc;
use App\Soap\Model\WsUser;
use App\Soap\Model\Yuk;
use App\Soap\Model\YukBirimi;
use App\Soap\Model\YukTuru;
use App\Soap\MySoapClient;
use SoapClient;

class YeniSeferEkleV3
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $seferId;
    public $firmaSeferNo;

    public function __construct(WsUser $user, SeferBilgileriInput $seferBilgileriInput)
    {
        $req = new MySoapClient();
        $res = $req->yeniSeferEkleV3(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
            'seferBilgileriInput' => $seferBilgileriInput->toArray(),
        ));
        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;
        $this->seferId = isset($res->return->seferId) ? $res->return->seferId : null;
        $this->firmaSeferNo = isset($res->return->firmaSeferNo) ? $res->return->firmaSeferNo : null;
    }
}
