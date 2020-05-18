<?php


namespace Classes;


class Character extends API
{

    private $validHouses = ['Gryffindor', 'Ravenclaw', 'Slytherin', 'Hufflepuff'];

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
}