<?php

/**
 * Class ClientListOutput
 *
 * @OA\Schema(
 *     schema="ClientListOutput",
 *     title="Client list output model",
 *     type="object"
 * )
 */
class ClientListOutput
{
    /**
     * @OA\Property(
     *     description="name",
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     description="id",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="is active?",
     * )
     *
     * @var bool
     */
    private $is_active;

    /**
     * @OA\Property(
     *     description="Email",
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     description="Trn number",
     * )
     *
     * @var string
     */
    private $trn_number;

    /**
     * @OA\Property(
     *     description="verified_on is not null for verified users.",
     *     title="Verified on",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $verified_on;

    /**
     * @OA\Property(
     *     description="joining date of user.",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $join_date;

    /**
     * @OA\Property(
     *     description="Whatsapp number country code",
     * )
     *
     * @var string
     */
    private $w_country_code;

    /**
     * @OA\Property(
     *     description="Whatsapp number without country code",
     * )
     *
     * @var string
     */
    private $whatsapp_no;

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
     *     description="contact number country code",
     * )
     *
     * @var string
     */
    private $cp_country_code;

    /**
     * @OA\Property(
     *     description="Contact number without country code",
     * )
     *
     * @var string
     */
    private $cp_mobile;
}
