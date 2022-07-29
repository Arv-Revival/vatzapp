<?php

/**
 * Class CheckerListOutput
 *
 * @OA\Schema(
 *     schema="CheckerListOutput",
 *     title="Checker list output model",
 *     type="object"
 * )
 */
class CheckerListOutput
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
     *     description="Clients count",
     * )
     *
     * @var int
     */
    private $clients_count;

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

    /**
     * @OA\Property(
     *     description="Validator name.",
     * )
     *
     * @var string
     */
    private $validator_name;
}
