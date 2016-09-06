<?php

namespace AppBundle\Handler;

use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("user_handler")
 */
class UserHandler
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

    public function getAllUsers()
    {
        return $this->em->getRepository('AppBundle:User')->findAll();
    }
}