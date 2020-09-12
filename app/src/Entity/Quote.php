<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuoteRepository::class)
 */
class Quote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"quote_one"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="quote")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"quote_one"})
     */
    private $author_id;

    /**
     * @ORM\ManyToOne(targetEntity=QuoteType::class, inversedBy="quote")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"quote_one"})
     */
    private $type_id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"quote_one"})
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

    public function getTypeId(): ?QuoteType
    {
        return $this->type_id;
    }

    public function setTypeId(?QuoteType $type_id): self
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
