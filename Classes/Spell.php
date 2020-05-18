<?php


namespace Classes;


class Spell extends API
{


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