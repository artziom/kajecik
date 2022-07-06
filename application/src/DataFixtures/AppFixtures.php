<?php

namespace App\DataFixtures;

use App\Factory\BudgetFactory;
use App\Factory\FinancialResourceFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = UserFactory::createOne(['username' => "admin", 'roles' => ['ROLE_ADMIN'], 'password' => 'secret']);
        $budget = BudgetFactory::createOne(['owner' => $admin]);

        FinancialResourceFactory::createOne(['active' => true, 'budget' => $budget]);
        FinancialResourceFactory::createMany(3, ['budget' => $budget]);

        UserFactory::createOne(['username' => "user", 'password' => 'secret']);
    }
}
