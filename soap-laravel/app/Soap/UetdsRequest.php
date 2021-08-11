<?php

namespace App\Soap;

use App\Soap\Model\Arac;
use App\Soap\Model\Ip;
use App\Soap\Model\TasimaTuruKodu;
use App\Soap\Model\User;
use App\Soap\Model\WsUser;
use App\Soap\Request\ParamYukBirimi;
use App\Soap\Request\ParamYukTuru;
use App\Soap\Request\ParamTehlikeliMaddeTasimaSekli;
use App\Soap\Request\IptalTurleri;
use App\Soap\Request\YetkiBelgesiKontrol;
use App\Soap\Request\AracMuayeneSorgula;
use App\Soap\Request\MeslekiYeterlilikSorgula;
use App\Soap\Request\IpTanimla;
use App\Soap\Request\IpListele;
use App\Soap\Request\IpSil;

class UetdsRequest
{

    private $wsUser;
    public function __construct(WsUser $wsUser)
    {
        $this->wsUser = $wsUser;
    }
    public function ParamYukBirimi(TasimaTuruKodu $tasimaTuruKodu)
    {
        return new  ParamYukBirimi($this->user, $tasimaTuruKodu);
    }
    public function ParamYukTuru(TasimaTuruKodu $tasimaTuruKodu)
    {
        return new  ParamYukTuru($this->user, $tasimaTuruKodu);
    }
    public function IptalTurleri()
    {
        return new  IptalTurleri($this->user);
    }
    public function ParamTehlikeliMaddeTasimaSekli()
    {
        return new  ParamTehlikeliMaddeTasimaSekli($this->user);
    }
    public function YetkiBelgesiKontrol(Arac $arac)
    {
        return new  YetkiBelgesiKontrol($this->user, $arac);
    }
    public function AracMuayeneSorgula(Arac $arac)
    {
        return new  AracMuayeneSorgula($this->user, $arac->plaka);
    }
    public function MeslekiYeterlilikSorgula(User $u)
    {
        return new  MeslekiYeterlilikSorgula($this->user, $u);
    }
    public function IpTanimla(Ip $ip)
    {
        return new  IpTanimla($this->user, $ip);
    }
    public function IpListele()
    {
        return new  IpListele($this->user);
    }
    public function IpSil(Ip $ip)
    {
        return new  IpSil($this->user, $ip->id);
    }
}
