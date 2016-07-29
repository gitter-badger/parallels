<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Helper\SshKeyHelper;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Project;

class LoadProjectsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setName('Test project');
        $project->setDefaultBranch('master');
        $project->setService('bitbucket');
        $project->setGitPrivateKey('-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEA0v0NNgAG0fP7cStKYoJxfjQFc+uBd2sBWvnF2zVkIJyB3loN
QyXvlW1XaAO8DNPf0E3+gtm7dLME2OncT/niujW8BK6p76kWiTLXwGkl7ZLLqzA3
r4CZEdOp1tlxSwhsNUzZ9q/zY1nuFtRKbYJ9bhC5vvScy7sZDmj8F+1ECAZxiigk
BYtwob08nQiTh+xtsLRd6Aj3Sn0/DHA1R0+l6lmOZkcr9MTlv9Kb5bgAaKaIRvly
WlQVoqilx2LkHMABVB2HA7zPUAFB/HCx7UrY0QyHin4xV0LcKnnI7cFn1JE4xwpo
idbNTr1w2V3PisO4IXlOufVR16Oi9PPOlGxyeQIDAQABAoIBAQCgzgbsmjaYfAiu
pxzpWZvgYQuq3tpsxpxg1y8qNFYc2MvOSPoErHweehh9CSOg7zaMz3TkC8hoWCyg
mhS0y7I20896DhkstMWdSafQWRN0L0aVMYmvdCa1xImUW2OSmVfHg8w3zMCGfzsM
IT6cmjC423yGAm8ig3XEWtWP8uC/768A5Sguuiu8rDrgcAo5u6+C8zEVkmlSg2FY
K96rbx4hWl3x4xIEHXAoRw3DYwIwAAMyJOILoYVt3mawHGf7rJOL286T0+5Z+e1G
oSLK2kyl0cjeO2QCS9FmlvV8JshD9c9BpsTZIYSwDoHhFlXnG3WBUdl28LWnu6G7
mVjy0gIRAoGBAOpWb7Wd5eNWEg0cnnXM8J/euN7cXW5bgzDAyeM8Cdm3unYV8/1l
W4YWPll6Jw/lHyehIbI/8z7A7SIGFzFXCESgNgZFh872/3ZNMSa7jaLMTuQRLNN+
LVnyqw5aX+/UgUbn1ySSEtHcE9zSIFGHt7kcLPFcyD1oEMgzgq6NTZ4NAoGBAOZ+
D6BZzofnlqqcfa5MgoED9HQ7iYJRNVr/MMDygOYdFSxvIfG+SNzrWFCIZZEffQyX
4ZmhZPWyoJwH2A6tcRhQYC3lQ4fMNJCabBxMv6NHCytjxSJOAGjfJPXb0HAjs+ZV
JvEfyV1Y2HwR5kqqRAwy4/hU2MGr4CfrfSVl7/cdAoGBAK1SmzNQg00/RwCtr0Jf
/4WvfTtQ8EYEp6byoSBSMtL2gpJ+sEU2p5gocZtKrwOhqwZrtnmZtTcwCPSGXrce
sT3Y5byDxuw8YjzE4VrNk/fad2tWjLos9Cw4QW7PR3Ai1C92oPkqlYLk7UgBnufO
owPmJBOtVWmdw/PfrYOffc4tAoGBAMjToa3nUepcQIybGW6av0LGPWJg1ak0NLb6
jnIvWVwmjuJOWlcVosrKTAKvNT/DHeOxGiIP27WwU/xfYUM4n8e9kG+syLAznsE3
q2blADy1k+fUYFlJeVXmx39obS6oDQFtxCZnub2ZwdYoim0X+X5fgP5IfywQI5jk
t/+z1+eJAoGAIJ330aWHxbqzP/JQxritA0TvdyhffgwmHzEOnsuP9y60MZ+8dXxI
mG9iE80bEUMZDDy2a22WkWn1q+jquCtnGX/ezOVBOjA4McR5Cr8MBvbKsTPMApvs
4gPKG97K93eLZ3qRCYnnbnGUOg6nVQVIupBgLXOyOW42Mxtr6eYhF5g=
-----END RSA PRIVATE KEY-----');
        $project->setGitPublicKey('ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDS/Q02AAbR8/txK0pignF+NAVz64F3awFa+cXbNWQgnIHeWg1DJe+VbVdoA7wM09/QTf6C2bt0swTY6dxP+eK6NbwErqnvqRaJMtfAaSXtksurMDevgJkR06nW2XFLCGw1TNn2r/NjWe4W1Eptgn1uELm+9JzLuxkOaPwX7UQIBnGKKCQFi3ChvTydCJOH7G2wtF3oCPdKfT8McDVHT6XqWY5mRyv0xOW/0pvluABopohG+XJaVBWiqKXHYuQcwAFUHYcDvM9QAUH8cLHtStjRDIeKfjFXQtwqecjtwWfUkTjHCmiJ1s1OvXDZXc+Kw7gheU659VHXo6L0886UbHJ5 deploy@phpci');
        $project->setGitSshLink('root@bitbucket.org');

        $this->addReference('test_project', $project);

        $manager->persist($project);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}

