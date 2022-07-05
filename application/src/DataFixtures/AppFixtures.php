<?php

namespace App\DataFixtures;

use App\Factory\BudgetFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = UserFactory::createOne(['username' => "admin", 'roles' => ['ROLE_ADMIN'], 'password' => 'secret']);
        BudgetFactory::createOne(['owner' => $admin]);

        UserFactory::createOne(['username' => "user", 'password' => 'secret']);
    }
}
