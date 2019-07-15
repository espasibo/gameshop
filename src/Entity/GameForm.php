<?php


namespace App\Entity;


use Doctrine\Common\Persistence\ObjectManager;

class GameForm
{

    public function save(ObjectManager $manager) {
        $data = $_POST;
        $game = new Game();
        $game->setName($data['name']);
        $game->setPlatformId($data['platform_id']);
        $manager->persist($game);
        $manager->flush();
        $game_id = $game->getId();
        foreach ($data as $i=>$row) {
            if (strpos($i, 'value') === 0) {
                $val = new ExtraValues();
                $val->setGameId($game_id);
                $feature = explode(';', $i);
                $feature = $feature[1];
                $val->setFeatureId($feature);
                $val->setValue($row);
                $manager->persist($val);
            }
        }
        $manager->flush();
    }

}