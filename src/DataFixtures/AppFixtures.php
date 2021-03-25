<?php

namespace App\DataFixtures;

use App\Entity\UsageEvolution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //lit le fichier .sql qui est juste à côté (export de mes données)
        $sql = file_get_contents(__DIR__ . "/term.sql");

        //exécute la requête d'INSERT
        $manager->getConnection()->exec($sql);


        //lit le fichier .sql qui est juste à côté (export de mes données)
        $sql = file_get_contents(__DIR__ . "/definition.sql");

        //exécute la requête d'INSERT
        $manager->getConnection()->exec($sql);

        $usageEvolutions = [
            "stable",
            "de plus en plus utilisé",
            "de moins en moins utilisé",
        ];

        foreach($usageEvolutions as $ue){
            $entity = new UsageEvolution();
            $entity->setName($ue);
            $manager->persist($entity);
        }
        $manager->flush();

    }
}
