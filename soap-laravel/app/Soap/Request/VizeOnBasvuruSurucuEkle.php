<?php

namespace App\Soap\Request;

use App\Soap\Model\UetdsSurucuVizeBasvuruInput;
use App\Soap\Model\WsUser;
use App\Soap\MySoapClient;

class VizeOnBasvuruSurucuEkle
{
    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $islemSonuc = null;
    public function __construct(WsUser $user, UetdsSurucuVizeBasvuruInput $uetdsSurucuVizeBasvuruInput)
    {
        $req = new MySoapClient();
        $res = $req->vizeOnBasvuruSurucuEkle([
            'wsuser' => $user->toArray(),
            'uetdsSurucuVizeBasvuruInput' => $uetdsSurucuVizeBasvuruInput->toArray(),
        ]);
        print_r(json_encode($res));
    }
}
