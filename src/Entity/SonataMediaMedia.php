<?php

namespace App\Entity;

use App\Repository\SonataMediaMediaRepository;
use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseMedia;

#[ORM\Entity(repositoryClass: SonataMediaMediaRepository::class)]
class SonataMediaMedia extends BaseMedia
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
