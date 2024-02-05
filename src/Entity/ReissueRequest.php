<?php

namespace App\Entity;

use App\Repository\ReissueRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReissueRequestRepository::class)]
class ReissueRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reason = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $idNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $giftCardNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $originalIssuingStore = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOfPurchase = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $timeOfPurchase = null;

    #[ORM\Column(length: 255)]
    private ?string $valueLoadedOnCard = null;

    #[ORM\Column(length: 1000)]
    private ?string $furtherDetails = null;

    #[ORM\Column(length: 255)]
    private ?string $requestedBy = null;

    #[ORM\Column(length: 255)]
    private ?string $requestedBySignature = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $requestedDate = null;

    #[ORM\Column(length: 255,  nullable:true)]
    private ?string $authorizedBy = null;

    #[ORM\Column(length: 255,  nullable:true)]
    private ?string $authorizedSignature = null;

    #[ORM\Column(type: Types::DATE_MUTABLE,  nullable:true)]
    private ?\DateTimeInterface $authorizedDate = null;

    #[ORM\Column(length: 255)]
    private ?string $newEvoucherReference = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $newEvoucherDate = null;

    #[ORM\Column(length: 255)]
    private ?string $cardLinkedTo = null;

    #[ORM\Column(length: 255)]
    private ?string $deliveredTo = null;

    #[ORM\Column(length: 255)]
    private ?string $status = "Pending";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
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

    public function getIdNumber(): ?string
    {
        return $this->idNumber;
    }

    public function setIdNumber(string $idNumber): static
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    public function getGiftCardNumber(): ?string
    {
        return $this->giftCardNumber;
    }

    public function setGiftCardNumber(string $giftCardNumber): static
    {
        $this->giftCardNumber = $giftCardNumber;

        return $this;
    }

    public function getOriginalIssuingStore(): ?string
    {
        return $this->originalIssuingStore;
    }

    public function setOriginalIssuingStore(string $originalIssuingStore): static
    {
        $this->originalIssuingStore = $originalIssuingStore;

        return $this;
    }

    public function getDateOfPurchase(): ?\DateTimeInterface
    {
        return $this->dateOfPurchase;
    }

    public function setDateOfPurchase(\DateTimeInterface $dateOfPurchase): static
    {
        $this->dateOfPurchase = $dateOfPurchase;

        return $this;
    }

    public function getTimeOfPurchase(): ?\DateTimeInterface
    {
        return $this->timeOfPurchase;
    }

    public function setTimeOfPurchase(\DateTimeInterface $timeOfPurchase): static
    {
        $this->timeOfPurchase = $timeOfPurchase;

        return $this;
    }

    public function getValueLoadedOnCard(): ?string
    {
        return $this->valueLoadedOnCard;
    }

    public function setValueLoadedOnCard(string $valueLoadedOnCard): static
    {
        $this->valueLoadedOnCard = $valueLoadedOnCard;

        return $this;
    }

    public function getFurtherDetails(): ?string
    {
        return $this->furtherDetails;
    }

    public function setFurtherDetails(string $furtherDetails): static
    {
        $this->furtherDetails = $furtherDetails;

        return $this;
    }

    public function getRequestedBy(): ?string
    {
        return $this->requestedBy;
    }

    public function setRequestedBy(string $requestedBy): static
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    public function getRequestedBySignature(): ?string
    {
        return $this->requestedBySignature;
    }

    public function setRequestedBySignature(string $requestedBySignature): static
    {
        $this->requestedBySignature = $requestedBySignature;

        return $this;
    }

    public function getRequestedDate(): ?\DateTimeInterface
    {
        return $this->requestedDate;
    }

    public function setRequestedDate(\DateTimeInterface $requestedDate): static
    {
        $this->requestedDate = $requestedDate;

        return $this;
    }

    public function getAuthorizedBy(): ?string
    {
        return $this->authorizedBy;
    }

    public function setAuthorizedBy(string $authorizedBy): static
    {
        $this->authorizedBy = $authorizedBy;

        return $this;
    }

    public function getAuthorizedSignature(): ?string
    {
        return $this->authorizedSignature;
    }

    public function setAuthorizedSignature(string $authorizedSignature): static
    {
        $this->authorizedSignature = $authorizedSignature;

        return $this;
    }

    public function getAuthorizedDate(): ?\DateTimeInterface
    {
        return $this->authorizedDate;
    }

    public function setAuthorizedDate(\DateTimeInterface $authorizedDate): static
    {
        $this->authorizedDate = $authorizedDate;

        return $this;
    }

    public function getNewEvoucherReference(): ?string
    {
        return $this->newEvoucherReference;
    }

    public function setNewEvoucherReference(string $newEvoucherReference): static
    {
        $this->newEvoucherReference = $newEvoucherReference;

        return $this;
    }

    public function getNewEvoucherDate(): ?\DateTimeInterface
    {
        return $this->newEvoucherDate;
    }

    public function setNewEvoucherDate(\DateTimeInterface $newEvoucherDate): static
    {
        $this->newEvoucherDate = $newEvoucherDate;

        return $this;
    }

    public function getCardLinkedTo(): ?string
    {
        return $this->cardLinkedTo;
    }

    public function setCardLinkedTo(string $cardLinkedTo): static
    {
        $this->cardLinkedTo = $cardLinkedTo;

        return $this;
    }

    public function getDeliveredTo(): ?string
    {
        return $this->deliveredTo;
    }

    public function setDeliveredTo(string $deliveredTo): static
    {
        $this->deliveredTo = $deliveredTo;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
