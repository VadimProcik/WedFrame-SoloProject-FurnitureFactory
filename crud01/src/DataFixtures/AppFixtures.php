<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\UserFactory;
use App\Factory\PersonFactory;
use App\Factory\MakeFactory;
use App\Factory\PaymentRecordFactory;
use App\Factory\OrderFactory;
use App\Factory\AllocatedJobFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'username' => 'matt',
            'password' => 'smith',
            'role' => 'ROLE_FITTER'
        ]);

        UserFactory::createOne([
            'username' => 'john',
            'password' => 'doe',
            'role' => 'ROLE_ASSEMBLER'
        ]);

        UserFactory::createOne([
            'username' => 'bob',
            'password' => 'doe',
            'role' => 'ROLE_MANAGER'
        ]);

        UserFactory::createOne([
            'username' => 'barry',
            'password' => 'doe',
            'role' => 'ROLE_USER'
        ]);

        $wardrobeOrder = OrderFactory::createOne(['cutOutSheet' => 'wardrobe']);
        $bedOrder = OrderFactory::createOne(['cutOutSheet' => 'bed']);
        $chairOrder = OrderFactory::createOne(['cutOutSheet' => 'chair']);

        $personName = PersonFactory::createOne(['name' => 'Millie Bobby Brown']);
        $person1Name = PersonFactory::createOne(['name' => 'Brendan Fox']);
        $person2Name = PersonFactory::createOne(['name' => 'Harry Potter']);
    }
}
