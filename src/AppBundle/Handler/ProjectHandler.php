<?php

namespace AppBundle\Handler;

use AppBundle\Entity\Build;
use AppBundle\Entity\Project;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("project_handler")
 */
class ProjectHandler
{

    private $em;

    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine.orm.entity_manager")
     * })
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getProjects()
    {
        return $this->em->getRepository('AppBundle:Project')->findAll();
    }

    public function getBuildsQuery(Project $project)
    {
        return $this->em->getRepository('AppBundle:Build')
            ->createQueryBuilder('b')
            ->where('b.project = :project')
            ->setParameter('project', $project);
    }

    public function save(Project $project)
    {
        $this->em->persist($project);
        $this->em->flush();

        return $project;
    }

    public function createBuild(Project $project, $fromBranch, $toBranch)
    {
        $max = $this->getBuildsQuery($project)
            ->orderBy('b.buildId', 'desc')
            ->getQuery()
            ->setMaxResults(1)
            ->getSingleResult();

        $build = new Build();
        $build->setProject($project);
        $build->setFromBranch($fromBranch);
        $build->setToBranch($toBranch);
        $build->setBuildId($max->getBuildId() + 1);

        $this->em->persist($build);
        $this->em->flush();
        return $build;
    }
}