<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Entity\Tag;

class TagType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            /*->add('firstName')
            ->add('birthday', 'birthday', [
                'years' => range(date('Y')-90, date('Y')),
            ])
            ->add('gender', 'choice', [
                'choices' => [
                    User::GENDER_MALE   => 'Male',
                    User::GENDER_FEMALE => 'Female',
                ],
                'data' => User::GENDER_FEMALE,
            ])*/
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Tag'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_tag';
    }
}
