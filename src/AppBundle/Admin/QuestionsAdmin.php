<?php
namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class QuestionsAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, [
                'attr' => [
                    'class'    => 'custom-text',
                    'data-url' => 'https://google.com',
                ],
            ])
            ->add('goodanswer')
            ->add('badanswer')
            ->add('badanswer2')
            ->add('badanswer3')
            ->add('themes', 'choice', array(
                'choices'   => array('Series Française' => 'Series Française', 'Superheros' => 'Superheros', 'Series Americaine' => 'Series Americaine', 'Anciennes Series' => 'Anciennes Series'),
                'required'  => false,
            ));


    }
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('goodanswer')
            ->add('badanswer')
            ->add('badanswer2')
            ->add('badanswer3')
            ->add('themes');






    }
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('goodanswer')
            ->add('badanswer')
            ->add('badanswer2')
            ->add('badanswer3')
            ->add('themes')

            ->add('_action', 'actions', [
                'actions' => [
                    'show'   => [],
                    'edit'   => [],
                    'delete' => [],
                ],
            ])
        ;
    }
    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('goodanswer')
            ->add('badanswer')
            ->add('badanswer2')
            ->add('badanswer3')
            ->add('themes')
        ;

    }
}