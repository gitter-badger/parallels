<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/project")
 */
class ProjectController extends Controller
{

    /**
     * @Route("/builds/{id}", name="project_builds")
     *
     * @ParamConverter("post", class="AppBundle:Project")
     */
    public function buildsAction(Project $project, Request $request)
    {
        $projectsQuery = $this->get('project_handler')->getBuildsQuery($project);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $projectsQuery,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('AppBundle:Project:builds.html.twig', array('pagination' => $pagination));
    }

    /**
     * @Route("/add", name="project_add")
     */
    public function addAction(Request $request)
    {
        $project = new Project();

        $form = $this->createForm(ProjectForm::class, $project);

        if ($request->isMethod('post')) {
            $form->handleRequest($request);
            $project = $form->getData();
            $project = $this->get('project_handler')->save($project);
        }

        return $this->render('AppBundle:Project:add.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/edit/{id}", name="project_add")
     *
     * @ParamConverter("post", class="AppBundle:Project")
     */
    public function editAction(Request $request, Project $project)
    {
        $form = $this->createForm(ProjectForm::class, $project);

        if ($request->isMethod('post')) {
            $form->handleRequest($request);
            $project = $form->getData();
            $project = $this->get('project_handler')->save($project);
        }

        return $this->render('AppBundle:Project:add.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

}
