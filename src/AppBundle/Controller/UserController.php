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
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $producer = new User();
        $form = $this->createFormBuilder($producer)
            ->setAction($this->generateUrl('producent_index'))
            ->setMethod('POST')
            ->add('username', null, ['label' => 'Wyszukaj po nazwie'])
            ->getForm();

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if($form->isSubmitted() && $form->isValid()) {
            $username = $producer->getUsername();
            $producers = $em->getRepository('AppBundle:User')->findProducerByName($username);
        } else {
            $producers = $em->getRepository('AppBundle:User')->findAll();
        }

        return $this->render('user/index.html.twig', array(
            'producers' => $producers,
            'form' => $form->createView(),
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
