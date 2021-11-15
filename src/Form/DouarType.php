<?php

namespace App\Form;

use App\Entity\Douar;
use App\Entity\Cercle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class DouarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('cercle',EntityType::class,[
                'class' => Cercle::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->groupBy('c.nom')
                        ->orderBy('c.nom', 'ASC');
                },
                'choice_label'=>'nom'

            ])
            ->add('commune',EntityType::class,[
                'class' => Cercle::class,                
                'choice_label'=>'commune'
            ])
            ->add('province',EntityType::class,[
                'class' => Cercle::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->groupBy('c.province')
                        ->orderBy('c.province', 'ASC');
                },                
                'choice_label'=>'province'

            ])
            ->add('Region',EntityType::class,[
                'class' => Cercle::class, 
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->groupBy('r.region')
                        ->orderBy('r.region', 'ASC');
                },                
                'choice_label'=>'region'

            ])
            ->add('latitude')
            ->add('longitude')
            ->add('type',ChoiceType::class,[
                'choices' => [
                    'Douar'=> 'Douar',
                    'Sous Douar' => 'Sous Douar',                   

                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Douar::class,
        ]);
    }
}
