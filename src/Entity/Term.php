<?php

namespace App\Entity;

use App\Repository\TermRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TermRepository::class)
 * @ORM\Table(indexes={@ORM\Index(name="slug_idx", columns={"slug"})})
 * @UniqueEntity(fields={"term"}, message="Ce terme existe déjà !")
 */
class Term
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
    private $slug;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner un terme allons donc !")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="3 caractères minimum svp !",
     *     maxMessage="255 caractères max svp !"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $term;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pronunciation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $variations;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $origin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nota_bene;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $usage_precision;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_updated;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getPronunciation(): ?string
    {
        return $this->pronunciation;
    }

    public function setPronunciation(?string $pronunciation): self
    {
        $this->pronunciation = $pronunciation;

        return $this;
    }

    public function getVariations(): ?string
    {
        return $this->variations;
    }

    public function setVariations(?string $variations): self
    {
        $this->variations = $variations;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getNotaBene(): ?string
    {
        return $this->nota_bene;
    }

    public function setNotaBene(?string $nota_bene): self
    {
        $this->nota_bene = $nota_bene;

        return $this;
    }

    public function getUsagePrecision(): ?string
    {
        return $this->usage_precision;
    }

    public function setUsagePrecision(?string $usage_precision): self
    {
        $this->usage_precision = $usage_precision;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    public function setIsPublished(bool $is_published): self
    {
        $this->is_published = $is_published;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->date_updated;
    }

    public function setDateUpdated(?\DateTimeInterface $date_updated): self
    {
        $this->date_updated = $date_updated;

        return $this;
    }
}
