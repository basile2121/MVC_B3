<?php


namespace App\Controller;

use Doctrine\ORM\EntityManager;
use App\Entity\User;

class IndexController{

    public function index(EntityManager $entityManager)
    {
        $user = new User();
        $user->setName("Regnault")
            ->setUsername("Basile")
            ->setPassword("BABA")
            ->setFirstName("Basile2")
            ->setEmail("basile.regnault@mail.com");

        $entityManager->persist($user);
        $entityManager->flush();

        echo "Index";
    }

    public function contact()
    {
        echo "formulaire de contact";
    }
}