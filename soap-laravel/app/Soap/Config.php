<?php 

namespace App\Soap;

use App\Soap\Model\WsUser;
use Illuminate\Support\Facades\Auth;

class Config{
    const API_URI = 'http://localhost:3000';
    public static function getApiUri(){
        return  env('UETDS_API_URL'); 
    }

    public static function WsUser(){
        //return Auth::user()->getWsUser(); //todo: 
        return new WsUser('999999', '999999testtest');
    }

}