<?php

/**
 * Class RegisterClientInput
 *
 * @OA\Schema(
 *     schema="RegisterClientInput",
 *     title="Register client input model",
 *     description="Register client input model",
 *     type="object"
 * )
 */
class RegisterClientInput
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
     *     description="Whatsapp country code"
     * )
     *
     * @var string
     */
    private $w_country_code;

    /**
     * @OA\Property(
     *     description="Whatsapp number"
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
     *     description="Password",
     * )
     *
     * @var string
     */
    private $password;

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

    /**
     * @OA\Property(
     *     description="Trade licence number",
     * )
     *
     * @var string
     */
    private $trade_license_number;

    /**
     * @OA\Property(
     *     description="Tran number",
     * )
     *
     * @var string
     */
    private $trn_number;

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
