<?php

// namespace
// App provient de composer.json
namespace App\Controller;

use App\Repository\PaysRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{

	/**
	 * @Route("/search", name="searchpage.index")
	 */
	public function index(Request $request, PaysRepository $paysRepository):Response
	{
	
		$search = $request-> request ->get('search');
		$response = $paysRepository -> search($search) -> getResult();
		/*
		 * pour envoyer des informations à la vue, utiliser le second paramètre de render sous forme de tableau associatif
		 * dans la vue, c'est la clé qui est récupérée
		 */
		return $this->render('search/index.html.twig', [
			
			'param' => $response
		]);
    }
	
}








