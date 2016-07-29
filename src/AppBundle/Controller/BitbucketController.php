<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Build;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/bitbucket")
 */
class BitbucketController extends Controller
{

    /**
     * @Route("/webhook/{id}")
     *
     * @ParamConverter("project", class="AppBundle:Project")
     */
    public function webhookAction(Project $project, Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if (!isset($payload['pullrequest'])) {
            return new JsonResponse(array('status' => 'error'));
        }

        $build = $this->get('project_handler')->createBuild(
            $project,
            $payload['pullrequest']['source']['branch']['name'],
            $payload['pullrequest']['destination']['branch']['name']
        );

        $response = array();

        if ($build) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }

        return new JsonResponse($response);
    }

}
