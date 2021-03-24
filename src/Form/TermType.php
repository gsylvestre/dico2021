<?php

namespace App\Form;

use App\Entity\Term;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TermType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('term', TextType::class, [
                'label' => 'Le terme',
                'required' => false,
            ])
            ->add('pronunciation')
            ->add('variations')
            ->add('origin')
            ->add('nota_bene')
            ->add('usage_precision')
            ->add('is_published', ChoiceType::class, [
                'choices' => [
                    'Publiée' => true,
                    'Brouillon' => false,
                ],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Term::class,
        ]);
    }
}
