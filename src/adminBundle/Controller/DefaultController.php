<?php

namespace adminBundle\Controller;

use adminBundle\Entity\cities;
use adminBundle\Entity\countries;
use adminBundle\Entity\districts;
use adminBundle\Entity\regions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function indexAction()
    {
        return $this->render('adminBundle:Default:index.html.twig');
    }


    /**
     * Lists all country entities.
     *
     * @Route("/location/index", name="location_index")
     * @Method("GET")
     */
    public function locationshowAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('adminBundle:countries')->findAll();
        return $this->render(':Location:index.html.twig', array(
            'countries' => $countries,
        ));
    }
    /**
     * Creates a new Location.
     *
     * @Route("/location/new", name="location_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $country= new countries();
        $region=new regions();
        $district= new districts();
        $city=new cities();



        if (isset($_POST['add'])) {
            $em = $this->getDoctrine()->getManager();
            $code = $request->get("code");
            $c = $request->get("country");
            $r = $request->get("region");
            $d = $request->get("district");
            $cit = $request->get("city");

            //country new
            $country->setCode($code);
            $country->setName($c);
            $country->setCreatedAt(new \DateTime('now'));

            $em->persist($country);

            //region new
            $region->setName($r);
            $region->setCreatedAt(new \DateTime('now'));
            $region->setCountryReg($country);
            $em->persist($region);
            //distrci
            $district->setName($d);
            $district->setCreatedAt(new \DateTime('now'));
            $district->setDistrictRegion($region);
            $em->persist($district);


            $city->setName($cit);
            $city->setCreatedAt(new \DateTime('now'));
            $city->setDistrictCities($district);
            $em->persist($city);

            $em->flush();

            return $this->redirectToRoute('location_index');
        }

        return $this->render(':Location:new.html.twig', array(


        ));
    }



    public function getcAction(Request $request,$idc)
    {
        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('adminBundle:countries')->find($idc);

        $serializer=$this->get('jms_serializer');
        $response = $serializer ->serialize($countries,'json');
        return new Response($response);


    }




}
