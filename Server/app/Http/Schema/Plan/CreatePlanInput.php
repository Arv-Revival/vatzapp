<?php

/**
 * Class CreatePlanInput
 *
 * @OA\Schema(
 *     schema="CreatePlanInput",
 *     title="Create Plan input model",
 *     description="Create Plan input model",
 *     type="object"
 * )
 */
class CreatePlanInput
{

    /**
     * @OA\Property(
     *     description="Client user ID",
     * )
     *
     * @var int
     */
    private $user_id;

    /**
     * @OA\Property(
     *     description="Plan name",
     * )
     *
     * @var string
     */
    private $plan_name;

    /**
     * @OA\Property(
     *     description="Referance number",
     * )
     *
     * @var string
     */
    private $ref;

    /**
     * @OA\Property(
     *     description="From date",
     *     type="string",
     *     format ="date-time",      
     * )
     *
     * @var string
     */
    private $from;

    /**
     * @OA\Property(
     *     description="To date",
     *     type="string",
     *     format ="date-time",      
     * )
     *
     * @var string
     */
    private $to;

    /**
     * @OA\Property(
     *     description="Payment type",
     * )
     *
     * @var string
     */
    private $payment_type;

    /**
     * @OA\Property(
     *     description="Payment date",
     *     type="string",
     *     format ="date-time",     
     * )
     *
     * @var string
     */
    private $payment_date;

    /**
     * @OA\Property(
     *     description="Payment amount",
     * )
     *
     * @var float
     */
    private $payment_amount;

    /**
     * @OA\Property(
     *     description="Payment currency",
     * )
     *
     * @var string
     */
    private $payment_currency;
}
