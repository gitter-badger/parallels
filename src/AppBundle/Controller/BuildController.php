<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Build;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/build")
 */
class BuildController extends Controller
{

    /**
     * @Route("/show/{id}", name="build_show")
     *
     * @ParamConverter("build", class="AppBundle:Build")
     */
    public function buildsAction(Build $build)
    {
        return $this->render('AppBundle:Build:show.html.twig', array('build' => $build));
    }

}
