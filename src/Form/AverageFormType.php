<?php

namespace App\Form;

use App\Entity\Average;
use Doctrine\DBAL\Types\FloatType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AverageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom*',
                    'attr' => ['class' => 'form-control'],
                ]
            )
            ->add('firstname', TextType::class,
                [
                    'required' => true,
                    'label' => 'Prénom*',
                    'attr' => ['class' => 'form-control'],
                ]
            )
            ->add('number1', IntegerType::class,
                [
                    'required' => true,
                    'label' => 'Note*',
                    'mapped' => false,
                    'attr' => ['class' => 'form-control note', 'id' => 'note2', 'step' => '0.5', 'min' => '0', 'max' => '20'],
                ]
            )
            ->add('number2', IntegerType::class,
                [
                    'required' => true,
                    'label' => 'Note*',
                    'mapped' => false,
                    'attr' => ['class' => 'form-control note', 'id' => 'note2', 'step' => '0.5', 'min' => '0', 'max' => '20'],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Average::class,
        ]);
    }
}
