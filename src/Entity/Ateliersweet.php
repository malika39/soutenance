<?php

namespace App\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AteliersweetRepository")
 *@ORM\Table(
 *     name="ateliersweets",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="uniq_slug_softdelete", columns={"slug", "deleted_at"})
 *     }
 *     )
 */
class Ateliersweet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Imageatelier", mappedBy="ateliersweet", cascade={"persist"})
     */
    private $imagess;



    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $deletedAt;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $slug;

    public function __construct()
    {
        $this->imagess = new ArrayCollection();
        $this->dateCreated = new \DateTime();
        // Null values are ignored by unique constraints
        $this->deletedAt = date_create('0000-00-00 00:00:00');
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\Type('string'));
        $metadata->addPropertyConstraint('name', new Assert\NotNull());

        $metadata->addPropertyConstraint('description', new Assert\Type('string'));
        $metadata->addPropertyConstraint('description', new Assert\NotNull());

        $metadata->addPropertyConstraint('price', new Assert\NotNull());

        $metadata->addPropertyConstraint('imagess', new Assert\Count([
            'min' => 1,
            'max' => 3,
            'minMessage' => 'Chaque atelier doit avoir au moins une image',
            'maxMessage' => 'Un produit ne peut pas avoir plus de trois images'
        ]));
        $metadata->addPropertyConstraint('imagess', new Assert\Valid());
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }




    public function getPrice(): ?float
    {
        return $this->price;
    }



    public function getImagess()
    {
        return $this->imagess;
    }





    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }



    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function setImagess($imagess)
    {
        $this->imagess = $imagess;
    }



    public function calcTotalPrice(): float
    {
        return $this->price;
    }

    public function addImage(Imageatelier $image)
    {
        $image->setAteliersweet($this);

        $this->imagess->add($image);
    }

    public function removeImage(Imageatelier $image)
    {
        $this->imagess->remove($image);
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }



}
