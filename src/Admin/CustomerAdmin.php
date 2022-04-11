<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

final class CustomerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('name', TextType::class)
            ->add('email')
            // ->add('created_at', DateType::class, [
            //     'widget' => 'single_text',
            //     // 'format' => 'yyyy-MM-dd',
            //     'label' => 'Date Field',

            // ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('createdAt');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', null, [
            'route' => [
                'name' => 'edit',
            ]
        ]);
        $list->addIdentifier('name', null, [
            'route' => [
                'name' => 'edit',
            ]
        ]);
        $list->add('email');
        $list->add('updatedAt', null, [
            'format' => 'Y-m-d H:i:s',
        ]);
        $list->add('createdAt', null, [
            'format' => 'Y-m-d H:i:s',
        ]);
        $list->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ));
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('updatedAt')
            ->add('createdAt');
    }
}
