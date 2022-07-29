<?php

/**
 * Class CreatePurchaseDetailInput
 *
 * @OA\Schema(
 *     schema="CreatePurchaseDetailInput",
 *     type="object"
 * )
 */
class CreatePurchaseDetailInput
{
   /**
     * @OA\Property(
     *     description="Invoice group id",
     * )
     *
     * @var int
     */
    private $invoice_group_id;

    /**
     * @OA\Property(
     *     description="Invoice sub group id",
     * )
     *
     * @var int
     */
    private $invoice_sub_group_id;

    /**
     * @OA\Property(
     *     description="Invoice item id",
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
