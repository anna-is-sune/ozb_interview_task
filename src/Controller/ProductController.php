<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Kernel;
use App\Entity\Product;
use App\Utilities\ImageOptimiser;

use Knp\Component\Pager\PaginatorInterface;

class ProductController extends AbstractController
{
    private string $project_dir;

    private ImageOptimiser $imageOptimiser;

    const PAGE_SIZE = 10;

    public function __construct(Kernel $kernel) 
    {
        $this->project_dir = $kernel->getProjectDir();
        $this->imageOptimiser = new ImageOptimiser();
    }

    #[Route('/products', name: 'app_product', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $user = $this->getUser();
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
        $product = $entityManager->getRepository(Product::class)->find($id);

        $image = $product->getImage();

        return $this->render('product/detail.html.twig', [
            'id'            => $product->getId(),
            'name'          => $product->getName(),
            'price'         => $product->getPrice(),
            'description'   => $product->getDescription(),
            'image'         => '../asset/product/original/' . $image['filename']
        ]);
    }

}
