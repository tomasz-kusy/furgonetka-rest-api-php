<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Package
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Package extends Entity
{
    public const TYPE_PACKAGE = 'package';
    public const TYPE_ENVELOPE = 'dox';
    public const TYPE_PALLET = 'pallet';

    public AddressDetails $pickup;
    public AddressDetails $receiver;
    public ?int $serviceId = null;
    public array $parcels;
    public ?AddressDetails $sender;
    public ?Payer $payer = null;
    public ?string $userReferenceNumber;
    public string $type;
    public ?AdditionalServices $additionalServices;

    public function toArray(): array
    {
        return [
            'pickup' => $this->pickup->toArray(),
            'receiver' => $this->receiver->toArray(),
            'service_id' => $this->serviceId,
            'parcels' => $this->parcels,
            'sender' => $this->sender?->toArray() ?? null,
            'payer' => ($this->payer) ? $this->payer->toArray() : null,
            'user_reference_number' => $this->userReferenceNumber,
            'type' => $this->type,
            'additional_services' => $this->additionalServices?->toArray() ?? null,
        ];
    }
}
