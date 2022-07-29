<?php

/**
 * Class ClientOutput
 *
 * @OA\Schema(
 *     schema="ClientOutput",
 *     title="Client input model",
 *     description="Client input model",
 *     type="object"
 * )
 */
class ClientOutput
{
    /**
     * @OA\Property(
     *     description="Email",
     *     title="Email",
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     description="Country code",
     *     title="Country code",
     * )
     *
     * @var string
     */
    private $w_country_code;

    /**
     * @OA\Property(
     *     description="Mobile",
     *     title="Mobile without country code",
     * )
     *
     * @var string
     */
    private $whatsapp_no;

    /**
     * @OA\Property(
     *     description="Name",
     *     title="Name of the user",
     * )
     *
     * @var string
     */
    private $name;

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
     *     description="Trade license number",
     *     title="Trade license number",
     * )
     *
     * @var string
     */
    private $trade_license_number;

    /**
     * @OA\Property(
     *     description="Vat period",
     *     title="Vat period",
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
     *     description="Trn number",
     *     title="Trn number",
     * )
     *
     * @var string
     */
    private $trn_number;

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
     *     description="FTA email",
     *     title="FTA email",
     * )
     *
     * @var string
     */
    private $fta_email;

    /**
     * @OA\Property(
     *     description="FTA password",
     *     title="FTA password",
     * )
     *
     * @var string
     */
    private $fta_password;
}
