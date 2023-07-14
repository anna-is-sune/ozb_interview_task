<?php

namespace App\Controller\Admin;

use App\Kernel;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;

class ProductCrudController extends AbstractCrudController
{
    const UPLOAD_PRODUCT_DIR = 'public/asset/product';

    private string $project_dir;

    public function __construct(Kernel $kernel)
    {
        $this->project_dir = $kernel->getProjectDir();
    }

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            MoneyField::new('price')->setCurrency('GBP'),
            TextEditorField::new('description'),
            ImageField::new('image_uploaded')
                ->setUploadDir(self::UPLOAD_PRODUCT_DIR.'/original/')
                ->setUploadedFileNamePattern('[timestamp].[extension]')
        ];
    }
    
}
