<?php

namespace App\Admin;

use App\Entity\Customer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File as FileConstraint;

final class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('title')
            ->add('description')
            ->add('file', FileType::class, [
                'required' => false,
                'help' => '<img src="/uploads/'.$this->getSubject()->getImage().'" style="height: 60px;width:60px;">',
                'help_html' => true,
                'constraints' => [
                    new FileConstraint([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image',
                    ])
                ],
            ])
            ->add('customer', null, [
                'class' => Customer::class,
                'choice_label' => 'name',
            ]);
    }

    public function prePersist(object $image): void
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate(object $image): void
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload(object $image): void
    {
        // dump('manageFileUpload');
        // dd($image);  
        if ($image->getFile()) {
            $image->refreshUpdated();
        }
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('title')
            ->add('description')
            ->add('customer', null, [
                'field_type' => EntityType::class,
                'field_options' => [
                    'class' => Customer::class,
                    'choice_label' => 'name',
                ],
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
                // 'format' => 'Y-m-d H:i:s',
                'html5' => false,
            ]);
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', null, [
            'route' => [
                'name' => 'edit',
            ]
        ]);
        $list->add('customer', 'entity', [
            'field_type' => EntityType::class,
            'field_options' => [
                'class' => Customer::class,
                'choice_label' => 'name',
            ],
            'route' => [
                'name' => 'edit',
            ]
        ]);
        $list->addIdentifier('title', null, [
            'route' => [
                'name' => 'edit',
            ]
        ]);
        $list->add('description');
        // $list->add('image');
        $list->add('image', null, [
            'template' => 'Sonata/list_image.html.twig',
            'width' => 50,
            // 'data_class' => null
        ]);
        $list->add('updatedAt', null, [
            'format' => 'Y-m-d H:i:s',
        ]);
        $list->add('createdAt', null, [
            'format' => 'Y-m-d H:i:s',
        ]);
        $list->add('_action', 'actions', array(
            'actions' => array(
                // 'show' => array(),
                // 'edit' => array(),
                'delete' => array(),
            )
        ));
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('title')
            ->add('description')
            ->add('updatedAt')
            ->add('createdAt');
    }
}
