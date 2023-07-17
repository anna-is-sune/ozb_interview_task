<?php
namespace App\Utilities;

use App\Kernel;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ImageHelper
{
    private $projectDir;

    private $productImageDir;

    public function __construct(Kernel $kernel, ContainerInterface $container)
    {
        $this->projectDir = $kernel->getProjectDir();
        $this->productImageDir = $container->getParameter('product_image_path');
    }

    public function getImageAbsolutePath(string $filename, string $sizePath) {
        return $this->projectDir . '/' . 'public' . '/' . $this->productImageDir . $sizePath . '/' . $filename;
    }

    public function getPublicPath(string $filename, string $sizePath) {
        return 'public' . '/' . $this->productImageDir . $sizePath . '/' . $filename;
    }

    public function getServerPath(string $filename, string $sizePath) {
        return $this->productImageDir . $sizePath . '/' . $filename;
    }

    public function getProductImagePath()
    {
        return $this->productImageDir;
    }

    public function getProductImageAbsolutePath()
    {
        return $this->projectDir;
    }

    // ...
}