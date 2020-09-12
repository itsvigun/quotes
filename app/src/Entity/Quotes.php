<?php

namespace App\Entity;

use App\Repository\QuotesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuotesRepository::class)
 */
class Quotes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author_id;

    /**
     * @ORM\ManyToOne(targetEntity=QuotesType::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorId(): ?Author
    {
        return $this->author_id;
    }

    public function setAuthorId(?Author $author_id): self
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getTypeId(): ?QuotesType
    {
        return $this->type_id;
    }

    public function setTypeId(?QuotesType $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
