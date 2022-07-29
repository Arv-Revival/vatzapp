<?php

/**
 * Class CreateExpenditureInput
 *
 * @OA\Schema(
 *     schema="CreateExpenditureInput",
 *     type="object"
 * )
 */
class CreateExpenditureInput
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
}
