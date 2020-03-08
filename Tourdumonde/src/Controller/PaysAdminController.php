<?php
    
namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use App\Repository\PaysRepository;
use App\Controller\PaysAdminController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




/**
     * @Route("/admin")
     */

class PaysAdminController extends AbstractController
{
	/** 
	 * @Route("/pays", name="pays_admin.index")
	 */
	
	public function index(PaysRepository $paysRepository):Response
	{
		$results = $paysRepository->findAll();

		return $this->render('pays_admin/index.html.twig', [
			'results' => $results
        ]);
	}


		/** 
	 * @Route("/pays/delete/{id}", name="pays_admin.delete")
	 */
	
	public function delete(PaysRepository $paysRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		$pays = $paysRepository->find($id);
		$entityManager->remove($pays);
		$entityManager->flush();
		$this->addFlash("notice", "Le pays a bien été supprimé" );
		return $this->redirectToRoute("pays_admin.index");


	}


	/**
	 * @Route("/pays/form", name="pays_admin.form")
	 * @Route("/pays/form/modifier/{id}", name="pays_admin.update")
	 */
	public function form(Request $request, EntityManagerInterface $entityManager, int $id = null, PaysRepository $paysRepository):Response
	{
		// affichage d'un formulaire
		$type = PaysType::class;
		$model = $id ? $paysRepository->find($id) : new Pays();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()){

			$id ? null : $entityManager->persist($model);
			$entityManager->flush();

			$message = $id ? "Le pays a été modifié" : "Le pays a été ajouté";
			$this->addFlash('notice', $message);

			return $this->redirectToRoute("pays_admin.index");
		}

		return $this->render('admin/form.html.twig', [
			'form' => $form->createView()
		]);
	}
	

	
}








