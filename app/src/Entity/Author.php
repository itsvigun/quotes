<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"list_authors"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list_authors", "quote_one"})
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"list_authors"})
     */
    private $last_name;

    /**
     * @ORM\OneToMany(targetEntity=Quote::class, mappedBy="author_id")
     */
    private $quote;

    public function __construct()
    {
        $this->quote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return Collection|Quote[]
     */
    public function getQuote(): Collection
    {
        return $this->quote;
    }

    public function addQuote(Quote $quote): self
    {
        if (!$this->quote->contains($quote)) {
            $this->quote[] = $quote;
            $quote->setAuthorId($this);
        }

        return $this;
    }

    public function removeQuote(Quote $quote): self
    {
        if ($this->quote->contains($quote)) {
            $this->quote->removeElement($quote);
            // set the owning side to null (unless already changed)
            if ($quote->getAuthorId() === $this) {
                $quote->setAuthorId(null);
            }
        }

        return $this;
    }
}
