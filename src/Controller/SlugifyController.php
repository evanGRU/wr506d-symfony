<?php

namespace App\Controller;

use App\Services\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SlugifyController extends AbstractController
{
    #[Route('/slugify', name: 'app_slugify')]
    public function index(Slugify $slugify): Response
    {
        $texte = $slugify->generateSlug('Ceci est une phrase en français');
        return $this->render('slugify/index.html.twig', [
            'controller_name' => 'SlugifyController',
            'texte' => $texte
        ]);
    }
}
