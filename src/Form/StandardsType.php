<?php

namespace App\Form;

use App\Entity\Standards;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StandardsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('yearMonth')
            ->add('sexe')
            ->add('month')
            ->add('l')
            ->add('m')
            ->add('s')
            ->add('sd')
            ->add('n3sd')
            ->add('n2sd')
            ->add('n1sd')
            ->add('median')
            ->add('p1sd')
            ->add('p2sd')
            ->add('p3sd')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Standards::class,
        ]);
    }
}
