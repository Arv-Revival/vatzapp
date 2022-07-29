<?php

/**
 * Class UpdateAdminInput
 *
 * @OA\Schema(
 *     schema="UpdateAdminInput",
 *     type="object"
 * )
 */
class UpdateAdminInput
{
    /**
     * @OA\Property(
     *     description="Country code",
     *     title="Country code",
     * )
     *
     * @var string
     */
    private $country_code;

    /**
     * @OA\Property(
     *     description="Mobile",
     *     title="Mobile without country code",
     * )
     *
     * @var string
     */
    private $mobile;

    /**
     * @OA\Property(
     *     description="P O Box",
     *     title="P O Box",
     * )
     *
     * @var string
     */
    private $p_o_box;

    /**
     * @OA\Property(
     *     description="Palce",
     *     title="Palce",
     * )
     *
     * @var string
     */
    private $palce;

    /**
     * @OA\Property(
     *     description="City",
     *     title="City",
     * )
     *
     * @var string
     */
    private $city;

    /**
     * @OA\Property(
     *     description="Image ID",
     *     title="Image id of the profile picture",
     * )
     *
     * @var int
     */
    private $image_id;

    /**
     * @OA\Property(
     *     description="country_id",
     * )
     *
     * @var int
     */
    private $country_id;

    /**
     * @OA\Property(
     *     description="region_id",
     * )
     *
     * @var int
     */
    private $region_id;

    /**
     * @OA\Property(
     *     description="building_name",
     * )
     *
     * @var string
     */
    private $building_name;
}
