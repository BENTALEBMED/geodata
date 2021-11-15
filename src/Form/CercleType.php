<?php

namespace App\Form;

use App\Entity\Cercle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CercleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('commune',TextType::class)
            ->add('province',TextType::class)
            ->add('region',ChoiceType::class,[
                'choices' => [
                    'Drâa-Tafilalet'=> 'Drâa-Tafilalet',
                    'Béni Mellal – Khnifra' => 'Béni Mellal – Khnifra',
                    'Marrakech-Safi' => 'Marrakech-Safi',

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cercle::class,
        ]);
    }
}
