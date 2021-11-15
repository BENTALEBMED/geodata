<?php

namespace App\Form;

use App\Entity\Douar;
use App\Entity\Enfant;
use App\Entity\Mere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class EnfantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('smi',TextType::class)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('sexe',ChoiceType::class,[
                'choices' => [
                    'M'=> 'Masculain',
                    'F' => 'Feminin'
                ]
                ])          
            ->add('dateNaissance',DateType::class,[ 
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',

            ])
            ->add('cinPereMere',TextType::class,[
                    'required' => false,
            ])
            
            ->add('accouchement',ChoiceType::class,[
                'choices' => [
                'Domicile' => 'Domicile',
                'Milieu surveillé'=>'Milieu surveillé'
                ]

            ])
            ->add('durreeAllaitement')           
            ->add('meres',EntityType::class,[
                'class'=>Mere::class,
                'choice_label' => function(Mere $mere){
                    return $mere->getNom().'-'.$mere->getPrenom();

                }

            ])
            ->add('datedernieracc',TextType::class,[
                'required' => false,
        ])
            ->add('douars',EntityType::class,[
                'class' => Douar::class,
                'choice_label'=>'nom'

            ])
            ->add('nbrcpn',ChoiceType::class,[
                'choices' => [
                    '0'=> '0',
                    '1' => '1',
                    '2'=> '2',
                    '3' => '3',
                    '4' => '4',
                ]
            ] )
            ->add('fer',ChoiceType::class,[
                'choices' => [
                    'Oui'=> 'Oui',
                    'Non' => 'Non',                   
                ],  
                'label'    => 'Prise du Fer pendant les 6 premiers mois  (Oui / Non)',
                'required' => false,
            ])
            ->add('vitamineD',ChoiceType::class,[
                'choices' => [
                    'Oui'=> 'Oui',
                    'Non' => 'Non',                  
                ],            
                'label'    => 'Prise de la Vitamine D pendant les 6 premiers mois (Oui / Non) ',
                'required' => false,
                ])     
            ->add('acideFolique',ChoiceType::class,[
                'choices' => [
                    'Oui'=> 'Oui',
                    'Non' => 'Non',                   
                ],  
                'label'    => 'Prise de la Vitamine A pendant les 6 premiers mois (Oui / Non)',
                'required' => false, 
                ])       
            ->add('suppNutri', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'required' => false,
            ])
            ->add('motifDGross', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class,
        ]);
    }
}
