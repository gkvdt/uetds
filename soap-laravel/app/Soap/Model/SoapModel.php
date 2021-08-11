<?php

namespace App\Soap\Model;


class SoapModel
{
    public function toArray()
    {
        return get_object_vars($this);
    }

    public function setArray($arr)
    {
        $temp = array();
        foreach ($arr as $val) {
            array_push($temp, new UetdsEsyaSonuc($val));
        }
        return $temp;
    }
}
