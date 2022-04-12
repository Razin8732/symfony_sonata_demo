<?php

namespace App\Entity;

use App\Repository\SonataMediaGalleryItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseGalleryItem;

#[ORM\Entity(repositoryClass: SonataMediaGalleryItemRepository::class)]
class SonataMediaGalleryItem extends BaseGalleryItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
