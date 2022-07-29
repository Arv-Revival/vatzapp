<?php

/**
 * Class GetValidatorLastWeeksGraphOutput
 *
 * @OA\Schema(
 *     schema="GetValidatorLastWeeksGraphOutput",
 *     type="object"
 * )
 */
class GetValidatorLastWeeksGraphOutput
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
