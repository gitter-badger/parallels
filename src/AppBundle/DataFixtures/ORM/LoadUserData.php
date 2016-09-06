<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $usersData = array(
            array(
                'username' => 'alex@parallels.dev',
                'email' => 'alex@parallels.dev',
                'password' => '123456',
            ),
            array(
                'username' => 'user1@parallels.dev',
                'email' => 'user1@parallels.dev',
                'password' => '123456',
            ),
            array(
                'username' => 'user2@parallels.dev',
                'email' => 'user2@parallels.dev',
                'password' => '123456',
            ),
            array(
                'username' => 'user3@parallels.dev',
                'email' => 'user3@parallels.dev',
                'password' => '123456',
            ),
            array(
                'username' => 'user4@parallels.dev',
                'email' => 'user4@parallels.dev',
                'password' => '123456',
            ),
        );

        foreach ($usersData as $userData) {
            $user = new User();
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPlainPassword($userData['password']);
            $user->setEnabled(true);
            $manager->persist($user);
        }
        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}

