<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\Arac;
use App\Soap\Model\BildirimDetayi;
use App\Soap\Model\Sefer;
use App\Soap\Model\SeferBilgileri;
use App\Soap\Model\SeferBilgileriInput;
use App\Soap\Model\TasimaTuruKodu;
use App\Soap\Model\TehlikeliMaddeTasimaSekli;
use App\Soap\Model\WsUser;
use App\Soap\Model\Yuk;
use App\Soap\Model\YukBirimi;
use App\Soap\Model\YukTuru;
use App\Soap\MySoapClient;
use SoapClient;

class YukBildirimiDetayiV2
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $bildirimDetayi = null;

    public function __construct(WsUser $user, $uetdsYukReferansNo)
    {
        $req = new MySoapClient();
        $res = $req->yukBildirimiDetayiV2(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
            'uetdsYukReferansNo' => $uetdsYukReferansNo
        ));

        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;
        $this->bildirimDetayi = isset($res->return->bildirimDetayi)  ? new BildirimDetayi($res->return->bildirimDetayi) : null;
    }


    private function setArray($arr)
    {
        $temp = array();
        foreach ($arr as $val) {
            array_push($temp, new Yuk($val));
        }
        return $temp;
    }
}
