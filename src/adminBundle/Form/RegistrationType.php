<?php
// src/AppBundle/Form/RegistrationType.php

namespace adminBundle\Form;

use adminBundle\Entity\regions;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fname')
        ->add('company')
        ->add('adresse')
        ->add('zip')
        ->add('nametitel')
        ->add('name')
        ->add('email2')
        ->add('web')
        ->add('tp')
        ->add('tp2')
        ->add('fax')
        ->add('logo')


            ;

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}