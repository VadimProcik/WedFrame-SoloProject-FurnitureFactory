<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cutOutSheet = null;

    #[ORM\Column(length: 255)]
    private ?string $assemnlyDate = null;

    #[ORM\Column(length: 255)]
    private ?string $fittingDate = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'orders', targetEntity: Person::class)]
    private Collection $people;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?PaymentRecord $paymentrecord = null;

    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->cutOutSheet;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCutOutSheet(): ?string
    {
        return $this->cutOutSheet;
    }

    public function setCutOutSheet(string $cutOutSheet): self
    {
        $this->cutOutSheet = $cutOutSheet;

        return $this;
    }

    public function getAssemnlyDate(): ?string
    {
        return $this->assemnlyDate;
    }

    public function setAssemnlyDate(string $assemnlyDate): self
    {
        $this->assemnlyDate = $assemnlyDate;

        return $this;
    }

    public function getFittingDate(): ?string
    {
        return $this->fittingDate;
    }

    public function setFittingDate(string $fittingDate): self
    {
        $this->fittingDate = $fittingDate;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Person>
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people->add($person);
            $person->setOrders($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getOrders() === $this) {
                $person->setOrders(null);
            }
        }

        return $this;
    }

    public function getPaymentrecord(): ?PaymentRecord
    {
        return $this->paymentrecord;
    }

    public function setPaymentrecord(?PaymentRecord $paymentrecord): self
    {
        $this->paymentrecord = $paymentrecord;

        return $this;
    }
}
