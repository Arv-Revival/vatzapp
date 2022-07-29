<?php

/**
 * Class AdminOutput
 *
 * @OA\Schema(
 *     schema="AdminOutput",
 *     title="Admin output model",
 *     description="Admin Output model",
 *     type="object"
 * )
 */
class AdminOutput
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
     *     description="Whatsapp country code",
     * )
     *
     * @var string
     */
    private $w_country_code;

    /**
     * @OA\Property(
     *     description="Whatsapp number",
     * )
     *
     * @var string
     */
    private $whatsapp_no;

    /**
     * @OA\Property(
     *     description="Joining date",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $join_date;

    /**
     * @OA\Property(
     *     description="Salary",
     * )
     *
     * @var float
     */
    private $salary;

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
}
