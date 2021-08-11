<?php

namespace App\Http\Controllers;

use App\Soap\Model\Arac;
use App\Soap\Model\Ip;
use App\Soap\Model\IptalTuru;
use App\Soap\Model\Sefer;
use App\Soap\Model\SeferBilgileriInput;
use App\Soap\Model\TasimaTuruKodu;
use App\Soap\Model\UetdsSurucuVizeBasvuruInput;
use App\Soap\Model\User;
use App\Soap\Model\WsUser;
use App\Soap\Model\YukBilgileriInput;
use App\Soap\Model\YukTuru;
use App\Soap\Request\AracMuayeneSorgula;
use App\Soap\Request\IpListele;
use App\Soap\Request\IpSil;
use App\Soap\Request\IptalTurleri;
use App\Soap\Request\IpTanimla;
use App\Soap\Request\MeslekiYeterlilikSorgula;
use App\Soap\Request\ParamTehlikeliMaddeTasimaSekli;
use App\Soap\Request\ParamYukBirimi;
use App\Soap\Request\ParamYukTuru;
use App\Soap\Request\SeferAktifEt;
use App\Soap\Request\SeferBildirimOzeti;
use App\Soap\Request\SeferBildirimRaporu;
use App\Soap\Request\SefereYukEkle;
use App\Soap\Request\SeferGuncelle;
use App\Soap\Request\SeferIptalEt;
use App\Soap\Request\YeniYukKaydiBildirV2;
use App\Soap\Request\YetkiBelgesiKontrol;
use Exception;
use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
use stdClass;

use App\Soap\Request\VizeOnBasvuru;
use App\Soap\Request\VizeOnBasvuruSurucuEkle;
use App\Soap\Request\VizeOnBasvuruListele;
use App\Soap\Request\VizeOnBasvuruDetay;
use App\Soap\Request\VizeOnBasvuruIptal;
use App\Soap\Request\ParamTasimaTurleri;
use App\Soap\Request\YeniSeferEkleV3;
use App\Soap\Request\SeferDuzenleV3;
use App\Soap\Request\SeferDetayiV3;
use App\Soap\Request\SeferListesiV3;
use App\Soap\Request\SeferIptalTurleri;
use App\Soap\Request\SeferIptalEtV3;
use App\Soap\Request\SeferAktifEtV3;
use App\Soap\Request\SefereYukEkleV3;
use App\Soap\Request\YukDuzenleV3;
use App\Soap\Request\YukDetayiV3;
use App\Soap\Request\YukIptalEtV3;
use App\Soap\Request\YukAktifEtV3;
use App\Soap\Request\SeferRaporuV3;
use App\Soap\Request\ParamTehlikeliMaddeMuafiyetTurler;



class TestSoapController extends Controller
{

    private $yukBilgileriInputParams;
    private $seferBilgileriInputParams;

    public function __construct()
    {
        $this->yukBilgileriInputParams = new stdClass();

        $this->yukBilgileriInputParams->gonderenUnvan = "gönderen test";
        $this->yukBilgileriInputParams->aliciUnvan = "alıcı test";
        $this->yukBilgileriInputParams->yuklemeUlkeKodu = "TR";
        $this->yukBilgileriInputParams->yuklemeIlMernisKodu = "1";
        $this->yukBilgileriInputParams->yuklemeIlceMernisKodu = "1104";
        $this->yukBilgileriInputParams->bosaltmaUlkeKodu = "TR";
        $this->yukBilgileriInputParams->bosaltmaIlMernisKodu = "2";
        $this->yukBilgileriInputParams->bosaltmaIlceMernisKodu = "1105";
        $this->yukBilgileriInputParams->yuklemeTarihi = "02/04/2020";
        $this->yukBilgileriInputParams->yuklemeSaati = "15:08";
        $this->yukBilgileriInputParams->bosaltmaTarihi = "03/04/2020";
        $this->yukBilgileriInputParams->bosaltmaSaati = "12:00";
        $this->yukBilgileriInputParams->yukCinsId = "204";
        $this->yukBilgileriInputParams->yukBirimi = "KG";
        $this->yukBilgileriInputParams->yukMiktari = "3";
        $this->yukBilgileriInputParams->tasimaBedeli = "2000";
        $this->yukBilgileriInputParams->tasimaBedeliParaBirimi = "USD";



        $this->seferBilgileriInputParams = new stdClass();
        $this->seferBilgileriInputParams->plaka1 = "34TEST123";
        $this->seferBilgileriInputParams->sofor1TcNo = "11111111111";
        $this->seferBilgileriInputParams->baslangicTarihi = "03/04/2022";
        $this->seferBilgileriInputParams->baslangicSaati = "10:00";
        $this->seferBilgileriInputParams->bitisTarihi = "05/04/2022";
        $this->seferBilgileriInputParams->bitisSaati = "18:00";
    }

