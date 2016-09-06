<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Build;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBuildsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $buildsData = array(
            array(
                'buildId' => '1',
                'start' => new \DateTime('2016-01-01 12:00:00'),
                'end' => new \DateTime('2016-01-01 12:15:00'),
                'project' => $this->getReference('test_project'),
                'fromBranch' => 'issue1',
                'toBranch' => 'master',
                'progress' => 98,
            ),
            array(
                'buildId' => '2',
                'start' => new \DateTime('2016-01-01 13:00:00'),
                'end' => new \DateTime('2016-01-01 13:15:00'),
                'project' => $this->getReference('test_project'),
                'fromBranch' => 'issue1',
                'toBranch' => 'master',
                'progress' => 100,
            ),
            array(
                'buildId' => '3',
                'start' => new \DateTime('2016-01-02 12:00:00'),
                'end' => new \DateTime('2016-01-02 12:15:00'),
                'project' => $this->getReference('test_project'),
                'fromBranch' => 'issue1',
                'toBranch' => 'master',
                'progress' => 100,
            ),
            array(
                'buildId' => '4',
                'start' => new \DateTime('2016-01-02 13:00:00'),
                'end' => new \DateTime('2016-01-02 13:15:00'),
                'project' => $this->getReference('test_project'),
                'fromBranch' => 'issue1',
                'toBranch' => 'master',
                'progress' => 100,
            ),
            array(
                'buildId' => '5',
                'start' => new \DateTime('2016-01-02 14:00:00'),
                'end' => new \DateTime('2016-01-02 14:15:00'),
                'project' => $this->getReference('test_project'),
                'fromBranch' => 'issue1',
                'toBranch' => 'master',
                'progress' => 100,
            ),
        );

        foreach ($buildsData as $buildData) {
            $build = new Build();
            $build->setEnd($buildData['end']);
            $build->setStart($buildData['start']);
            $build->setBuildId($buildData['buildId']);
            $build->setProject($buildData['project']);
            $build->setProgress($buildData['progress']);
            $build->setFromBranch($buildData['fromBranch']);
            $build->setToBranch($buildData['toBranch']);

            $manager->persist($build);
        }
        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}

