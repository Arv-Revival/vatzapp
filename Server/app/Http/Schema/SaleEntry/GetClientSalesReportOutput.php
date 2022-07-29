<?php

/**
 * Class GetClientSalesReportOutput
 *
 * @OA\Schema(
 *     schema="GetClientSalesReportOutput",
 *     title="Get client sales report output model",
 *     type="object"
 * )
 */
class GetClientSalesReportOutput
{
    /**
     * @OA\Property(
     *     description="Entry ID.",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="The entry file path.",
     * )
     *
     * @var string
     */
    private $file_path;

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
     *     description="Amount",
     * )
     *
     * @var float
     */
    private $amount;

    /**
     * @OA\Property(
     *     description="Amount excluded VAT",
     * )
     *
     * @var float
     */
    private $amount_exclude_vat;

    /**
     * @OA\Property(
     *     description="VAT Amount",
     * )
     *
     * @var float
     */
    private $vat_amount;
}
