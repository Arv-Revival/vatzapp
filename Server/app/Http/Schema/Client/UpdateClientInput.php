<?php

/**
 * Class UpdateClientInput
 *
 * @OA\Schema(
 *     schema="UpdateClientInput",
 *     type="object"
 * )
 */
class UpdateClientInput
{

    /**
     * @OA\Property(
     *     description="Profile image id",
     * )
     *
     * @var int
     */
    private $image_id;

    /**
     * @OA\Property(
     *     description="Building name",
     *     title="Building name",
     * )
     *
     * @var string
     */
    private $building_name;

    /**
     * @OA\Property(
     *     description="Country ID",
     *     title="Country ID",
     * )
     *
     * @var int
     */
    private $country_id;

    /**
     * @OA\Property(
     *     description="Region ID",
     *     title="Region ID",
     * )
     *
     * @var int
     */
    private $region_id;

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
     *     description="Trade license imageid",
     * )
     *
     * @var int
     */
    private $trade_license_image_id;

    /**
     * @OA\Property(
     *     description="FTA email",
     * )
     *
     * @var string
     */
    private $fta_email;

    /**
     * @OA\Property(
     *     description="FTA password",
     * )
     *
     * @var string
     */
    private $fta_password;

    /**
     * @OA\Property(
     *     description="Landline country code",
     * )
     *
     * @var string
     */
    private $l_country_code;

    /**
     * @OA\Property(
     *     description="Landline number",
     * )
     *
     * @var string
     */
    private $landline;

    /**
     * @OA\Property(
     *     description="Contact person",
     * )
     *
     * @var string
     */
    private $contact_person;

    /**
     * @OA\Property(
     *     description="Contact person country code",
     * )
     *
     * @var string
     */
    private $cp_country_code;

    /**
     * @OA\Property(
     *     description="Contact person mobile",
     * )
     *
     * @var string
     */
    private $cp_mobile;

    /**
     * @OA\Property(
     *     description="Tran certificate image id",
     * )
     *
     * @var int
     */
    private $tran_certificate_id;
}
