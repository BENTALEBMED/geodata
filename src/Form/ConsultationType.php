<?php

namespace App\Form;

use App\Entity\Consultation;
use App\Entity\Enfant;
use Doctrine\ORM\Query\Expr\GroupBy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;




class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('enfant',EntityType::class,[
            'class'=> Enfant::class,
            'choice_label' => 'smi',

        ])       
        ->add('dateConsultation',DateType::class,[
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ])
        ->add('poids')
        ->add('taille')
        ->add('motif', TextareaType::class, [
            'attr' => ['class' => 'tinymce'],
            'required' => false,
        ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}
