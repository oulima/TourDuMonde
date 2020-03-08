<?php

namespace App\EventSubscriber\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\EventSubscriber\Form\PaysFormSubscriber;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PaysFormSubscriber implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		/*
		 * évenements de formulaire: permet de moduler un formulaire (champs, contraintes)
		 *      PRE_SET_DATA : avant l'initialisation du formulaire, les données du formulaire ne sont reliées à un modèle
		 *      POST_SET_DATA : avant l'initialisation du formulaire, les données du formulaire sont reliées à un modèle
		 *      PRE_SUBMIT : avant la soumission
		 *      SUBMIT : lors de la soumission
		 *      POST_SUBMIT : après la soumission
		 */
		return [
			FormEvents::POST_SET_DATA => 'postSetData'
		];
	}

	public function postSetData(FormEvent $event):void
	{
		/*
		 * getData : données initiales du formulaire avant la soumission
		 * getForm : classe de formulaire
		 * getForm()->getData() : données du formulaire après la soumission
		 */
		$data = $event->getData();
		$form = $event->getForm();
		$model = $form->getData();

		// ajout du champ image
		$form->add('image', FileType::class, [
			'data_class' => null, // permet d'indiquer qu'aucune classe ne va contenir les propriétés d'une image transférée
			'constraints' => $data->getId() ? [] : [
				new NotBlank([
		             'message' => "L'image est obligatoire"]),
				new Image([
			          'mimeTypes' => ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
			          'mimeTypesMessage' => "L'image n'est pas dans un format Web"
		        ])
			]
		]);

		//dd($data, $form, $model);
	}
}




