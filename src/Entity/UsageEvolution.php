<?php

namespace App\Entity;

use App\Repository\UsageEvolutionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsageEvolutionRepository::class)
 */
class UsageEvolution
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Term::class, mappedBy="usage_evolution")
     */
    private $terms;

    public function __construct()
    {
        $this->terms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Term[]
     */
    public function getTerms(): Collection
    {
        return $this->terms;
    }

    public function addTerm(Term $term): self
    {
        if (!$this->terms->contains($term)) {
            $this->terms[] = $term;
            $term->setUsageEvolution($this);
        }

        return $this;
    }

    public function removeTerm(Term $term): self
    {
        if ($this->terms->removeElement($term)) {
            // set the owning side to null (unless already changed)
            if ($term->getUsageEvolution() === $this) {
                $term->setUsageEvolution(null);
            }
        }

        return $this;
    }
}
