<?php

namespace App\Soap\Request;

use App\Soap\Config;
use App\Soap\Model\Sefer;
use App\Soap\Model\SeferBilgileri;
use App\Soap\Model\WsUser;
use App\Soap\Model\Yuk;
use App\Soap\MySoapClient;
use SoapClient;

class SeferBildirimOzeti
{

    public $sonucKodu = null;
    public $sonucMesaji = null;
    public $seferBilgileri = null;
    public $yukListesi = array();
    public $yukler = array();
    public function __construct(WsUser $user, Sefer $sefer)
    {

        $req = new MySoapClient();
        $res = $req->seferBildirimOzeti(array(
            'wsuser' => [
                'kullaniciAdi' => $user->kullaniciAdi,
                'sifre' => $user->sifre
            ],
            'uetdsSeferReferansNo' => $sefer->uetdsSeferReferansNo
        ));

        $this->sonucKodu = $res->return->sonucKodu;
        $this->sonucMesaji = $res->return->sonucMesaji;
        $this->seferBilgileri = isset($res->return->seferBilgileri) ? new SeferBilgileri($res->return->seferBilgileri) : null;
        $this->yukListesi = isset($res->return->yukListesi) ?  $this->setArray($res->return->yukListesi) : array();
        $this->yukler =  isset($res->return->yukListesi) ? $this->getYukListesi()  : array();
    }

    public function getYukListesi()
    {
        $temp = array();

        foreach ($this->yukListesi as $row) {
            $yuk = new YukBildirimiDetayiV2(Config::WsUser(), $row->uetdsYukReferansNo);
            array_push($temp, $yuk);
        }

        return $temp;
    }

    private function setArray($arr)
    {
        $temp = array();

        if (gettype($arr) == 'object') {
            array_push($temp, new Yuk($arr));
        } else {
            foreach ($arr as $val) {
                array_push($temp, new Yuk($val));
            }
        }
        return $temp;
    }
}

/*



uetdsYukReferansNo
aliciUnvan
aliciVergiNo
bildirimTarihi
bosaltmaUlkeKodu
bosaltmaUlkeAdi
bosaltmaIlAdi
bosaltmaIlMernisKodu
bosaltmaIlceAdi
bosaltmaIlceMernisKodu
bosaltmaSaati
bosaltmaTarihi
durum
iptalTurKodu
iptalTurAciklama
iptalAciklama
iptalTarihi
gonderenUnvan
gonderenVergiNo
sonGuncellemeTarihi
tasimaBedeli
tasimaBedeliParaBirimi
yukBirimi
yukCinsAdi
yukCinsId
yukMiktari
yuklemeUlkeKodu
yuklemeUlkeAdi
yuklemeIlAdi
yuklemeIlMernisKodu
yuklemeIlceAdi
yuklemeIlceMernisKodu
yuklemeSaati
yuklemeTarihi
firmaYukNo
yukDigerAciklama

*/
