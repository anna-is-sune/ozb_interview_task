<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: "products")]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(options: ['unsigned' => true])]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private array $photos = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deleted_at = null;

    const ASSET_PATH = 'asset/product/';

    public function getImageUploaded() : ?string 
    {
        $image = $this->getImage();
        if (isset($image['filename'])) 
        {
            return self::ASSET_PATH . 'thumbnail/' . $image['filename'];
        } 
        else 
        {
            return null;
        }
    }

    public function setImageUploaded(?string $image) : void
    {
        if (!is_null($image)) {
            $this->setImage([
                'filename'       => $image
            ]);

        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getThumbnail(): array
    {
        return $this->photos['thumbnail'] ?? [];
    }

    public function setThumbnail(array $thumbnail): static
    {
        $this->photos['thumbnail'] = $thumbnail;

        return $this;
    }

    public function getImage(): array
    {
        return $this->photos['original'] ?? [];
    }

    public function setImage(array $image): static
    {
        $this->photos['original'] = $image;

        return $this;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTimeImmutable $deleted_at): static
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getData(bool $detailed = false) {
        $output = [
            'id'        => $this->getId(),
            'name'      => $this->getName(),
            'price'     => $this->getPrice()
        ];

        if ($detailed) {
            $output['description']  = $this->getDescription();
            $output['photos']       = $this->getPhotos();
        }

        return $output;
    }
}
