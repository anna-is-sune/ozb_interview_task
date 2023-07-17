<?php
namespace App\EventListener;

use App\Entity\Product;
use App\Utilities\ImageOptimiser;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use App\Utilities\ImageHelper;

#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Product::class)]
#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Product::class)]
class ProductEntity_onUpdate
{
    private ImageOptimiser $imageOptimiser;

    private ImageHelper $imageHelper;

    public function __construct(ImageHelper $imageHelper) 
    {
        $this->imageOptimiser = new ImageOptimiser();
        $this->imageHelper = $imageHelper;
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
                $path = $this->imageHelper->getImageAbsolutePath($newPhotos['original']['filename'], 'original');
                list($w, $h, $type) = getimagesize($path);
                $newPhotos['original']['file_path'] = $path;
                $newPhotos['original']['width'] = $w;
                $newPhotos['original']['height'] = $h;
                $newPhotos['original']['type'] = $type;

                $thumbnail_path = $this->imageHelper->getImageAbsolutePath($newPhotos['original']['filename'], 'thumbnail');
                list($w, $h) = $this->imageOptimiser->resize($path, $thumbnail_path);
                $newPhotos['thumbnail'] = [
                    'file_path'     => $thumbnail_path,
                    'relative_url'  => $this->imageHelper->getServerPath($newPhotos['original']['filename'], 'thumbnail'),
                    'filename'      => $newPhotos['original']['filename'],
                    'width'         => $w,
                    'height'        => $h
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

        $path = $this->imageHelper->getImageAbsolutePath($photos['original']['filename'], 'original');
        list($w, $h, $type) = getimagesize($path);
        $photos['original']['file_path'] = $path;
        $photos['original']['width'] = $w;
        $photos['original']['height'] = $h;
        $photos['original']['type'] = $type;

        $thumbnail_path = $this->imageHelper->getImageAbsolutePath($photos['original']['filename'], 'thumbnail');
        list($w, $h) = $this->imageOptimiser->resize($path, $thumbnail_path);
        $photos['thumbnail'] = [
            'file_path'     => $thumbnail_path,
            'relative_url'  => $this->imageHelper->getServerPath($photos['original']['filename'], 'thumbnail'),
            'filename'      => $photos['original']['filename'],
            'width'         => $w,
            'height'        => $h
        ];

        $product->setPhotos($photos);
    }
}