<?php

/**
 * Class CreatePurchaseInput
 *
 * @OA\Schema(
 *     schema="CreatePurchaseInput",
 *     type="object"
 * )
 */
class CreatePurchaseInput
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
     *     description="Invoice number",
     * )
     *
     * @var string
     */
    private $invoice_number;

    /**
     * @OA\Property(
     *     description="supplier_id",
     * )
     *
     * @var int
     */
    private $supplier_id;

    /**
     * @OA\Property(
     *     description="sub_total"
     * )
     *
     * @var float
     */
    private $sub_total;

    /**
     * @OA\Property(
     *     description="discount"
     * )
     *
     * @var float
     */
    private $discount;

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
     *     description="VAT amount"
     * )
     *
     * @var float
     */
    private $total_amount;
}
