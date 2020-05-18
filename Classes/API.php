<?php

namespace Classes;

class API
{

    private $config;
    private $baseUrl = 'https://www.potterapi.com/v1/';

    public function __construct()
    {
        $this->config = include 'config.php';
    }

    protected function makeRequest($method, array $params = [])
    {
        //methoda göre api url oluşturuyoruz
        $apiUrl = $this->baseUrl.$method.'?key='.$this->config['api_key'];

        //varsa ek parametreleri ekliyoruz özellikle karakterlerin evleri için
        foreach ($params as $key => $value) {
            $apiUrl .= '&'.$key.'='.$value;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        //hatalı parametreler için 409 dönüyor daha detaylı hata için aşağıda kontrol yapıldı
        if ($statusCode !== 200 && $statusCode != 409) {
            die('API bağlantısı çalışmıyor');
        }
        $array = json_decode($output, true);

        if (isset($array['error'])) {
            die('API parametreleri hatalı: '.$array['error']);
        }

        return $array;

    }
}