    public function test()
    {
        $result = [];

        $seferBilgileriInput = new SeferBilgileriInput($this->seferBilgileriInputParams);
        $yukBilgileriInput = new YukBilgileriInput($this->yukBilgileriInputParams);

        $yukBilgileriListInput = [
            $yukBilgileriInput->getValues()
        ];
        $user = new WsUser('999999', '999999testtest');
        $sefer = new Sefer();
        $sefer->uetdsSeferReferansNo = "20022500200148";
        $iptalTuru = new IptalTuru(null);
        $iptalTuru->kodu = 1;
        $u = new User('23695921030');
        $tasimaTuruKodu = new TasimaTuruKodu(2);
        $ip = new Ip();
        $ip->ipBaslangic = '100.168.1.1';
        $ip->ipBitis = '100.168.1.69';

        $uetdsSurucuVizeBasvuruInput = new UetdsSurucuVizeBasvuruInput('11111111111','11111111111111111111');

        array_push($result, [
            //'vizeOnBasvuruSurucuEkle' => new VizeOnBasvuruSurucuEkle($user,$uetdsSurucuVizeBasvuruInput)
            /*
            'ParamYukBirimi' =>  new ParamYukBirimi($user, TasimaTuruKodu::diger()),
            'paramYukTuru' => new ParamYukTuru($user, $tasimaTuruKodu),
            'IptalTurleri' => new IptalTurleri($user),
            'ParamTehlikeliMaddeTasimaSekli' => new ParamTehlikeliMaddeTasimaSekli($user),
            'yetkiBelgesiKontrol' => new YetkiBelgesiKontrol($user,new Arac())
            'AracMuayeneSorgula' => new AracMuayeneSorgula($user, '34TEST123'),
            'MeslekiYeterlilikSorgula' => new MeslekiYeterlilikSorgula($user, $u),
            'IpTanimla' => new IpTanimla($user, $ip),
            'IpListele' => new IpListele($user),
            'IpSil' => new IpSil($user, 901),
            'paramTasimaTurleri' => new ParamTasimaTurleri($user),
            */
'yeniSeferEkleV3'=> new YeniSeferEkleV3($user,$seferBilgileriInput),
        ]);


//FIXME: vizeOnBasvuruSurucuEkle   - (eksik parametre hatası)
        //FIXME: vizeOnBasvuru 
        //FIXME: vizeOnBasvuruListele
        //FIXME: vizeOnBasvuruDetay
        //FIXME: vizeOnBasvuruIptal 

        //TODO: paramTasimaTurleri +

        //TODO: yeniSeferEkleV3
        //TODO: seferDuzenleV3
        //TODO: seferDetayiV3
        //TODO: seferListesiV3
        //TODO: seferIptalTurleri
        //TODO: seferIptalEtV3
        //TODO: seferAktifEtV3
        //TODO: sefereYukEkleV3
        //TODO: yukDuzenleV3
        //TODO: yukDetayiV3
        //TODO: yukIptalEtV3
        //TODO: yukAktifEtV3
        //TODO: seferRaporuV3
        //TODO: paramTehlikeliMaddeMuafiyetTurleri



 //new VizeOnBasvuru(); 
 //new VizeOnBasvuruSurucuEkle(); 
 //new VizeOnBasvuruListele();
 //new VizeOnBasvuruDetay();
 //new VizeOnBasvuruIptal(); 
 //new ParamTasimaTurleri();
 //new YeniSeferEkleV3();
 //new SeferDuzenleV3();
 //new SeferDetayiV3();
 //new SeferListesiV3();
 //new SeferIptalTurleri();
 //new SeferIptalEtV3();
 //new SeferAktifEtV3();
 //new SefereYukEkleV3();
 //new YukDuzenleV3();
 //new YukDetayiV3();
 //new YukIptalEtV3();
 //new YukAktifEtV3();
 //new SeferRaporuV3();
 //new ParamTehlikeliMaddeMuafiyetTurler();





        /*
        'ParamYukTuru' => new ParamYukTuru($user, $tasimaTuruKodu),
         */

        //$res = new YeniYukKaydiBildirV2($user, $seferBilgileriInput, $yukBilgileriListInput);

        //$res = new SeferIptalEt($user,$iptalTuru,$sefer,"Açıklama"); 
        //$res = new SeferAktifEt($user,$sefer); 
        //$res = new SeferBildirimOzeti($user,$sefer);
        //$res = new SeferBildirimRaporu($user,$sefer);
        //$res = new SefereYukEkle($user,$yukBilgileriInput,$sefer); 
        //$res = new SeferGuncelle($user,$seferBilgileriInput,$sefer);


        print_r(json_encode($result));

        /*
         * PDF İNDİRME
         * 
         header('Content-type: application/pdf');
         header('Content-Disposition: attachment; filename="service.pdf"');
         echo ($res->sonucPdf);
        */
    }
}
