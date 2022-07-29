<?php

/**
 * Class ClientDashboardTileOutput
 *
 * @OA\Schema(
 *     schema="ClientDashboardTileOutput",
 *     type="object"
 * )
 */
class ClientDashboardTileOutput
{
    /**
     * @OA\Property(
     *     description="vat_payable",
     * )
     *
     * @var float
     */
    private $vat_payable;

    /**
     * @OA\Property(
     *     description="number_of_invoices",
     * )
     *
     * @var float
     */
    private $number_of_invoices;

    /**
     * @OA\Property(
     *     description="total_sales",
     * )
     *
     * @var float
     */
    private $total_sales;

    /**
     * @OA\Property(
     *     description="total_purchase",
     * )
     *
     * @var float
     */
    private $total_purchase;

    /**
     * @OA\Property(
     *     description="total_expenditure",
     * )
     *
     * @var float
     */
    private $total_expenditure;
}
