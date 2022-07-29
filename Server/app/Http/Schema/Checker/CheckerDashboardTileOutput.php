<?php

/**
 * Class CheckerDashboardTileOutput
 *
 * @OA\Schema(
 *     schema="CheckerDashboardTileOutput",
 *     type="object"
 * )
 */
class CheckerDashboardTileOutput
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
