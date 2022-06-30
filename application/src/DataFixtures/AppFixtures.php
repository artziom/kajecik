<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne(['username' => "admin", 'roles' => ['ROLE_ADMIN'], 'password' => 'secret']);

        UserFactory::createOne(['username' => "user", 'password' => 'secret']);
    }
}
