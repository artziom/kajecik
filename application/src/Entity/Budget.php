<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: BudgetRepository::class)]
class Budget
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'budgets')]
    #[ORM\JoinColumn(nullable: false)]
    private $owner;

    #[ORM\OneToMany(mappedBy: 'budget', targetEntity: FinancialResource::class, orphanRemoval: true)]
    private $financialResources;

    public function __construct()
    {
        $this->financialResources = new ArrayCollection();
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

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, FinancialResource>
     */
    public function getFinancialResources(): Collection
    {
        return $this->financialResources;
    }

    public function addFinancialResource(FinancialResource $financialResource): self
    {
        if (!$this->financialResources->contains($financialResource)) {
            $this->financialResources[] = $financialResource;
            $financialResource->setBudget($this);
        }

        return $this;
    }

    public function removeFinancialResource(FinancialResource $financialResource): self
    {
        if ($this->financialResources->removeElement($financialResource)) {
            // set the owning side to null (unless already changed)
            if ($financialResource->getBudget() === $this) {
                $financialResource->setBudget(null);
            }
        }

        return $this;
    }
}
