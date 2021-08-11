<?php


namespace App\Soap\Model;


class SeferBilgileriInput extends SoapModel

{
    public $plaka1;
    public $plaka2;
    public $sofor1TcNo;
    public $sofor2TcNo;
    public $baslangicTarihi;
    public $baslangicSaati;
    public $bitisTarihi;
    public $bitisSaati;


    public function __construct($params = null)
    {

        $this->plaka1 = isset($params->plaka1) ? $params->plaka1 : null;
        $this->plaka2 = isset($params->plaka2) ? $params->plaka2 : null;
        $this->sofor1TCNo = isset($params->sofor1TcNo) ? $params->sofor1TcNo : null;
        $this->sofor2TCNo = isset($params->sofor2TcNo) ? $params->sofor2TcNo : null;
        $this->baslangicTarihi = isset($params->baslangicTarihi) ? $params->baslangicTarihi : null;
        $this->baslangicSaati = isset($params->baslangicSaati) ? $params->baslangicSaati : null;
        $this->bitisTarihi = isset($params->bitisTarihi) ? $params->bitisTarihi : null;
        $this->bitisSaati = isset($params->bitisSaati) ? $params->bitisSaati : null;
    }


    public function getValues()
    {
        return [
            'plaka1' => $this->plaka1,
            'plaka2' => $this->plaka2,
            'sofor1TcNo' => $this->sofor1TcNo,
            'sofor2TcNo' => $this->sofor2TcNo,
            'baslangicTarihi' => $this->baslangicTarihi,
            'baslangicSaati' => $this->baslangicSaati,
            'bitisTarihi' => $this->bitisTarihi,
            'bitisSaati' => $this->bitisSaati,

        ];
    }
}
