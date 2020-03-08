<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */

class HomepageAdminController extends AbstractController
{
    /**
     * @Route("/", name="homepage_admin.index")
     */
    public function index()
    {
        return $this->render('homepage_admin/index.html.twig', [
            'controller_name' => 'HomepageAdminController',
        ]);
    }
}


