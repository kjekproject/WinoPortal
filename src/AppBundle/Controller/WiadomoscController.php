<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Wiadomosc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Wiadomosc controller.
 *
 * @Route("wiadomosc")
 */
class WiadomoscController extends Controller
{
    /**
     *
     * @Route("/odebrane", name="wiadomosc_odebrane")
     * @Method("GET")
     */
    public function odebraneAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();

        $wiadomoscs = $em->getRepository('AppBundle:Wiadomosc')->findByOdbiorca($id);

        return $this->render('wiadomosc/odebrane.html.twig', array(
            'wiadomoscs' => $wiadomoscs,
        ));
    }
    
    /**
     *
     * @Route("/wyslane", name="wiadomosc_wyslane")
     * @Method("GET")
     */
    public function wyslaneAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();

        $wiadomoscs = $em->getRepository('AppBundle:Wiadomosc')->findByNadawca($id);

        return $this->render('wiadomosc/wyslane.html.twig', array(
            'wiadomoscs' => $wiadomoscs,
        ));
    }

    /**
     * Creates a new wiadomosc entity.
     *
     * @Route("/new/{id}", name="wiadomosc_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        $wiadomosc = new Wiadomosc();
        $form = $this->createForm('AppBundle\Form\WiadomoscType', $wiadomosc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($wiadomosc);
            $em->flush();

            return $this->redirectToRoute('wiadomosc_show', array('id' => $wiadomosc->getId()));
        }

        return $this->render('wiadomosc/new.html.twig', array(
            'wiadomosc' => $wiadomosc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a wiadomosc entity.
     *
     * @Route("/{id}", name="wiadomosc_show")
     * @Method("GET")
     */
    public function showAction(Wiadomosc $wiadomosc)
    {
        $deleteForm = $this->createDeleteForm($wiadomosc);

        $loggedUserId = $this->container->get('security.context')->getToken()->getUser()->getId();
        $nadawcaId = $wiadomosc->getNadawca()->getId();
        if($loggedUserId === $nadawcaId) {
            $role = 'nadawca';
        } else {
            $role = 'odbiorca';
        }
        
        return $this->render('wiadomosc/show.html.twig', array(
            'role' => $role,
            'wiadomosc' => $wiadomosc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a wiadomosc entity.
     *
     * @Route("/{id}", name="wiadomosc_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Wiadomosc $wiadomosc)
    {
        $form = $this->createDeleteForm($wiadomosc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($wiadomosc);
            $em->flush();
        }

        return $this->redirectToRoute('wiadomosc_index');
    }

    /**
     * Creates a form to delete a wiadomosc entity.
     *
     * @param Wiadomosc $wiadomosc The wiadomosc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Wiadomosc $wiadomosc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wiadomosc_delete', array('id' => $wiadomosc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
