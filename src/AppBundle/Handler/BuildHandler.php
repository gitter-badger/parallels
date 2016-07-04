<?php

namespace AppBundle\Handler;

use AppBundle\Entity\Build;
use AppBundle\Entity\Project;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("build_handler")
 */
class BuildHandler
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

    public function getFirstOpenedBuild()
    {
        $builds = $this->em->getRepository('AppBundle:Build')
            ->createQueryBuilder('b')
            ->where('b.end IS NULL')
            ->getQuery()
            ->getResult();
        if (count($builds) > 0) {
            return $builds->first();
        }

        return false;
    }
}