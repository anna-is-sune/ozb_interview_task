<?php
namespace App\EventListener;

use App\Entity\Product;
use App\Kernel;
use App\Utilities\ImageOptimiser;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;

#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Product::class)]
#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Product::class)]
class ProductEntity_onUpdate
{
    private ImageOptimiser $imageOptimiser;

    private string $project_dir;

    public function __construct(Kernel $kernel) 
    {
        $this->project_dir = $kernel->getProjectDir();
        $this->imageOptimiser = new ImageOptimiser();
    }

    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function preUpdate(Product $product, PreUpdateEventArgs $event): void
    {
        $now = new \DateTimeImmutable();
        $product->setUpdatedAt($now);

        if ($event->hasChangedField('photos')) {
            $oldPhotos = $event->getOldValue('photos');
            $newPhotos = $event->getNewValue('photos');
            if ($newPhotos['original']['filename'] !== $oldPhotos['original']['filename']) {
                $path = $this->project_dir . '/public/asset/product/original/' . $newPhotos['original']['filename'];
                list($w, $h, $type) = getimagesize($path);
                $newPhotos['original']['file_path'] = $path;
                $newPhotos['original']['width'] = $w;
                $newPhotos['original']['height'] = $h;
                $newPhotos['original']['type'] = $type;

                $thumbnail_path = $this->project_dir . '/public/asset/product/thumbnail/' . $newPhotos['original']['filename'];
                list($w, $h) = $this->imageOptimiser->resize($path, $thumbnail_path);
                $newPhotos['thumbnail'] = [
                    'file_path' => $thumbnail_path,
                    'filename'  => $newPhotos['original']['filename'],
                    'width'     => $w,
                    'height'    => $h
                ];

                $product->setPhotos($newPhotos);
            }

        }
    }

    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function prePersist(Product $product, PrePersistEventArgs $event): void
    {
        $now = new \DateTimeImmutable();
        $product->setCreatedAt($now);
        $product->setUpdatedAt($now);
       
        $photos = $product->getPhotos();

        $path = $this->project_dir . '/public/asset/product/original/' . $photos['original']['filename'];
        list($w, $h, $type) = getimagesize($path);
        $photos['original']['file_path'] = $path;
        $photos['original']['width'] = $w;
        $photos['original']['height'] = $h;
        $photos['original']['type'] = $type;

        $thumbnail_path = $this->project_dir . '/public/asset/product/thumbnail/' . $photos['original']['filename'];
        list($w, $h) = $this->imageOptimiser->resize($path, $thumbnail_path);
        $photos['thumbnail'] = [
            'file_path' => $thumbnail_path,
            'filename'  => $photos['original']['filename'],
            'width'     => $w,
            'height'    => $h
        ];

        $product->setPhotos($photos);
    }
}