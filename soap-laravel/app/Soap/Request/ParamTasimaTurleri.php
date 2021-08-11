<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\Ip;
use App\Soap\Model\TasimaTuru;
use App\Soap\Model\User;
use App\Soap\Model\WsUser;
use App\Soap\MySoapClient;
use SoapClient;

class ParamTasimaTurleri
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $tasimaTuruListesi = null;
    public function __construct(WsUser $user)
    {

        $req = new MySoapClient();
        $res = $req->paramTasimaTurleri(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
        ));
        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;
        $this->tasimaTuruListesi = $this->tasimaTuruAta($res->return->tasimaTuruListesi);
    }

    private function tasimaTuruAta($list)
    {
        $result = [];

        foreach ($list as $row) {
            array_push($result, new TasimaTuru($row));
        }
        return $result;
    }
}
