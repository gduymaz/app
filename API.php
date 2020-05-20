<?php

class API
{

    private $config;
    private $baseUrl = 'https://www.potterapi.com/v1/';

    private $validHouses = ['Gryffindor', 'Ravenclaw', 'Slytherin', 'Hufflepuff'];

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

    public function getCharacters($house = null)
    {

        $params = [];

        if ($house && !in_array($_GET['house'], $this->validHouses)) {
            die('Böyle bir ev yok');
        } elseif ($house) {
            $params = ['house' => $house];
        }


        $characters = $this->makeRequest('characters', $params);

        $list = [];

        foreach ($characters as $character) {
            $list[] = [
                'name' => $character['name'],
                'image' => 'assets/images/characters/'.$character['name'].'.jpg',
                'house' => $character['house'] ?? '',
                'role' => $character['role'] ?? '',
                'bloodStatus' => $character['bloodStatus'],
                'species' => $character['species']
            ];
        }

        return $list;
    }


    public function getHouses()
    {

        $houses = $this->makeRequest('houses');


        $list = [];

        foreach ($houses as $house) {
            $list[] = [
                'name' => $house['name'],
                'founder' => $house['founder'] ?? 'Mevcut Değil',
                'headOfHouse' => $house['headOfHouse'] ?? 'Mevcut Değil',
                'mascot' => $house['mascot'] ?? 'Mevcut Değil',
                'houseGhost' => $house['houseGhost'] ?? 'Mevcut Değil',
                'school' => $house['school'] ?? 'Mevcut Değil'
            ];
        }

        return $list;
    }


    public function getSpells()
    {
        $spells = $this->makeRequest('spells');

        $list = [];

        foreach ($spells as $spell) {
            $list[] = [
                'spell' => $spell['spell'],
                'type' => $spell['type'],
                'effect' => $spell['effect'],
            ];
        }

        return $list;
    }


}