<?php

/**
 * Class UpdateClientByAdminInput
 *
 * @OA\Schema(
 *     title="UpdateClientByAdminInput model",
 *     description="Update Client By Admin Input model",
 * )
 */
class UpdateClientByAdminInput
{
    /**
     * @OA\Property(
     *     description="user_id",
     * )
     *
     * @var int
     */
    private $user_id;

    /**
     * @OA\Property(
     *     description="Checker user id",
     * )
     *
     * @var int
     */
    private $checker_user_id;

    /**
     * @OA\Property(
     *     description="VAT period",
     * )
     *
     * @var integer
     */
    private $vat_period;

    /**
     * @OA\Property(
     *     description="Start month",
     * )
     *
     * @var integer
     */
    private $start_month;

    /**
     * @OA\Property(
     *     description="Start year",
     * )
     *
     * @var integer
     */
    private $start_year;

    /**
     * @OA\Property(
     *     description="VAT percentage",
     * )
     *
     * @var float
     */
    private $vat_percentage;
}
