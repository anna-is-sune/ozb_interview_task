<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $session = $request->getSession();
        $currentCart = json_decode($session->get('cart', '[]'), true);
        $product_ids = array_keys($currentCart);
        $products = $entityManager->getRepository(Product::class)->findByIds($product_ids);

        return $this->render('cart/index.html.twig', $this->getCartFromSession($products, $currentCart));
    }

    #[Route('/cart/{id}', name: 'app_add_to_cart', methods: ['POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager, int $id) : Response 
    {
        $qty = $request->request->get('qty');

        $session = $request->getSession();
        $currentCart = json_decode($session->get('cart', '[]'), true);
        $currentQty = $currentCart[$id] ?? 0;
        $currentCart[$id] = $currentQty + $qty;
        $product_ids = array_keys($currentCart);
        $products = $entityManager->getRepository(Product::class)->findByIds($product_ids);

        $session->set('cart', json_encode($currentCart));
        return $this->render('cart/index.html.twig', $this->getCartFromSession($products, $currentCart));
    }

    private function getCartFromSession(array $products, array $currentCart) : array
    {
        $items = [];
        $total = 0;
        foreach($products as $product) {
            $productId = $product['id'];
            $productQty = $currentCart[$productId];
            $productUnitPrice = $product['price'];
            $productPrice = $productQty * $productUnitPrice;
            $total += $productPrice;
            $items[] = [
                'id'            => $productId,
                'name'          => $product['name'],
                'qty'           => $productQty,
                'unitPrice'     => $productUnitPrice,
                'price'         => $productPrice,
                'thumbnail'     => 'asset/product/thumbnail/' . $product['photos']['thumbnail']['filename']
            ];
        }

        return ['items' => $items, 'total' => $total];
    }
}
