<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{

    /**
     * Fields to be shown on create/edit forms
     *
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        if ($this->id($this->getSubject())) {
            // EDIT
            $formMapper
                ->add('title')
                ->add('content',null,[
                    'attr' => [
                        'class' => 'ckeditor',
                    ],
                ])
                ->add('category')
                ->add('tag')
                ->add('updatedAt',null, [
                    'data' => new \DateTime(),
                    'attr'=>[
                        'style'=>'display:none;',
                    ],
                    'label' => ' ',
                    'required' => false,
                ])
            ;
        }
        else {
            // CREATE
            $formMapper
                ->add('title')
                ->add('content',null,[
                    'attr' => [
                        'class' => 'ckeditor',
                    ],
                ])
                ->add('category')
                ->add('tag')
                ->add('createdAt',null, [
                    'data' => new \DateTime(),
                    'attr'=>[
                        'style'=>'display:none;',
                    ],
                    'label' => ' ',
                    'required' => false,
                ])
            ;
        }


    }

    /**
     * Fields to be shown on filter forms
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
        ;
    }

    /**
     * Fields to be shown on lists
     *
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('content')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('tag')
        ;
    }

    /**
     *
     * Fields to be shown on show action
     * (@inheritdoc)
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('content')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('tag')
        ;
    }

}