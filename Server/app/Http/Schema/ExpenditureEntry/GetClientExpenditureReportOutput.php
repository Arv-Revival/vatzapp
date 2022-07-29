<?php

/**
 * Class GetClientExpendituresReportOutput
 *
 * @OA\Schema(
 *     schema="GetClientExpendituresReportOutput",
 *     title="Get client expenditures report output model",
 *     type="object"
 * )
 */
class GetClientExpendituresReportOutput
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
