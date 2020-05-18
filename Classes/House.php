<?php


namespace Classes;


class House extends API
{


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
}