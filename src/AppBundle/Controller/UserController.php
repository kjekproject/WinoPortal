<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("/producent")
 */
class UserController extends Controller
{
    /**
     * Lists all wine users - producers
     *
     * @Route("/", name="producent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $producers = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'producers' => $producers,
        ));
    }

    /**
     * Finds and displays a user - producer
     *
     * @Route("/{id}", name="producent_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        return $this->render('user/show.html.twig', array(
            'user' => $user,
        ));
    }
}
