<?php

/**
 * Class GetValidatorVatPayableGraphOutput
 *
 * @OA\Schema(
 *     schema="GetValidatorVatPayableGraphOutput",
 *     type="object"
 * )
 */
class GetValidatorVatPayableGraphOutput
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
