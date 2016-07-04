<?php

namespace AppBundle\Handler;

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
}