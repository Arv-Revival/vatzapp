<?php

/**
 * Class ValidatorListOutput
 *
 * @OA\Schema(
 *     schema="ValidatorListOutput",
 *     title="Validator list output model",
 *     type="object"
 * )
 */
class ValidatorListOutput
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
     *     description="Checkers count",
     * )
     *
     * @var int
     */
    private $checkers_count;

    /**
     * @OA\Property(
     *     description="Joining date of user.",
     *     type="string",
     *     format ="date-time", 
     * )
     *
     * @var string
     */
    private $join_date;

    /**
     * @OA\Property(
     *     description="Email.",
     * )
     *
     * @var string
     */
    private $email;
}
