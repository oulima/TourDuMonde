<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Continent;
use Symfony\Component\Form\AbstractType;
use App\EventSubscriber\Form\PaysFormSubscriber;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // pour rajouter un champ
            ->add('name', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Le nom est obligatoire"
		            ])
	            ]
            ])
            ->add('capital', TextareaType::class, [
	            'constraints' => [
		            new NotBlank([
                         'message' => "La description est obligatoire"
                     ])
                ]
            ])
            /* ->add('image', FileType::class, [
                'data_class' => null, 
                'constraints' => $builder->getData()->getId() ? [] : [
                    new NotBlank(['message' => "L'image est obligatoire"]),
                    new Image(['mimeTypes' => ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
                        'mimeTypesMessage' => "l'image n est pas dans un format web"])
                ]
            ]) */
            
            ->add('idcontinent', EntityType::class, [
                'class'=>  Continent::class,
                'choice_label' => 'name',
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                    'message' => "La catégorie est obligatoire"
                    ])
                ]
            ])
            ;
            $builder->addEventSubscriber( new PaysFormSubscriber() ); 

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Pays::class,
        ]);
    }

}
