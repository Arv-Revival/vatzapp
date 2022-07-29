<?php

/**
 * Class GetCheckerVatPayableGraphOutput
 *
 * @OA\Schema(
 *     schema="GetCheckerVatPayableGraphOutput",
 *     type="object"
 * )
 */
class GetCheckerVatPayableGraphOutput
{
    /**
     * @OA\Property(
     *     description="Client Name.",
     *     type="string",
     * )
     *
     * @var string
     */
    private $client_name;

    /**
     * @OA\Property(
     *     description="VAT amount",
     * )
     *
     * @var float
     */
    private $vat_amount;
}
