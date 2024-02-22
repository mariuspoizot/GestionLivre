<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'author', orphanRemoval: true)]
    private Collection $book_id;

    public function __construct()
    {
        $this->book_id = new ArrayCollection();
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

    /**
     * @return Collection<int, Book>
     */
    public function getBookId(): Collection
    {
        return $this->book_id;
    }

    public function addBookId(Book $bookId): static
    {
        if (!$this->book_id->contains($bookId)) {
            $this->book_id->add($bookId);
            $bookId->setAuthor($this);
        }

        return $this;
    }

    public function removeBookId(Book $bookId): static
    {
        if ($this->book_id->removeElement($bookId)) {
            // set the owning side to null (unless already changed)
            if ($bookId->getAuthor() === $this) {
                $bookId->setAuthor(null);
            }
        }

        return $this;
    }
}
