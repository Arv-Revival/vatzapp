<?php

/**
 * Class GetClientDaywiseSummaryOutput
 *
 * @OA\Schema(
 *     schema="GetClientDaywiseSummaryOutput",
 *     type="object"
 * )
 */
class GetClientDaywiseSummaryOutput
{
    /**
     * @OA\Property(
     *     description="Invoice date.",
     *     type="string",
     *     format ="date", 
     * )
     *
     * @var string
     */
    private $invoice_date;

    /**
     * @OA\Property(
     *     description="Sale amount",
     * )
     *
     * @var float
     */
    private $sale_amount;

    /**
     * @OA\Property(
     *     description="Purchase amount",
     * )
     *
     * @var float
     */
    private $purchase_amount;

    /**
     * @OA\Property(
     *     description="Expenditure amount",
     * )
     *
     * @var float
     */
    private $expenditure_amount;
}
