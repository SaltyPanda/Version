<?php

namespace adminBundle\Controller;

use adminBundle\Entity\cities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * City controller.
 *
 * @Route("cities")
 */
class citiesController extends Controller
{
    /**
     * Lists all city entities.
     *
     * @Route("/", name="cities_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cities = $em->getRepository('adminBundle:cities')->findAll();

        return $this->render('cities/index.html.twig', array(
            'cities' => $cities,
        ));
    }

    /**
     * Creates a new city entity.
     *
     * @Route("/new", name="cities_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $city = new cities();
        $form = $this->createForm('adminBundle\Form\citiesType', $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $city->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($city);
            $em->flush();

            return $this->redirectToRoute('cities_show', array('id' => $city->getId()));
        }

        return $this->render('cities/new.html.twig', array(
            'city' => $city,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a city entity.
     *
     * @Route("/{id}", name="cities_show")
     * @Method("GET")
     */
    public function showAction(cities $city)
    {
        $deleteForm = $this->createDeleteForm($city);

        return $this->render('cities/show.html.twig', array(
            'city' => $city,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing city entity.
     *
     * @Route("/{id}/edit", name="cities_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, cities $city)
    {
        $deleteForm = $this->createDeleteForm($city);
        $editForm = $this->createForm('adminBundle\Form\citiesType', $city);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $city->setUpdateAt(new \DateTime('now'));

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cities_edit', array('id' => $city->getId()));
        }

        return $this->render('cities/edit.html.twig', array(
            'city' => $city,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a city entity.
     *
     * @Route("/{id}", name="cities_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, cities $city)
    {
        $form = $this->createDeleteForm($city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($city);
            $em->flush();
        }

        return $this->redirectToRoute('cities_index');
    }

    /**
     * Creates a form to delete a city entity.
     *
     * @param cities $city The city entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(cities $city)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cities_delete', array('id' => $city->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
