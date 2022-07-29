<?php

/**
 * Class ValidatorDashboardTileOutput
 *
 * @OA\Schema(
 *     schema="ValidatorDashboardTileOutput",
 *     type="object"
 * )
 */
class ValidatorDashboardTileOutput
{
    /**
     * @OA\Property(
     *     description="pending_entries",
     * )
     *
     * @var integer
     */
    private $pending_entries;

    /**
     * @OA\Property(
     *     description="checked_enteries",
     * )
     *
     * @var integer
     */
    private $checked_enteries;

    /**
     * @OA\Property(
     *     description="approved_enteries",
     * )
     *
     * @var integer
     */
    private $approved_enteries;

    /**
     * @OA\Property(
     *     description="total_enteries",
     * )
     *
     * @var integer
     */
    private $total_enteries;
}
