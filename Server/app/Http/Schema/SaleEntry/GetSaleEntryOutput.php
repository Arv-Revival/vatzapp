<?php

/**
 * Class GetSaleEntryOutput
 *
 * @OA\Schema(
 *     schema="GetSaleEntryOutput",
 *     type="object"
 * )
 */
class GetSaleEntryOutput
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
     *     description="Sales entry comments",
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
