<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController'
        ]);
    }

    #[Route('/product/list', name: 'products_list')]
    public function listProducts(): Response
    {
        return $this->render('product/listProducts.html.twig', [
            'productsList' => 'Liste de produits'
        ]);
    }

    #[Route('/product/{id}', name:"product_view")]
    public function viewProduct($id): Response
    {
        $text = 'Affichage du produit ' . $id;
        return $this->render('product/viewProduct.html.twig', [
            'productDetail' => $text
        ]);
    }
}
