<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', TextType::class, [
                'label' => 'Miasto',
                'attr' => ['placeholder' => 'Wpisz nazwę miasta'],
            ])
            ->add('country', ChoiceType::class, [
                'label' => 'Kraj',
                'choices' => [
                    'Polska' => 'PL',
                    'Niemcy' => 'DE',
                    'Francja' => 'FR',
                    'Hiszpania' => 'ES',
                    'Włochy' => 'IT',
                    'Wielka Brytania' => 'GB',
                    'USA' => 'US',
                ],
            ])
            ->add('latitude', NumberType::class, [
                'label' => 'Szerokość geograficzna',
                'scale' => 7,
                'input' => 'string',
            ])
            ->add('longitude', NumberType::class, [
                'label' => 'Długość geograficzna',
                'scale' => 7,
                'input' => 'string',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
