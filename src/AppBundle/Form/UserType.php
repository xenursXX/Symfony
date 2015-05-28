<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Entity\User;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('pseudo')
            ->add('level', 'hidden', array(
                'data' => 'A trier',
            ))
            ->add('trophy','hidden', array(
                'data' => 'A trier',
            ))
            ->add('ranking', 'hidden', array(
                'data' => 'A trier',
            ))
            ->add('password')
            ->add('email')

        ;


    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User'
        ]);
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));

    }

    /**
     * @return string
     */
    public function getName()
    {
      
    }
}
