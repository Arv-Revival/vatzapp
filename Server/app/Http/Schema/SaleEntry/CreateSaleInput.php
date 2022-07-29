<?php

/**
 * Class CreateSaleInput
 *
 * @OA\Schema(
 *     schema="CreateSaleInput",
 *     type="object"
 * )
 */
class CreateSaleInput
{
    /**
     * @OA\Property(
     *     description="entry_id",
     * )
     *
     * @var int
     */
    private $entry_id;

    /**
     * @OA\Property(
     *     description="Invoice date.",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $invoice_date;

    /**
     * @OA\Property(
     *     description="Invoice total amount"
     * )
     *
     * @var float
     */
    private $amount;

    /**
     * @OA\Property(
     *     description="Amount exclude VAT"
     * )
     *
     * @var float
     */
    private $amount_exclude_vat;


    /**
     * @OA\Property(
     *     description="VAT amount"
     * )
     *
     * @var float
     */
    private $vat_amount;

    /**
     * @OA\Property(
     *     description="Comments",
     * )
     *
     * @var string
     */
    private $comments;

    /**
     * @OA\Property(
     *     description="Invoice number",
     * )
     *
     * @var string
     */
    private $invoice_number;
}
