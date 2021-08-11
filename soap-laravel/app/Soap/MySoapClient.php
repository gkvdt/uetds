<?php

namespace App\Soap;



class MySoapClient
{

    private $client = null;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => Config::API_URI]);
    }

    public function aracmuayenesorgula($params)
    {
        $response = $this->client->request('post', '/aracmuayenesorgula', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function ipListele($params)
    {
        $response = $this->client->request('post', '/ipListele', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function ipSil($params)
    {
        $response = $this->client->request('post', '/ipSil', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function iptalTurleri($params)
    {
        $response = $this->client->request('post', '/iptalTurleri', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function ipTanimla($params)
    {
        $response = $this->client->request('post', '/ipTanimla', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function meslekiYeterlilikSorgula($params)
    {
        $response = $this->client->request('post', '/meslekiYeterlilikSorgula', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function paramTehlikeliMaddeTasimaSekli($params)
    {
        $response = $this->client->request('post', '/paramTehlikeliMaddeTasimaSekli', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function paramYukBirimi($params)
    {
        $response = $this->client->request('post', '/paramYukBirimi', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function paramYukTuru($params)
    {
        $response = $this->client->request('post', '/paramYukTuru', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function yeniYukKaydiBildirV2($params)
    {
        $response = $this->client->request('post', '/yeniYukKaydiBildirV2', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function seferIptalEt($params)
    {
        $response = $this->client->request('post', '/seferIptalEt', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function seferAktifEt($params)
    {
        $response = $this->client->request('post', '/seferAktifEt', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function seferBildirimOzeti($params)
    {
        $response = $this->client->request('post', '/seferBildirimOzeti', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function seferBildirimRaporu($params)
    {
        $response = $this->client->request('post', '/seferBildirimRaporu', ['json' => $params]);
        return json_decode($response->getbody());
    }


    public function sefereYukEkle($params)
    {
        $response = $this->client->request('post', '/sefereYukEkle', ['json' => $params]);
        return json_decode($response->getbody());
    }


    public function seferGuncelle($params)
    {
        $response = $this->client->request('post', '/seferGuncelle', ['json' => $params]);
        return json_decode($response->getbody());
    }



    public function yukBildirimiDetayiV2($params)
    {
        $response = $this->client->request('post', '/yukBildirimiDetayiV2', ['json' => $params]);
        return json_decode($response->getbody());
    }

public function yukBildirimiGuncelleV2($params)
    {
        $response = $this->client->request('post', '/yukBildirimiGuncelleV2', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function yetkiBelgesiKontrol($params)
    {
        $response = $this->client->request('post', '/yetkiBelgesiKontrol', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function vizeOnBasvuruSurucuEkle($params)
    {
        $response = $this->client->request('post', '/vizeOnBasvuruSurucuEkle', ['json' => $params]);
        return json_decode($response->getbody());
    }
    public function paramTasimaTurleri($params)
    {
        $response = $this->client->request('post', '/paramTasimaTurleri', ['json' => $params]);
        return json_decode($response->getbody());
    }

    public function yeniSeferEkleV3($params)
    {
        $response = $this->client->request('post', '/yeniSeferEkleV3', ['json' => $params]);
        return json_decode($response->getbody());
    }


    





}
