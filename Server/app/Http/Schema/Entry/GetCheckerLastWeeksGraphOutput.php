<?php

/**
 * Class GetCheckerLastWeeksGraphOutput
 *
 * @OA\Schema(
 *     schema="GetCheckerLastWeeksGraphOutput",
 *     type="object"
 * )
 */
class GetCheckerLastWeeksGraphOutput
{
    /**
     * @OA\Property(
     *     description="Day.",
     *     type="string",
     * )
     *
     * @var string
     */
    private $day;

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
