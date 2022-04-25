<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class FinanceRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class FinanceRequest extends Request
{
    use ResponseTrait;

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /** @throws FurgonetkaApiException */
    public function getListOfTransfers(
        int $limit = 50,
        string $lastTransferUuid = null,
        array $transferType = []
    ): array
    {
        $response = $this->client->get("finances/transfers", [
            'limit' => $limit,
            'last_transfer_uuid' => $lastTransferUuid,
            'transfer_type' => $transferType
        ]);

        return $this->response($response);
    }
}