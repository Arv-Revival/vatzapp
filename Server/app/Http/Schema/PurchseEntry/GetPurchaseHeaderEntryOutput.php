<?php

/**
 * Class GetPurchaseHeaderEntryOutput
 *
 * @OA\Schema(
 *     schema="GetPurchaseHeaderEntryOutput",
 *     type="object"
 * )
 */
class GetPurchaseHeaderEntryOutput
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
     *     description="Invoice number",
     * )
     *
     * @var string
     */
    private $invoice_number;

    /**
     * @OA\Property(
     *     description="Name",
     * )
     *
     * @var string
     */
    private $name;

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
     *     description="supplier Name",
     * )
     *
     * @var string
     */
    private $supplier_name;

    /**
     * @OA\Property(
     *     description="supplier_trn",
     * )
     *
     * @var string
     */
    private $supplier_trn;

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
