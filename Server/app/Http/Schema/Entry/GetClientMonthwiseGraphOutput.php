<?php

/**
 * Class GetClientMonthwiseGraphOutput
 *
 * @OA\Schema(
 *     schema="GetClientMonthwiseGraphOutput",
 *     type="object"
 * )
 */
class GetClientMonthwiseGraphOutput
{
    /**
     * @OA\Property(
     *     description="Month.",
     *     type="string",
     * )
     *
     * @var string
     */
    private $month;

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
