<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use AppBundle\Entity\User;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $isNew = null === $this->getSubject()->getId() ? true : false;

        $formMapper
            ->add('pseudo')
            ->add('level')
            ->add('trophy')
            ->add('ranking')
            ->add('password')
            ->add('email')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('pseudo')
            ->add('level')
            ->add('trophy')
            ->add('ranking')
            ->add('password')
            ->add('email')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('pseudo')
            ->add('level')
            ->add('trophy')
            ->add('ranking')
            ->add('password')
            ->add('email')
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'show' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        // Here we set the fields of the ShowMapper variable, $showMapper (but this can be called anything)
        $showMapper
            ->add('id')
            ->add('pseudo')
            ->add('level')
            ->add('trophy')
            ->add('ranking')
            ->add('password')
            ->add('email')
        ;

    }
}