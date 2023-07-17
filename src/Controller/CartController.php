<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $session = $request->getSession();
        $currentCart = json_decode($session->get('cart', '[]'), true);
        $product_ids = array_keys($currentCart);
        $products = $entityManager->getRepository(Product::class)->findByIds($product_ids);

        $response = new JsonResponse();
        $response->setData($this->getCartFromSession($products, $currentCart));
        return $response;
    }

    #[Route('/cart/{id}', name: 'app_add_to_cart', methods: ['POST', 'PUT', 'DELETE'])]
    public function add(Request $request, EntityManagerInterface $entityManager, int $id) : JsonResponse 
    {
        if ($request->getMethod() !== 'DELETE') {
            $content = json_decode($request->getContent());
            $qty = intval($content->qty);
            
        }
        
        $session = $request->getSession();
        $currentCart = json_decode($session->get('cart', '[]'), true);
        $currentQty = $currentCart[$id] ?? 0;
        $product = $entityManager->getRepository(Product::class)->find($id);
        switch($request->getMethod()) {
            case 'POST':
                $currentCart[$id] = $currentQty + $qty;
                $output = [
                    'action' => 'ADD', 
                    'product' => [
                        'id'    => $product->getId(), 
                        'name'  => $product->getName()
                    ]
                ];
                break;
            case 'PUT':
                $currentCart[$id] = $qty;
                $output = [
                    'action' => 'UPDATE', 
                    'product' => [
                        'id'    => $product->getId(), 
                        'name'  => $product->getName(),
                        'qty'   => $qty,
                        'price' => $product->getPrice() * $qty
                    ]
                    ];
                break;
            case 'DELETE':
                unset($currentCart[$id]);
                $output = [
                    'action' => 'DELETE',
                    'product' => [
                        'id'    => $product->getId(), 
                        'name'  => $product->getName(),
                    ]
                ];
                break;
        }
        
        $session->set('cart', json_encode($currentCart));

        $response = new JsonResponse();
        $response->setData($output);
        return $response;
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
