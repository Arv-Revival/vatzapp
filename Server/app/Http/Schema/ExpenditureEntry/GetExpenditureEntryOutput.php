<?php

/**
 * Class GetExpenditureEntryOutput
 *
 * @OA\Schema(
 *     schema="GetExpenditureEntryOutput",
 *     type="object"
 * )
 */
class GetExpenditureEntryOutput
{
    /**
     * @OA\Property(
     *     description="Entry ID",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="Entry file path",
     * )
     *
     * @var string
     */
    private $file_path;

    /**
     * @OA\Property(
     *     description="Entry creation date.",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $created_at;

    /**
     * @OA\Property(
     *     description="Validator comment",
     * )
     *
     * @var string
     */
    private $comment;

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
     *     description="Expenditures entry comments",
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

    /**
     * @OA\Property(
     *     description="Invoice group name",
     * )
     *
     * @var string
     */
    private $invoice_group_name;

    /**
     * @OA\Property(
     *     description="Invoice sub group name",
     * )
     *
     * @var string
     */
    private $invoice_sub_group_name;

    /**
     * @OA\Property(
     *     description="Invoice item name",
     * )
     *
     * @var string
     */
    private $invoice_item_name;
}
