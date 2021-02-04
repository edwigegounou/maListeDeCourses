<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter;

/**
 * @Route("/categories", name="category_")
 */
class CategoryController extends AbstractController

{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
        -> getRepository(Category::class)
        ->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    /**
     * @Route("/{id}", name="show")
     */

    public function show(Category $category): Response
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(
                ['category'=>$category],
                ['name'=>'ASC']
            );
        return $this->render('category/show.html.twig', [
            'products' => $products,
            'category' => $category,
        ]);
    }
}
