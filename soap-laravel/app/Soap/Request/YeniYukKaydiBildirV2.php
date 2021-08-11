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

class YeniYukKaydiBildirV2
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $uetdsSeferReferansNo;
    public $firmaSeferNo;
    public $uetdsEsyaSonuc = array();
    /**
     * 
     * @param $yukBilgileriListInput List<YukBilgileriInput>
     * 
     */
    public function __construct(WsUser $user, SeferBilgileriInput $seferBilgileriInput, $yukBilgileriListInput)
    {
        $req = new MySoapClient();
        $res = $req->yeniYukKaydiBildirV2(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
            'seferBilgileriInput' => $seferBilgileriInput->getValues(),
            'yukBilgileriListInput' => $yukBilgileriListInput
        ));

        if (gettype($res->return) == 'array') {
            $this->sonucKodu = $res->return[0]->sonucKodu;
            $this->sonucMesaji = $res->return->sonucMesaji;
            $this->uetdsSeferReferansNo = isset($res->return[0]->uetdsSeferReferansNo) ? $res->return[0]->uetdsSeferReferansNo : null;
            $this->firmaSeferNo = isset($res->return[0]->firmaSeferNo) ? $res->return[0]->firmaSeferNo : null;
            $this->uetdsEsyaSonuc = isset($res->return[0]->uetdsEsyaSonuc) ? $this->setArray($res->return[0]->uetdsEsyaSonuc) : null;
        } else {
            $this->sonucKodu = $res->return->sonucKodu;
            $this->sonucMesaji = $res->return->sonucMesaji;
            $this->uetdsSeferReferansNo = isset($res->return->uetdsSeferReferansNo) ? $res->return->uetdsSeferReferansNo : null;
            $this->firmaSeferNo = isset($res->return->firmaSeferNo) ? $res->return->firmaSeferNo : null;
            $this->uetdsEsyaSonuc = isset($res->return->uetdsEsyaSonuc) ? $this->setArray($res->return->uetdsEsyaSonuc) : null;
        }
    }


    private function setArray($arr)
    {
        $temp = array();
        foreach ($arr as $val) {
            array_push($temp, new UetdsEsyaSonuc($val));
        }
        return $temp;
    }
}
