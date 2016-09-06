<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/user")
 */
class UserController extends Controller
{

    /**
     * @Route("/list", name="user_list")
     */
    public function userListAction()
    {
        return $this->render('AppBundle:User:list.html.twig', array(
            'users' => $this->get('user_handler')->getAllUsers()
        ));
    }

    /**
     * @Route("/add", name="user_add")
     */
    public function userAddAction()
    {
        return $this->render('AppBundle:User:add.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="user_add")
     */
    public function editAction()
    {
        return $this->render('AppBundle:User:add.html.twig');
    }

}
