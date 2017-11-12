<?php

namespace adminBundle\Controller;

use adminBundle\Entity\districts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * District controller.
 *
 * @Route("districts")
 */
class districtsController extends Controller
{
    /**
     * Lists all district entities.
     *
     * @Route("/", name="districts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $districts = $em->getRepository('adminBundle:districts')->findAll();

        return $this->render('districts/index.html.twig', array(
            'districts' => $districts,
        ));
    }

    /**
     * Creates a new district entity.
     *
     * @Route("/new", name="districts_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $district = new Districts();
        $form = $this->createForm('adminBundle\Form\districtsType', $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $district->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($district);
            $em->flush();

            return $this->redirectToRoute('districts_show', array('id' => $district->getId()));
        }

        return $this->render('districts/new.html.twig', array(
            'district' => $district,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a district entity.
     *
     * @Route("/{id}", name="districts_show")
     * @Method("GET")
     */
    public function showAction(districts $district)
    {
        $deleteForm = $this->createDeleteForm($district);

        return $this->render('districts/show.html.twig', array(
            'district' => $district,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing district entity.
     *
     * @Route("/{id}/edit", name="districts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, districts $district)
    {
        $deleteForm = $this->createDeleteForm($district);
        $editForm = $this->createForm('adminBundle\Form\districtsType', $district);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $district->setUpdateAt(new \DateTime('now'));

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('districts_edit', array('id' => $district->getId()));
        }

        return $this->render('districts/edit.html.twig', array(
            'district' => $district,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a district entity.
     *
     * @Route("/{id}", name="districts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, districts $district)
    {
        $form = $this->createDeleteForm($district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($district);
            $em->flush();
        }

        return $this->redirectToRoute('districts_index');
    }

    /**
     * Creates a form to delete a district entity.
     *
     * @param districts $district The district entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(districts $district)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('districts_delete', array('id' => $district->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
