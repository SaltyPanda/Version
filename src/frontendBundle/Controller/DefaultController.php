<?php

namespace frontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/frontend")
     */
    public function indexAction()
    {
        return $this->render('frontendBundle:Default:index.html.twig');
    }
}
