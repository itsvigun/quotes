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
     * @ORM\Column(type="string", length=255)
     * @Groups({"quote_one"})
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=QuoteType::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;

    /**
     *  @Groups({"quote_one"})
     */
    private $authorName;

    /**
     *  @Groups({"quote_one"})
     */
    private $typeName;

    public function getAuthorName() {
        return $this->getAuthor()->getFirstName();
    }

    public function getTypeName() {
        return $this->getType()->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getType(): ?QuoteType
    {
        return $this->type;
    }

    public function setType(?QuoteType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
