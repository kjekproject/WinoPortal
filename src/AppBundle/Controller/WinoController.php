<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Wino;
use AppBundle\Entity\User;
use AppBundle\Entity\Opinia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Wino controller.
 *
 * @Route("wino")
 */
class WinoController extends Controller
{
    /**
     * Lists all wino entities.
     *
     * @Route("/", name="wino_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $wino = new Wino();
        $form = $this->createFormBuilder($wino)
                ->setAction($this->generateUrl('wino_index'))
                ->setMethod('POST')
                ->add('nazwa', null, ['label' => 'Wyszukaj po nazwie'])
                ->getForm();
        
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $nazwa = $wino->getNazwa();
            $wina = $em->getRepository('AppBundle:Wino')->findWineByNazwa($nazwa);
        } else {
            $wina = $em->getRepository('AppBundle:Wino')->findAll();
        }
        
        return $this->render('wino/index.html.twig', array(
            'wina' => $wina,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/user", name="wino_user")
     * @Method("GET")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function userWineAction()
    {
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $wina = $this->getDoctrine()->getRepository('AppBundle:Wino')->findBy(array('user' => $id));

        return $this->render('wino/user.html.twig', array(
            'wina' => $wina,
        ));
    }
    
    /**
     * Creates a new wino entity.
     *
     * @Route("/new", name="wino_new")
     * @Method({"GET", "POST"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function newAction(Request $request)
    {
        $wino = new Wino();
        $form = $this->createForm('AppBundle\Form\WinoType', $wino);
        $form->handleRequest($request);
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        $wino->setUser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($wino);
            $em->flush();

            return $this->redirectToRoute('wino_user');
        }

        return $this->render('wino/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a wino entity.
     *
     * @Route("/{id}", name="wino_show")
     * @Method("GET")
     */
    public function showAction(Wino $wino)
    {                  
        return $this->render('wino/show.html.twig', array(
            'wino' => $wino,
        ));
    }

    /**
     * Displays a form to edit an existing wino entity.
     *
     * @Route("/{id}/edit", name="wino_edit")
     * @Method({"GET", "POST"})
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function editAction(Request $request, Wino $wino)
    {
        $userId = $this->container->get('security.context')->getToken()->getUser()->getId();
        $producerId = $wino->getUser()->getId();
        
        if($userId !== $producerId) {
            $this->redirectToRoute('wino_index');
        }
        
        $deleteForm = $this->createDeleteForm($wino);
        $editForm = $this->createForm('AppBundle\Form\WinoType', $wino);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wino_user');
        }

        return $this->render('wino/edit.html.twig', array(
            'wino' => $wino,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a wino entity.
     *
     * @Route("/{id}", name="wino_delete")
     * @Method("DELETE")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function deleteAction(Request $request, Wino $wino)
    {
        $form = $this->createDeleteForm($wino);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($wino);
            $em->flush();
        }

        return $this->redirectToRoute('wino_user');
    }

    /**
     * Creates a form to delete a wino entity.
     *
     * @param Wino $wino The wino entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Wino $wino)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wino_delete', array('id' => $wino->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
