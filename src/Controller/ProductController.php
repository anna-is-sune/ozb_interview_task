<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use App\Utilities\ImageOptimiser;
use App\Utilities\ImageHelper;

use Knp\Component\Pager\PaginatorInterface;

class ProductController extends AbstractController
{
    private ImageOptimiser $imageOptimiser;
    private ImageHelper $imageHelper;

    const PAGE_SIZE = 10;

    public function __construct(ImageHelper $imageHelper) 
    {
        $this->imageOptimiser = new ImageOptimiser();
        $this->imageHelper = $imageHelper;
    }

    #[Route('/products', name: 'app_product', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $pagination = $paginator->paginate(
            $entityManager->getRepository(Product::class)->list(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            self::PAGE_SIZE /*limit per page*/
        );
        
        return $this->render('product/index.html.twig', ['pagination' => $pagination]);
    }

    #[Route('/product/{id}', name: 'app_product_by_id', methods: ['GET'])]
    public function detail(EntityManagerInterface $entityManager, int $id): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $product = $entityManager->getRepository(Product::class)->find($id);

        $image = $product->getImage();

        return $this->render('product/detail.html.twig', [
            'id'            => $product->getId(),
            'name'          => $product->getName(),
            'price'         => $product->getPrice(),
            'description'   => $product->getDescription(),
            'image'         => '../' . $this->imageHelper->getServerPath($image['filename'], 'original')
        ]);
    }

}
