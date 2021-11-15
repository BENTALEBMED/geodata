<?php

namespace App\Form;

use App\Entity\CentreSoin;
use App\Entity\Cercle;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CentreSoinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('type',ChoiceType::class,[
                'choices' => [
                    'CSR-1'=> 'CSR-1',
                    'CSR-2' => 'CSR-2',
                    'DR' => 'DR',
                    'Autres' => 'Autres',
                ]
                ])  
            ->add('commune',ChoiceType::class,[
                'choices' => [
                    'Asni' =>'Asni',
                    'Ouirgane' => 'Ouirgane',                               
                    'Imegdal' => 'Imegdal',              
                    'Ighil' => 'Ighil',
                    'Ijoukak' => 'Ijoukak',
                    'Tlat N\'yaaqoub' =>  'Tlat N\'yaaqoub',                  
                    'Agbar' =>'Agbar',
                    'Agoudi' => 'Agoudi',                  
                    'Tamda Noumercide' =>'Tamda Noumercide',                   
                    'Ait Mhamed' => 'Ait Mhamed',
                    'Ait Abbas' =>'Ait Abbas',                   
                    'Tabant' => 'Tabant',                   
                    'Zaouiat Ahansal' => 'Zaouiat Ahansal',                   
                    'Ait Bou oulli' =>'Ait Bou oulli',
                    'Imilchil' => 'Imilchil',
                    'Bou Azmou' => 'Bou Azmou',                  
                    'Outerbat' => 'Outerbat',                   
                    'Amouguer' =>'Amouguer'                
                    

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CentreSoin::class,
        ]);
    }
}
