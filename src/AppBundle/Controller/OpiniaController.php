<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Opinia;
use AppBundle\Entity\Wino;
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
     * @Route("/new/{id}", name="opinia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Wino $wino)
    {
        $opinia = new opinia();
        $opinia->setWino($wino);
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
        
        return $this->render('opinia/new.html.twig', array(
            'form' => $form->createView(),
            'wino' => $wino,
        ));
    }
}
