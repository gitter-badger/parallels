<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ProjectForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('gitSshLink')
            ->add('gitPrivateKey', HiddenType::class)
            ->add('gitPublicKey', HiddenType::class)
            ->add('type');
    }

    public function getName()
    {
        return 'project';
    }
}