<?php

namespace App\Entity;


use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageatelierRepository")
 * @ORM\Table(name="imagess")
 */
class Imageatelier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="Ateliersweet", inversedBy="imagess")
     * @ORM\JoinColumn(name="ateliersweet_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $ateliersweet;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * The uploaded file
     *
     * @var [UploadedFile]
     */
    private $file;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('file', new Assert\Image());

        $metadata->addPropertyConstraint('description', new Assert\Type('string'));

        $metadata->addPropertyConstraint('description', new Assert\NotNull());
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getAteliersweet(): Atelier
    {
        return $this->ateliersweet;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getSize(): int
    {
        return $this->size;
    }

    public function getFile(): ?UploadedFile
    {
       return $this->file;
    }

    public function setAteliersweet(Ateliersweet $ateliersweet)
{
    $this->ateliersweet = $ateliersweet;
}

    public function setName(string $name)
{
    $this->name = $name;
}

    public function setDescription(string $description)
{
    $this->description = $description;
}

    public function setSize(int $size)
{
    $this->size = $size;
}

    public function setFile(UploadedFile $file)
{
    $this->file = $file;
}
}
