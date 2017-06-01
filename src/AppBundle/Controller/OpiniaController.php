<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Opinia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * opinia controller.
 *
 * @Route("opinia")
 */
class OpiniaController extends Controller
{
    /**
     * Creates a new opinia entity.
     *
     * @Route("/new", name="opinia_new")
     * @Method({"POST"})
     */
    public function newAction(Request $request)
    {
        $opinia = new opinia();
        $form = $this->createForm('AppBundle\Form\OpiniaType', $opinia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.context')->getToken()->getUser();
            $opinia->setUser($user);
            $em->persist($opinia);
            $em->flush();

            return $this->redirectToRoute('wino_show', array('id' => $opinia->getWino()->getId()));
        }
    }
}
