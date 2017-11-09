<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace adminBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;




/**
 * Controller managing the registration.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class RegistrationController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function registerAction(Request $request)
    {
        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();

        $form->setData($user);

        $form->handleRequest($request);
        $connexion = $this->getDoctrine()->getManager();

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);

                $role='ROLE_CUSTOMER';
                $user->addRole($role);

                $c=$request->request->get('c');

                $r=$request->request->get('r');
                $d=$request->request->get('d');
                $cy=$request->request->get('cy');



                $country=$connexion->getRepository('adminBundle:countries')->find($c);
                $region=$connexion->getRepository('adminBundle:regions')->find($r);
                $district=$connexion->getRepository('adminBundle:districts')->find($d);
                $citites=$connexion->getRepository('adminBundle:cities')->find($cy);

                $user->setUserCountry($country);
                $user->setUserRegion($region);
                $user->setUserDistrict($district);
                $user->setUserCity($citites);

                $connexion->persist($user);
                $connexion->flush();

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) {
                return $response;
            }
        }


            $connexion=$this->getDoctrine()->getManager();
            $country=$connexion->getRepository('adminBundle:countries')->findAll();
            $region=$connexion->getRepository('adminBundle:regions')->findAll();


        if($request->request->get('some_var_name')){
            //make something curious, get some unbelieveable data
            $arrData = ['output' => 'here the result which will appear in div'];
            return new JsonResponse($arrData);
        }



        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
            'country'=>$country,
            'region'=>$region,


        ));

    }


    public function regionAction(Request $request,$idc)
    {



        $em = $this->getDoctrine()->getManager();
       $region = $em->createQuery('select o
                                           From adminBundle\Entity\regions o
                                           where o.country_reg = :idd')
            ->setParameter('idd', $idc)
            ->getResult();
        if($region)
        {
               $reg=$region;

        }else{
            $reg=null;
        }
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($reg,'json');
        return new Response($response);



    }

    public function districtAction(Request $request,$idc)
    {
        $em = $this->getDoctrine()->getManager();
        $district = $em->createQuery('select o
                                           From adminBundle\Entity\districts o
                                           where o.district_region = :idd')
            ->setParameter('idd', $idc)
            ->getResult();
        if($district)
        {
            $des=$district;

        }else{
            $des=null;
        }
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($des,'json');
        return new Response($response);



    }

    public function cityAction(Request $request,$idc)
    {
        $em = $this->getDoctrine()->getManager();
        $cities = $em->createQuery('select o
                                           From adminBundle\Entity\cities o
                                           where o.district_cities = :idd')
            ->setParameter('idd', $idc)
            ->getResult();
        if($cities)
        {
            $city=$cities;

        }else{
            $city=null;
        }
        $serializer = $this->get('jms_serializer');
        $response = $serializer->serialize($city,'json');
        return new Response($response);



    }


    /**
     * Tell the user to check their email provider.
     */
    public function checkEmailAction()
    {
        $email = $this->get('session')->get('fos_user_send_confirmation_email/email');

        if (empty($email)) {
            return new RedirectResponse($this->get('router')->generate('fos_user_registration_register'));
        }

        $this->get('session')->remove('fos_user_send_confirmation_email/email');
        $user = $this->get('fos_user.user_manager')->findUserByEmail($email);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with email "%s" does not exist', $email));
        }

        return $this->render('@FOSUser/Registration/check_email.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Receive the confirmation token from user email provider, login the user.
     *
     * @param Request $request
     * @param string  $token
     *
     * @return Response
     */
    public function confirmAction(Request $request, $token)
    {
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
        }

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user->setConfirmationToken(null);
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRM, $event);

        $userManager->updateUser($user);

        if (null === $response = $event->getResponse()) {
            $url = $this->generateUrl('fos_user_registration_confirmed');
            $response = new RedirectResponse($url);
        }

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_CONFIRMED, new FilterUserResponseEvent($user, $request, $response));

        return $response;
    }

    /**
     * Tell the user his account is now confirmed.
     */
    public function confirmedAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@FOSUser/Registration/confirmed.html.twig', array(
            'user' => $user,
            'targetUrl' => $this->getTargetUrlFromSession(),
        ));
    }

    /**
     * @return mixed
     */
    private function getTargetUrlFromSession()
    {
        $key = sprintf('_security.%s.target_path', $this->get('security.token_storage')->getToken()->getProviderKey());

        if ($this->get('session')->has($key)) {
            return $this->get('session')->get($key);
        }
    }


}
