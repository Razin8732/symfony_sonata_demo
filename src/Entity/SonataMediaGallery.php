<?php

namespace App\Entity;

use App\Repository\SonataMediaGalleryRepository;
use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseGallery;

#[ORM\Entity(repositoryClass: SonataMediaGalleryRepository::class)]
class SonataMediaGallery extends BaseGallery
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
