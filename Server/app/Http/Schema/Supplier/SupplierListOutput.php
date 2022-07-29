<?php

/**
 * Class SupplierListOutput
 *
 * @OA\Schema(
 *     schema="SupplierListOutput",
 *     title="Supplier list output model",
 *     type="object"
 * )
 */
class SupplierListOutput
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
     *     description="country code",
     * )
     *
     * @var string
     */
    private $country_code;

    /**
     * @OA\Property(
     *     description="mobile",
     * )
     *
     * @var string
     */
    private $mobile;

    /**
     * @OA\Property(
     *     description="Country of user.",
     * )
     *
     * @var string
     */
    private $country;

    /**
     * @OA\Property(
     *     description="emirate",
     * )
     *
     * @var string
     */
    private $emirate;

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
     *     description="TR number.",
     * )
     *
     * @var string
     */
    private $trn;

    /**
     * @OA\Property(
     *     description="Building name.",
     * )
     *
     * @var string
     */
    private $building_name;

     /**
     * @OA\Property(
     *     description="P O box.",
     * )
     *
     * @var string
     */
    private $p_o_box;

     /**
     * @OA\Property(
     *     description="Place.",
     * )
     *
     * @var string
     */
    private $place;

     /**
     * @OA\Property(
     *     description="City.",
     * )
     *
     * @var string
     */
    private $city;
}
