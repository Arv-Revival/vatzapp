<?php

/**
 * Class ValidatorDashboardRecentTileOutput
 *
 * @OA\Schema(
 *     schema="ValidatorDashboardRecentTileOutput",
 *     type="object"
 * )
 */
class ValidatorDashboardRecentTileOutput
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
     *     description="recheck_enteries",
     * )
     *
     * @var integer
     */
    private $recheck_enteries;

    /**
     * @OA\Property(
     *     description="Client with no entry",
     * )
     *
     * @var integer
     */
    private $client_with_no_entry;
}
