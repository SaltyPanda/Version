<?php
// src/AppBundle/Form/RegistrationType.php

namespace adminBundle\Form;

use adminBundle\Entity\regions;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fname',TextType::class,array('label'=>"Contact Person Name"))
        ->add('company',TextType::class,array('label'=>"Company Name"))
        ->add('adresse',TextType::class,array('label'=>"Adresse"))
        ->add('zip',TextType::class,array('label'=>"Zip code"))

            ->add('nametitel', ChoiceType::class, array(
                'choices'  => array(
                    'Name Title' => "",
                    'Mr' =>  'Mr' ,
                    'Mrs' =>  'Mrs' ,
                ),
            'required'   => true,))

        ->add('email2',EmailType::class,array('label'=>"Second Email adresse"))
        ->add('web',TextType::class,array('label'=>"Web site"))
        ->add('tp',NumberType::class,array('label'=>"Phone Number"))
        ->add('tp2',NumberType::class,array('label'=>"Second phone number"))
        ->add('fax',NumberType::class,array('label'=>"Fax Number"))
            ->add('logo', FileType::class, array('label' => 'Logo (PDF,PNG,JPEG file)'))
            // ...


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