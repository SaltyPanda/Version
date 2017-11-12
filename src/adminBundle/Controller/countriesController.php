<?php

namespace adminBundle\Controller;

use adminBundle\Entity\countries;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Country controller.
 *
 * @Route("countries")
 */
class countriesController extends Controller
{
    /**
     * Lists all country entities.
     *
     * @Route("/", name="countries_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();


        $countries = $em->getRepository('adminBundle:countries')->findAll();

        return $this->render('countries/index.html.twig', array(
            'countries' => $countries,
        ));
    }

    /**
     * Creates a new country entity.
     *
     * @Route("/new", name="countries_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $country = new Countries();
        $form = $this->createForm('adminBundle\Form\countriesType', $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $country->setCreatedAt(new \DateTime('now'));
            $country->setUpdateAt(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();

            return $this->redirectToRoute('countries_show', array('id' => $country->getId()));
        }

        return $this->render('countries/new.html.twig', array(
            'country' => $country,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a country entity.
     *
     * @Route("/{id}", name="countries_show")
     * @Method("GET")
     */
    public function showAction(countries $country)
    {
        $deleteForm = $this->createDeleteForm($country);

        return $this->render('countries/show.html.twig', array(
            'country' => $country,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing country entity.
     *
     * @Route("/{id}/edit", name="countries_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, countries $country)
    {
        $deleteForm = $this->createDeleteForm($country);
        $editForm = $this->createForm('adminBundle\Form\countriesType', $country);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $country->setUpdateAt(new \DateTime('now'));
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('countries_edit', array('id' => $country->getId()));
        }

        return $this->render('countries/edit.html.twig', array(
            'country' => $country,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a country entity.
     *
     * @Route("/{id}", name="countries_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, countries $country)
    {
        $form = $this->createDeleteForm($country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($country);
            $em->flush();
        }

        return $this->redirectToRoute('countries_index');
    }

    /**
     * Creates a form to delete a country entity.
     *
     * @param countries $country The country entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(countries $country)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('countries_delete', array('id' => $country->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



}
