<?php

namespace App\Controller;

use App\Repository\PaysRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class PaysController extends AbstractController
{
    /** 
     * @Route("/pays", name="pays.index")
     */
    public function index(PaysRepository $paysRepository)
    {
        $results = $paysRepository->findAll();
        return $this->render('pays/index.html.twig', [
            'results' => $results
        ]);
    }
    
    /** 
	 * @Route("/pays/{id}", name="pays.details")
    */
	public function details(int $id, PaysRepository $paysRepository):Response
	{
		$pays = $paysRepository->find($id);
		return $this->render('pays/details.html.twig', [
			'pays' => $pays
		]);
	}

}
