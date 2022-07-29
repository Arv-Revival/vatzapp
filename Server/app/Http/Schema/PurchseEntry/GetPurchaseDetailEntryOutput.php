<?php

/**
 * Class GetPurchaseDetailEntryOutput
 *
 * @OA\Schema(
 *     schema="GetPurchaseDetailEntryOutput",
 *     type="object"
 * )
 */
class GetPurchaseDetailEntryOutput
{
    /**
     * @OA\Property(
     *     description="invoice_group_id",
     * )
     *
     * @var int
     */
    private $invoice_group_id;

    /**
     * @OA\Property(
     *     description="invoice_sub_group_id",
     * )
     *
     * @var int
     */
    private $invoice_sub_group_id;

    /**
     * @OA\Property(
     *     description="invoice_item_id",
     * )
     *
     * @var int
     */
    private $invoice_item_id;

    /**
     * @OA\Property(
     *     description="price"
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     *     description="qty"
     * )
     *
     * @var float
     */
    private $qty;


    /**
     * @OA\Property(
     *     description="amount"
     * )
     *
     * @var float
     */
    private $amount;
}
